<?php include('php/admin_settings.php'); ?> 




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=1024">
  <meta name="description" content="BUSINESS MGT SYSTEM">
  <meta name="author" content="MICROLINKCODE">

  <title> <?php echo "$title | DASHBOARD "; ?> </title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="index2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include('php/admin_nav_menu.php'); ?> 

     <br>
     <br>
     <br>
      <!-- Content Row -->
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                 
                  <a href="#!"  class="h5 mb-0 font-weight-bold text-gray-800"> ALL PRODUCTS </a> 
                </div>
                <div class="col-auto">
                  <i class="fas fa-cart-arrow-down fa-2x text-gray-300">  <?php echo $total_no_product; ?>  </i> 
                  </div>
                
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                  
					
					  <a href="#!" class="h5 mb-0 font-weight-bold text-gray-800"> ALL STOCK </a> 
                </div>
                <div class="col-auto">
                  <i class="fas fa-table fa-2x text-gray-300">  <?php echo $total_sum; ?>  </i> 
                  </div>
				  
				  
                </div>
              </div>
            </div>
          </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                   
                      <a href="#!"  class="h5 mb-0 font-weight-bold text-gray-800"> INVENTORY </a> 
                </div>
                <div class="col-auto">
                  <i class="fas fa-table fa-2x text-gray-300">  <?php echo $all_inventory_tottal; ?>  </i> 
                  </div>
                </div>
              </div>
            </div>
          </div>

     
          
           
    <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
