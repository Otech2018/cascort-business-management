<?php include('php/admin_settings.php'); ?> 




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=1024">
  <meta name="description" content="BUSINESS MGT SYSTEM">
  <meta name="author" content="MICROLINKCODE">

  <title> <?php echo "$title | ALL STAFF "; ?> </title>

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
                            <th colspan='8' style='text-align:center; font-size:30px;'>STAFF TABLE</th>
                          
                        </tr>
                        <tr>
                            <th>ID</th>
                           <th> Full Name</th>
                           <th> Phone-No</th>
                           <th> Address</th>
                           <th> Type</th>
						   <th>PASSWORD</th>
                           <th class='op'>Option</th>
                        </tr>
                      </thead>
        
                            <tbody>
                               
							       	<?php 
					
					if( $all_users->num_rows >= 1){

					while( $all_users_data =	$all_users->result() ){
						extract($all_users_data );
						
						echo " 
                             <tr  >
                                  <td> $user_id </td>
                                  <td> $user_name </td>
                                  <td> $user_phone </td>
                                 <td> $user_email </td>
                                  <td> $user_type </td>
								    <td>$user_password  </td>
                                  <td class='op'>
								  <form method='POST' >
								  <a href='edit_staff.php?cus_id=$user_id'  title='Edit'><i class='fa fa-edit ' ></i></a> 
								     &nbsp;
									 <button type='submit'  name='btn_del$user_id' style='color:red;' title='Delete'><i class='fa fa-trash' ></i> </button>
																							 
								   </form>
																														 
																					
								 </td>
                                </tr>";
								
								
								
																						if(isset($_POST['btn_del'.$user_id])){
										 
															
															$delete_staff = new run_query(" update users set user_status ='NOT_ACTIVE'  where user_id='$user_id' " );
															
																  echo "<script>alert('STAFF DELETED SUCCESSFULLY!!! ');
																		 
																		 window.location.replace(\"all_staff.php\");</script>";
																	 
															}
						
						}
						}else{
						echo "    <tr>
                           
                                <td colspan='8'>No Staff </td>
                              
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
