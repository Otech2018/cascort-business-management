<?php include('php/admin_settings.php'); ?> 




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=1024">
  <meta name="description" content="BUSINESS MGT SYSTEM">
  <meta name="author" content="MICROLINKCODE">

  <title> <?php echo "$title | DEBT PAYMENT  "; ?> </title>

    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <link href="index2.css" rel="stylesheet">

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


 <body id="page-top" >

  <div id="wrapper">

    <?php include('php/admin_nav_menu.php'); ?> 


      
              
                <div class="card-body">
                  <div class="table-responsive ">
                    <table class="table table-bordered print_mlc " id="all_customer" width="100%" cellspacing="0">
                      <thead>
					  <tr>
                            <th colspan='8' style='text-align:center; font-size:30px;'>DEBT PAYMENT TABLE</th>
                          
                        </tr>
                        <tr>
                            <th>ID</th>
							  <th>Date</th>
                           <th> Full Name</th>
                           <th> Phone-No</th>
                           <th> Amount</th>
                           <th> Collected By</th>
                        </tr>
                      </thead>
        
                            <tbody>
                               
							       	<?php 
					$all_debt_payment = new run_query("select * from   debt_payment  ");
 
					if( $all_debt_payment->num_rows >= 1){
						$no = 1;
					while( $all_debt_payment_data =	$all_debt_payment->result() ){
						extract($all_debt_payment_data );
						
						echo " 
                             <tr >
                                  <td> $no </td>
                                  <td> $debt_payment_date </td>
                                  <td> $debt_customer_name </td>
                                  <td> $debt_customer_phone </td>
                                  <td> $debt_amt_paid </td>
                                  <td> $debt_staff </td>
								    
                                </tr>";
								
						$no ++;
						}
						
					
								
						
						
						}else{
						echo "    <tr>
                           
                                <td colspan='8'>No Customer </td>
                              
                              </tr> ";
						
						}
					
					
					?>
                         
                      </tbody>
                    </table><br><br>
					<center>
                    <button class="btn btn-success op" onclick=' window.print();'>PRINT</button>
					</center>
                  </div>
                </div>
              </div>
        
   
        
  

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="js/sb-admin-2.min.js"></script>

 <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $("#all_customer").dataTable();
  })
  
  
  </script>

</body>

</html>
