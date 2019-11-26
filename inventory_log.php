<?php include('php/admin_settings.php'); ?> 




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=1024">
  <meta name="description" content="BUSINESS MGT SYSTEM">
  <meta name="author" content="MICROLINKCODE">

  <title> <?php echo "$title |  STOCK "; ?> </title>

  <!-- Custom fonts-->
      <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles -->
  <link rel="stylesheet" href="index2.css" >
  
  <style>
@media print {


    .print_mlc {
	  width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
		
	 }
	 
.navbar-nav, .op{

display:none;
}
	
}
</style>
</head>

<body id="page-top">


    <div id="wrapper">

        <?php include('php/admin_nav_menu.php');  ?>
  
     
   
          
          <br>
          <div class="card shadow mb-4">
             
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered print_mlc" id="all_stock" width="100%" cellspacing="0">
                    <thead>
					 <tr>
                        <th colspan='6' style='text-align:center; font-size:35px;'>INVENTORY</th>
                       
                      </tr>
                      <tr>
                        <th>S/N</th>
                        <th>DATE</th>
						 <th>PRODUCTS</th>
                        <th>NUM OF PROD ADDED</th>
                        <th>ADD BY</th>
                      
                      </tr>
                    </thead>
                    
                    <tbody>
					
												       	<?php 
					
					if( $all_inventory->num_rows >= 1){
					$no = 1;
					while( $all_inventory_data =	$all_inventory->result() ){
						extract($all_inventory_data );
						
	
					echo "
									<tr>
										<td> $no </td>
										<td> $inventory_date </td>
										<td> $inventory_product_name </td>
										<td> $inventory_no_add </td>
										<td> $inventory_user_added </td>
									 </tr>
					
					";
					
					$no ++;
						}
						
						}
						
						?>
                      
                    
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
              <button onclick=' window.print();' class="btn btn-primary btn-user btn-block op">
                    Print!
                  </button>
             
      
    </div>

    
    </div>
    
    </div>
</body>
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
  
   <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $("#all_stock").dataTable();
  })
  
  
  </script>

</body>
</html>