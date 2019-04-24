<?php   include('navbar.php'); 
          include('sidenave.php');
        
?>



   <h1 style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-weight: bold;">Dash Board</h1>
    
  <div class='alert alert-success' id="success-alert">
		<button class='close' data-dismiss='alert'>&times;</button>
		Welcome to the
    <strong> aanSoft</strong>
    </div>	

    <!-- Content Header (Page header) -->
    <!-- Main content -->
<div class="container">
    <section class="content" >
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner"><a href="#" style="color:white">
              <h3>Customer</h3>

              <p>Balance</p></a>
            </div>
            <div class="icon" style="padding-top:20px">
             <a href="#" > <i class="ion ion-person"></i></a>
            </div>
            <a href="#" class="small-box-footer">Click <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner"><a href="#" style="color:white">
              <h3>Supplier</h3>

              <p>Balance</p></a>
            </div>
            <div class="icon" style="padding-top:20px">
             <a href="#" > <i class="ion ion-man"></i>
            </div>
            <a href="#" class="small-box-footer">Click <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner"><a href="#" style="color:white">
              <h3>Cash In</h3>

              <p>Hand</p></a>
            </div>
            <div class="icon" style="padding-top:20px">
              <a href="#" ><i class="ion ion-social-usd"></i></a>
            </div>
            <a href="#" class="small-box-footer">Click <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner"><a href="#" style="color:white">
              <h3>Amount </h3>

              <p>Payable</p></a>
            </div>
            <div class="icon" style="padding-top:20px" >
              <a href="#" ><i class="ion ion-cash"></i></a>
            </div>
            <a href="#" class="small-box-footer">Click <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
	   <!-- Main content -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner"><a href="#" style="color:white">
              <h3>Todays</h3>

              <p>Sale</p></a>
            </div>
            <div class="icon"style="padding-top:20px" >
             <a href="#" > <i class="ion ion-stats-bars"></i></a>
            </div>
            <a href="#" class="small-box-footer">Click <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner"><a href="#" style="color:white">
              <h3>Todays</h3>

              <p>Perchase</p></a>
            </div>
            <div class="icon" style="padding-top:20px" >
              <a href="#" ><i class="ion ion-stats-bars"></i></a>
            </div>
            <a href="#" class="small-box-footer">Click <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner"><a href="#" style="color:white">
               <h3>Todays</h3>

              <p>Expenses</p></a>
            </div>
            <div class="icon" style="padding-top:20px" >
             <a href="#" > <i class="ion ion-stats-bars" ></i></a>
            </div>
            <a href="#" class="small-box-footer">Click <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner"><a href="#" style="color:white">
              <h3>Top Sale</h3>

              <p>Items</p></a>
            </div>
            <div class="icon" style="padding-top:20px" >
             <a href="#" > <i class="ion ion-arrow-graph-up-right"></i></a>
            </div>
            <a href="#" class="small-box-footer">Click <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->
		  <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Sales Graph</h3>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="knob-label">Mail-Orders</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="knob-label">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center">
                  <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="knob-label">In-Store</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
                        title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                        data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Visitors
              </h3>
            </div>
            <div class="box-body">
              <div id="world-map" style="height: 250px; width: 100%;"></div>
            </div>
            <!-- /.box-body-->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-1"></div>
                  <div class="knob-label">Visitors</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-2"></div>
                  <div class="knob-label">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center">
                  <div id="sparkline-3"></div>
                  <div class="knob-label">Exists</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->

         

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </section>
</div>
 <?php include('footer.php');?>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="script/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="script/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="script/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="script/raphael.min.js"></script>
<script src="script/morris.min.js"></script>
<!-- Sparkline -->
<script src="script/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="script/jquery-jvectormap-1.2.2.min.js"></script>
<script src="script/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="script/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="script/moment.min.js"></script>
<script src="script/daterangepicker.js"></script>

<script src="script/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="script/jquery.slimscroll.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="script/dashboard.js"></script>

