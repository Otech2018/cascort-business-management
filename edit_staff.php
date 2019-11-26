<?php include('php/admin_settings.php'); ?> 




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=1024">
  <meta name="description" content="BUSINESS MGT SYSTEM">
  <meta name="author" content="MICROLINKCODE">

  <title> <?php echo "$title | EDIT STAFF "; ?> </title>

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
$cus_no = addslashes(htmlentities($_POST['cus_no']));
$cus_type = addslashes(htmlentities($_POST['cus_type']));
$customer_id  = addslashes(htmlentities($_POST['customer_id']));
	
										
	$edit_custormer = new run_query(" update users set user_name ='$cus_name' ,  user_type ='$cus_type' ,  user_phone ='$cus_no' ,  user_password ='$cus_address' ,  user_date_updated='$reg_Date'   where user_id='$customer_id' " );

	  echo "<script>alert('Staff Edited Successfully!!! ');
			 
			 window.location.replace(\"all_staff.php\");</script>";
         
}




if( isset($_GET['cus_id']) ){
$get_id = $_GET['cus_id'];
$get_custormer = new run_query("select * from   users  where user_id='$get_id'  ");
  
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
                <h1 id="head" class="h4 text-gray-900 mb-4"><i class='fa fa-edit '></i> EDIT STAFF</h1>
              </div>
              <hr id="hea" class="sidebar-divider my-0"><br><br>
              <form class="user" method='POST'>
                <div id="ok" class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder=" Full Name" name='cus_name' required='required'  value="<?php  echo $user_name; ?>" />
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleLastName" placeholder="Password" name='cus_address' required='required'   value="<?php  echo $user_password; ?>" />
                  </div>
                </div>
                <div id="ok" class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder=" Email Address" name='cus_email'   disabled  value="<?php  echo $user_email; ?>" />
                </div>
                <div id="ok" class="form-group">  
                  <input type="number" class="form-control form-control-user" id="exampleInputEmail" placeholder=" Phone Number" name='cus_no' required='required'    value="<?php  echo $user_phone; ?>" />
               
					    <input type="hidden" name='customer_id'  value="<?php  echo $user_id; ?>" />
              
			   </div>
                <div id="ok" class="form-group">
                    <select class="form-control custom-select"  name='cus_type'  required="required" >
						<option  disabled  hidden  selected value='' > SELECT TYPE * </option>
						<option value='ADMIN' > ADMIN </option>
						<option value='SALES' > SALES </option>
							<option value='STOCK' > STOCK </option>
						<option value='WEBMASTER' > WEBMASTER </option>
					</select>
                  </div>
				  
				  
				 <div id="ok" class="form-group">
                <button type='submit' class="btn btn-primary btn-user btn-block"  name='cus_reg_btn' >
                  Edit Staff
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
