<?php 
include('../navbar.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<iframe id="pdf"  name="pdf" src="idf.pdf" ></iframe>
<button id="pdff" >Print</button>
</body>
</html>
<script type="text/javascript">

function forPrint(print)
{
  var pdfFrame = window.frames["pdf"];
  pdfFrame.focus();
  pdfFrame.print();
  //this.close();
}
</script>

<script type="text/javascript">
	$(document).ready(function(){
	$("#pdff").click(function(){
		alert("welcome");
		forPrint(print);
	});
});
</script>



