<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 50%;
      height: 50%;
      display: block;
      margin-left: auto;
      margin-right: auto;
      border-radius: 5%;
  }
  .carousel-control-prev-icon,
.carousel-control-next-icon {
  height: 100px;
  width: 100px;
  outline: black;
  background-size: 100%, 100%;
  border-radius: 50%;
  border: 1px solid black;
  background-image: none;
}

.carousel-control-next-icon:after
{
  content: '>';
  font-size: 55px;
  color: red;
}

.carousel-control-prev-icon:after {
  content: '<';
  font-size: 55px;
  color: red;
}
  </style>
</head>
<body>
  <div class="container">

<div id="demo" class="carousel slide" data-ride="carousel"style="background-color: white;color:black;">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/shoppingCart.png" alt="shoppingCart" width="1100" height="250">
      <div class="carousel-caption d-none d-md-block">
        <h1><button type="button" class="btn btn-danger">Today's Purchase</button></h1>
        </div>
  </div>

    <div class="carousel-item">
      <img src="images/salescart.jpg" alt="salescart" width="660" height="250">
      <div class="carousel-caption d-none d-md-block">
        <h1><button type="button" class="btn btn-primary">Today's Sale</button></h1>
        </div>
    </div>
    
  
  </div>
  
  <!-- Left and right controls -->

  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
</body>
</html>
