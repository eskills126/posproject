<!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      <title>
          abc
      </title>
    </head>
    <body>
      
    <?php include("header.php"); ?>

<div class="product-options">
    <a  id="myWish" href="javascript:;"  class="btn btn-mini" >Add to Wishlist </a>
    <a  href="" class="btn btn-mini"> Purchase </a>
</div>
<div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong>
    Product have added to your wishlist.
</div>
</body>
<script>
  
  $(document).ready (function(){
            $("#success-alert").hide();
            $("#myWish").click(function showAlert() {
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
               $("#success-alert").slideUp(500);
                });   
            });
 });
</script>
</html>
