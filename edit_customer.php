<?php include('php/admin_settings.php'); ?> 




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=1024">
  <meta name="description" content="BUSINESS MGT SYSTEM">
  <meta name="author" content="MICROLINKCODE">

  <title> <?php echo "$title | REGISTER CUSTOMER "; ?> </title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <link href="index2.css" rel="stylesheet">

</head>

<body id="page-top">

  <div id="wrapper">

  
    <?php include('php/admin_nav_menu.php'); 
	
	
	


if( isset($_POST['cus_reg_btn'])  && isset($_POST['cus_type']) ){
$cus_name = addslashes(htmlentities($_POST['cus_name']));
$cus_address = addslashes(htmlentities($_POST['cus_address']));
$cus_email = addslashes(htmlentities($_POST['cus_email']));
$cus_type = addslashes(htmlentities($_POST['cus_type']));
$customer_id  = addslashes(htmlentities($_POST['customer_id']));
	
										
	$edit_custormer = new run_query(" update customer set customer_name ='$cus_name' ,  customer_type ='$cus_type' ,  customer_email ='$cus_email' ,  customer_address ='$cus_address' ,  customer_date_updated='$reg_Date'   where customer_id='$customer_id' " );

	  echo "<script>alert('Customer Edited Successfully!!! ');
			 
			 window.location.replace(\"all_customer.php\");</script>";
         
}




if( isset($_GET['cus_id']) ){
$get_id = $_GET['cus_id'];
$get_custormer = new run_query("select * from   customer  where customer_id='$get_id'  ");
  
if( $get_custormer->num_rows >= 1){

					while( $get_custormer_data =	$get_custormer->result() ){
						extract($get_custormer_data );

?> 



    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 id="head" class="h4 text-gray-900 mb-4"><i class='fa fa-edit '></i> Customer</h1>
              </div>
              <hr id="hea" class="sidebar-divider my-0"><br><br>
              <form class="user" method='POST'>
                <div id="ok" class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Customer Full Name" name='cus_name' required='required'  value="<?php  echo $customer_name; ?>" />
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Customer Address" name='cus_address' required='required'   value="<?php  echo $customer_address; ?>" />
                  </div>
                </div>
                <div id="ok" class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Customer Email Address - (Optional)" name='cus_email'    value="<?php  echo $customer_email; ?>" />
                </div>
                <div id="ok" class="form-group">  
                  <input type="number" class="form-control form-control-user" id="exampleInputEmail" placeholder="Customer Phone Number" name='cus_no' required='required'   disabled value="<?php  echo $customer_phone; ?>" />
               
					    <input type="hidden" name='customer_id'  value="<?php  echo $customer_id; ?>" />
              
			   </div>
                <div id="ok" class="form-group">
                    <select class="form-control custom-select"  name='cus_type'  required="required" >
						<option  disabled  hidden  selected value='' > SELECT TYPE * </option>
						<option value='INDIVIDUAL' > INDIVIDUAL </option>
						<option value='COMPANY' > COMPANY </option>
					</select>
                  </div>
				  
				  
				 <div id="ok" class="form-group">
                <button type='submit' class="btn btn-primary btn-user btn-block"  name='cus_reg_btn' >
                  Edit Customer
                </button>
				</div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <?php
  
 	}}
    }else{
     echo "<script>window.location.replace(\"index.php\");</script>"; 
    }
  
  ?>
  <style>
   
     #blue{
      background-color: hsl(54, 83%, 45%);
    }
 #shift{
      height: 25rem;
      
    }
    .collapse{
      width: 12.7rem;
    }

#head{
  position: relative;
  left: 14rem;
}
#hea{
  position: relative;
  left: 15rem;
}
    #ok{
      position: relative;
      left: 14rem;
    }
    </style>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
