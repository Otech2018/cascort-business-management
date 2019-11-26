<?php include('php/admin_settings.php'); ?> 




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=1024">
  <meta name="description" content="BUSINESS MGT SYSTEM">
  <meta name="author" content="MICROLINKCODE">

  <title> <?php echo "$title | REGISTER STAFF "; ?> </title>

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
$cus_no = addslashes(htmlentities($_POST['cus_no']));
$cus_type = addslashes(htmlentities($_POST['cus_type']));

	//check user existence
									$query =new run_query(" SELECT * from users where user_email ='$cus_email'  ");
									if( $query->num_rows == 0){
										
	$add_custormer = new run_query(" insert into users set user_name ='$cus_name' ,  user_type ='$cus_type' ,  user_email ='$cus_email' ,  user_password ='$cus_address' ,  user_phone ='$cus_no' , user_status='ACTIVE', user_date_created='$reg_Date', user_date_updated='$reg_Date' " );

	  echo "<script>alert('Staff Registered Successfully!!! ');
			 
			 window.location.replace(\"add_staff.php\");</script>";
          }else{
		  
		    echo "<script>alert('This Email has been Used To Register A Staff '); </script>";
		  }

}

?> 



    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 id="head" class="h4 text-gray-900 mb-4"> <i class='fa fa-user '></i> ADD NEW STAFF </h1>
              </div>
              <hr id="hea" class="sidebar-divider my-0"><br><br>
              <form class="user" method='POST'>
                <div id="ok" class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder=" Full Name" name='cus_name' required='required'  value="<?php if(isset($cus_name)){echo $cus_name;}?>" />
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleLastName" placeholder=" Password" name='cus_address' required='required'   value="<?php if(isset($cus_address)){echo $cus_address;}?>" />
                  </div>
                </div>
                <div id="ok" class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder=" Email Address " name='cus_email'  required='required'  value="<?php if(isset($cus_email)){echo $cus_email;}?>" />
                </div>
                <div id="ok" class="form-group">
                  <input type="number" class="form-control form-control-user" id="exampleInputEmail" placeholder=" Phone Number" name='cus_no' required='required'   value="<?php if(isset($cus_no)){echo $cus_no;}?>" />
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
                  Add Staff
                </button>
				</div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  
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
