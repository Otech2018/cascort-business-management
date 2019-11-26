<?php include('php/admin_settings.php'); ?> 




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=1024">
  <meta name="description" content="BUSINESS MGT SYSTEM">
  <meta name="author" content="MICROLINKCODE">

  <title> <?php echo "$title | ALL CUSTOMER "; ?> </title>

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
                            <th colspan='8' style='text-align:center; font-size:30px;'>CUSTOMER TABLE</th>
                          
                        </tr>
                        <tr>
                            <th>ID</th>
                           <th> Full Name</th>
                           <th> Phone-No</th>
                           <th> Address</th>
                           <th> Email-Address</th>
                           <th> Type</th>
						   <th>Owing</th>
                           <th class='op'>Option</th>
                        </tr>
                      </thead>
        
                            <tbody>
                               
							       	<?php 
					
					if( $all_custormer->num_rows >= 1){

					while( $all_custormer_data =	$all_custormer->result() ){
						extract($all_custormer_data );
						$owing_status = "";
						$owing_status1 = "-";
						$pay_debt_now=	"  ";
						if( $custormer_amt_owing !=0){
						$owing_status = "style=' color:red;' ";
						$owing_status1 = "Owing $custormer_amt_owing ";
						$pay_debt_now=	" <a  title='Pay Some debt' href='#!' data-toggle='modal' data-target='#modal$customer_id' ><i class='fa fa-plus' ></i></a>  
								 ";
						}else{
						$owing_status = "";
							$owing_status1 = "-";
							
						$pay_debt_now=	"  ";
						}
						echo " 
                             <tr $owing_status >
                                  <td> $customer_id </td>
                                  <td> $customer_name </td>
                                  <td> $customer_phone </td>
                                  <td> $customer_address </td>
                                  <td> $customer_email </td>
                                  <td> $customer_type </td>
								    <td>$owing_status1  </td>
                                  <td class='op'>
								  <a href='edit_customer.php?cus_id=$customer_id'  title='Edit'><i class='fa fa-edit ' ></i></a> 
								     &nbsp;
								$pay_debt_now
																														 
																						<form method='POST'>
																						<div class='modal fade' id='modal$customer_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
																						  <div class='modal-dialog' role='document'>
																							<div class='modal-content'>
																							  <div class='modal-header'>
																								<h5 class='modal-title' id='exampleModalLabel'>PAY SOME DEBT</h5>
																								<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
																								  <span aria-hidden='true'>&times;</span>
																								</button>
																							  </div>
																							  <div class='modal-body'>
																							  <center>
																							  <h4> $customer_name </h4>
																							  <h6>( $customer_phone )</h6>
																							  Amt Owing: $custormer_amt_owing
																							   </center>
																								<div class='input-group mb-3'>
																						  <div class='input-group-prepend'>
																							<span class='input-group-text' id='basic-addon1'>Enter Amt</span>
																						  </div>
																						  <input type='number' class='form-control' name='debt' aria-label='Username' aria-describedby='basic-addon1' required='required'  >
																						</div>



																							  </div>
																							  <div class='modal-footer'>
																								<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
																								<button type='submit'  name='btn_debt$customer_id' class='btn btn-success'>Save </button>
																							  </div>
																							</div>
																						  </div>
																						</div>
																						</form>
								 </td>
                                </tr>";
								
								
								
								
																						if(isset($_POST['btn_debt'.$customer_id])){
										 
															$debt = addslashes(htmlentities($_POST['debt']));
															
															$new_custormer_amt_owing = $custormer_amt_owing - 	$debt;								
																$edit_amt_custormer = new run_query(" update customer set custormer_amt_owing ='$new_custormer_amt_owing'  where customer_id='$customer_id' " );
															$activity_log = new run_query(" insert into activity_track set activity_desc='A CUSTORMER BY NAME $customer_name WHO WAS OWING $custormer_amt_owing PAID $debt . AMOUNT OWING NOW IS $new_custormer_amt_owing. THE MONEY WAS RECIEVED BY $user_name (ID: $user_id) ',  activity_status='DEBT_PAID',  activity_date='$reg_Date' " );
															$debt_save = new run_query(" insert into debt_payment set debt_customer_name='$customer_name',  debt_customer_phone='$customer_phone', debt_amt_paid='$debt', debt_staff='$user_name (ID: $user_id) ', debt_payment_date='$reg_Date' " );

																  echo "<script>alert('Customer Amt Owing Updated  Successfully!!! ');
																		 
																		 window.location.replace(\"all_customer.php\");</script>";
																	 
															}
						
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
