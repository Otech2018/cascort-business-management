

<?php 


include('../g_php/general_settings.php'); 



    if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
	
	    $user_data_id = $_SESSION['admin'];
  
	$web_master_data = new run_query("select * from users where user_id  = '$user_data_id' and user_type='ADMIN' and user_status ='ACTIVE'");
 
if( $web_master_data->num_rows >= 1){

 $web_master_data1 =	$web_master_data->result();
	extract($web_master_data1 );
	

	}
	
    }else{
     echo "<script>window.location.replace(\"index.php\");</script>"; 
    }



	 /**
if( $all_category->num_rows >= 1){

 $all_category_data =	$all_category->result();
	extract($all_category_data );
	

	}
	***/
	
		// getting the category ends here
		
		
		
		
		
		$all_inventory = new run_query("select * from   inventory  ");
 
     $all_inventory_tottal =  $all_inventory->num_rows;
	 
		
	// getting the category starts here
		$all_transactions = new run_query("select * from   transactions  ");
 
     $total_transactions =  $all_transactions->num_rows;
	 
	 
		 
		 	// getting the custormer starts here
		$all_custormer = new run_query("select * from   customer  where customer_status='ACTIVE'  ");
 
     $total_no_custormer =  $all_custormer->num_rows;
	 
	 
	 	$total_stock = new run_query(" select sum(product_no_stock) as total_sum from   product  where product_status='ACTIVE'   ");
 
     $total_no_stock =  $total_stock->result();
	 	extract($total_no_stock );
		
		
		$all_users = new run_query("select * from   users  where user_status='ACTIVE'  ");
 
     $total_no_users =  $all_users->num_rows;
	 
	 
	 
	 	$all_product = new run_query("select * from   product  where product_status='ACTIVE'  ");
 
     $total_no_product =  $all_product->num_rows;
	 
	 	 /**
		 
		 
if( $all_product->num_rows >= 1){

 $all_product_data =	$all_product->result();
	extract($all_product_data );
	

	}
	
		***/


		// getting the category ends here
	
?> 




