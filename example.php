<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.i-am-centered {
 margin: auto; max-width: 1000px;
}
/* The grid: Three equal columns that floats next to each other */
.column {
    float: left;
    width: 10%;
    padding: 60px;
    text-align: center;
    font-size: 25px;
    cursor: pointer;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}
.acolumn {
    float: left;
    width: -10%;
    padding: 10px;
    background-color: white;
}

</style>
</head>
<body>

<div style="text-align:center">
  <h2>Expanding Grid</h2>
  <p>Click on the boxes below:</p>
</div>

<!-- Three columns -->
<div class="i-am-centered">
<div class="row">
 
  <div class="acolumn"></div>
  <div class="column" onclick="openTab('b1');" style="background:green;">
    Box 1
  </div>
  <div class="acolumn"></div>
  <div class="column" onclick="openTab('b2');" style="background:blue;">
    Box 2
  </div>
  <div class="acolumn"></div>
  <div class="column" onclick="openTab('b3');" style="background:red;">
    Box 3
  </div>

  <div class="acolumn"></div>
  <div class="column" onclick="openTab('b3');" style="background:red;">
    Box 3
  </div>

 </div>




</body>
</html> 
