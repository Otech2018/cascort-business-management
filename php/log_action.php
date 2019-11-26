<?php      

if( isset($_POST['btn_login']) && isset($_POST['email2']) && isset($_POST['password']) ){
$email2 = addslashes(htmlentities($_POST['email2']));
$password = addslashes(htmlentities($_POST['password']));


	$web_master_login = new run_query(" SELECT * from users WHERE user_email ='$email2' and user_type='ADMIN' AND user_password ='$password'  " );

if( $web_master_login->num_rows >= 1){

 $user_data =	$web_master_login->result();
	extract($user_data );
		   
			if($user_status === 'BLOCKED' ){
            
           
						echo "<script> alert('HI, $name YOUR ACCOUNT HAS BEEN BLOCKED!!! \\n Contact the Admin ');
				window.location.replace('../');</script>";
		  
	 }
			
			else  if($user_status == 'ACTIVE' ){
              $_SESSION['admin'] = $user_id;
			  
			 echo "<script> window.location.replace('admin.php');</script>";

            }
            
            }else{
			 echo "<script>alert('Incorrect Details');
			 
			 window.location.replace(\"index.php\");</script>";
          
        }
		

}






?>