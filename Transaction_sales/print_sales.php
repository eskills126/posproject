
<?php
//print_invoice.php
if(isset($_GET["pdf"]) && isset($_GET["id"]))
{
 require_once 'pdf.php';
 include('../db_connect.php');
 $output = '';
 $statement = $connect->prepare("
  SELECT * FROM tbl_order 
  WHERE order_id = :order_id
  LIMIT 1
 ");
 $statement->execute(
  array(
   ':order_id'       =>  $_GET["id"]
  )
 );
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '
   <table width="100%" border=".5" cellpadding="5" cellspacing="0" >
    <tr>
     <td colspan="2" align="center" style="font-size:18px"><b>Invoice</b></td>
    </tr>
    <tr>
     <td colspan="2">
      <table width="100%" cellpadding="5">
       <tr>
        <td width="65%">
         To,<br />
         <b>RECEIVER (BILL TO)</b><br />
         Name : '.$row["order_receiver_name"].'<br /> 
         Billing Address : '.$row["order_receiver_remarks"].'<br />
        </td>
        <td width="35%">
         
         Invoice No. : '.$row["order_no"].'<br />
         Invoice Date : '.$row["order_date"].'<br />
        </td>
       </tr>
      </table>
      <br />
      <table width="100%" border="1" cellpadding="5" cellspacing="0" id = "customers">
       <tr>
        <th>Sr No.</th>
        <th>Item Name</th>
        <th>Warehouse Name</th>
        <th>Quantity</th>
        <th>Stock Quantity</th>
        <th>Prate</th>
        <th>Gross Rate</th>
        <th>Gross Amount</th>

       </tr> ';
  $statement = $connect->prepare(
   "SELECT * FROM tbl_order_item 
   WHERE order_id = :order_id"
  );
  $statement->execute(
   array(
    ':order_id'       =>  $_GET["id"]
   )
  );
  $item_result = $statement->fetchAll();
  $count = 0;
  foreach($item_result as $sub_row)
  {
   $count++;
   $output .= '
   <tr>
    <td>'.$count.'</td>
    <td>'.$sub_row["item_name"].'</td>
    <td>'.$sub_row["order_item_whname"].'</td>
    <td>'.$sub_row["order_item_quantity"].'</td>
    <td>'.$sub_row["order_item_squantity"].'</td>    
    <td>'.$sub_row["order_item_prate"].'</td>    
    <td>'.$sub_row["order_item_grate"].'</td>
    <td>'.$sub_row["order_item_gamount"].'</td>
    </tr>';
  }
  $output .= '
  <tr>
   <td align="right" colspan="7"><b>Total :</b></td>
   <td align="right"><b>'.$row["order_total_before_discount_freight"].'</b></td>
  </tr>
  <tr>
   <td colspan="7">Discount %:</td>
   <td align="right">'.$row["order_total_discount_percentage"].'</td>
  </tr>
  <tr>
   <td colspan="7">Discount Value :</td>
   <td align="right">'.$row["order_total_discount_value"].'</td>
  </tr>
  <tr>
   <td colspan="7">Freight :</td>
   <td align="right">'.$row["order_total_freight"].'</td>
  </tr>
  <tr>
   <td colspan="7"><b>Total Bill :</b></td>
   <td align="right">'.$row["order_total_after_discount_freight"].'</td>
  </tr> ';

  $output .= '
      </table>
    <br>
     </td>    
    </tr>
   </table>
  ';
 }
 $pdf = new Pdf();
 $file_name = 'Invoice-'.$row["order_no"].'.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));
}
?>