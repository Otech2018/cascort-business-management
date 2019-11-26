<?php include('php/admin_settings.php'); 


if( isset($_POST['more_product'])){

  $cus_name = addslashes(htmlentities($_POST['cus_name']));
$cus_phone = addslashes(htmlentities($_POST['cus_phone']));
$prod_id = addslashes(htmlentities($_POST['prod_id']));
$selling_pricee = addslashes(htmlentities($_POST['selling_price']));
  $num_items = addslashes(htmlentities($_POST['num_items']));
$total = addslashes(htmlentities($_POST['total']));
$payment_method = "CREDITf";

$date_r = date('dmy');
$receipt = $date_r.''.$cus_phone;
	$search_product = new run_query("select * from   product  where product_status='ACTIVE'  and product_id='$prod_id' "); 
		 
if( $search_product->num_rows >= 1){

 $search_product_data =	$search_product->result();
	extract($search_product_data );
	
	$profit_per_one = $selling_pricee - $cost_price;
	$profit = $profit_per_one *  $num_items;
	$new_stock = $product_no_stock -  $num_items;
	
$search_product_cart = new run_query("select * from   transactions  where receipt='$receipt'  and tran_prod_id='$prod_id' "); 
		 
if( $search_product_cart->num_rows >= 1){

 $search_product_cart_data =	$search_product_cart->result();
	extract($search_product_cart_data );
	$num_items_new =  $num_items + $tran_num_items; 
	$profit_new =  $profit  +  $tran_profit;
	 $total_new =  $total + $tran_total;
	 
	 $update_tran = new run_query("update    transactions  set tran_total='$total_new',  tran_profit='$profit_new', tran_num_items='$num_items_new' where receipt='$receipt'  and tran_prod_id='$prod_id'  "); 
	
	//save transaction and update stock here
	}else{
	$add_transaction = new run_query("insert into    transactions  set tran_custormer_name='$cus_name', tran_prod_id='$prod_id', tran_custormer_phone='$cus_phone', tran_product='$product_name', tran_selling_price='$selling_pricee', tran_cost_price='$cost_price', tran_num_items='$num_items', tran_profit='$profit', tran_total='$total', tran_payment_method='$payment_method' , receipt='$receipt', tran_date='$reg_Date' "); 
	
	}
	
	$add_stock = new run_query("update    product  set product_no_stock='$new_stock' where  product_id='$prod_id' "); 
	
	echo "<script>
			 
			 window.location.replace(\"add_transaction.php?cus_phone=$cus_phone&cus_name=$cus_name&reciept=$receipt\");</script>";

	}else{
	 echo "<script>alert('Error Ocurred try Again !!!');
			 
			window.location.replace(\"add_transaction.php?cus_phone=$cus_phone&cus_name=$cus_name&reciept=$receipt\");</script>";

	}
 
}





if( isset($_POST['save_print']) && isset($_POST['cus_na']) && isset($_POST['cus_ph'])){

  $cus_na = addslashes(htmlentities($_POST['cus_na']));
$cus_ph = addslashes(htmlentities($_POST['cus_ph']));
  $total = addslashes(htmlentities($_POST['total']));
$amt_paid = addslashes(htmlentities($_POST['amt_paid']));
  $amt_bal = addslashes(htmlentities($_POST['amt_bal']));




$date_r = date('dmy');
$receipt = $date_r.''.$cus_ph;


$search_product_cart = new run_query("select * from   transactions  where receipt='$receipt'  and tran_product='TOTAL' "); 
		 
if( $search_product_cart->num_rows >= 1){

 $search_product_cart_data =	$search_product_cart->result();
	extract($search_product_cart_data );
	
	 $update_tran = new run_query("update    transactions  set tran_grand_total='$total',  tran_payed='$amt_paid',  tran_date='$reg_Date' ,  tran_bal='$amt_bal' where receipt='$receipt'  and tran_product='TOTAL' "); 
	
	//save transaction and update stock here
	}else{
	$add_transaction = new run_query("insert into    transactions  set tran_grand_total='$total',  tran_payed='$amt_paid', tran_bal='$amt_bal' , receipt='$receipt' , tran_product='TOTAL', tran_date='$reg_Date'  "); 
	}
	

	$search_custormer = new run_query("select * from   customer  where  customer_phone='$cus_ph' "); 
		 
if( $search_custormer->num_rows >= 1){

 $search_custormer_data =	$search_custormer->result();
	extract($search_custormer_data );
	$new_custormer_amt_owing = $custormer_amt_owing + $amt_bal;
	
	$update_debt_custormer = new run_query("update   customer  set custormer_amt_owing='$new_custormer_amt_owing' where  customer_phone='$cus_ph' "); 
	
	}else{
	$add_custormer = new run_query(" insert into customer set customer_name ='$cus_na' , custormer_amt_owing='$amt_bal',   customer_phone ='$cus_ph' , customer_status='ACTIVE', customer_date_updated='$reg_Date', customer_date_created='$reg_Date' " );

	}


	
	echo "<script>
			 
			 
			 window.location.replace(\"print_transaction.php?reciept=$receipt&cus_phone=$cus_ph&cus_name=$cus_na\");</script>";

}
?> 




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=1024">
  <meta name="description" content="BUSINESS MGT SYSTEM">
  <meta name="author" content="MICROLINKCODE">

  <title> <?php echo "$title | ADD TRANSACTION "; ?> </title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  
    <style>
  /**
 * Variables
 */
/**
 * Wrapper
 */
.combo-select {
	position: relative;
	border-bottom: solid 1px #d2d2d2;
	max-width: 400px;
	font: 100% Helvetica, Arial, Sans-serif;
	font-size: 14px;
}
.combo-select .combo-input {
	margin-bottom: 0;
}
/**
 * Input field
 */
.combo-input {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	margin: 0;
	text-overflow: ellipsis;
	white-space: nowrap;
	border: none;
	width: 100%;
	box-sizing: border-box;
	padding: 0;
	height: 34px;
	line-height: 34px;
	padding-right: 34px;
	border-radius: 0px;
	font-size: 14px;
}
.combo-input:focus {
	outline: none;
}
/**
 * Arrow
 */
.combo-arrow {
	position: absolute;
	right: 0;
	top: 0;
	height: 100%;
	cursor: pointer;
	text-align: center;
	font-size: 22px;
	width: 40px;
	color: black;
}
.combo-arrow:before {
	content: "\f107";
	font-family: 'FontAwesome';
	font-size: 22px;
	top: -25px;
	display: block;
	width: 0;
	height: 0;
	right: 25px;
	bottom: 0;
	position: absolute;
	margin: auto 0;
}
/**
 * When opened
 */
.combo-open .combo-arrow {
	border-color: #51A7E8;
}
.combo-open .combo-arrow:before {
	content: "\f106";
}
/**
 * When focused
 */
.combo-focus {
box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  border-color: #51A7E8; 
  }
.combo-focus input {
	border-color: #51A7E8;
}
/**
 * Hide native select
 */
.combo-select select {
	position: absolute;
	z-index: 1;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	-webkit-appearance: none;
	opacity: 0;
}

@media only screen and (min-width: 960px) {
.combo-select select {
	left: -1px;
	top: -1px;
	width: 0;
	height: 0;
	margin: 0;
}
}
/**
 * Selected option
 */
.option-selected {
	display:none;;
}
/**
 * Hovered option
 */
.option-hover {
	background-color: #dfdfdf;
	color: black;
}
/**
 * Option item
 */
.option-item {
	cursor: pointer;
		color: black;
/*border-bottom: 1px #e3e3e3 solid;*/ }

.option-item:hover {
	background-color: #efefef;
	color: black;
}
.option-item:last-child {
	border-bottom: none;
}
/**
 * Disabled and optgroups
 */
/*.option-group {
  cursor: text;
  font-weight: 600;
  background: #e1e1e1;
  border: 1px #ccc solid;
  border-width: 1px 0; }*/

/**
 * Disabled
 */
.option-disabled {
	opacity: 0.5;
}
/**
 * Dropdown
 */
.combo-dropdown {
	position: absolute;
	z-index: 999;
	top: 100%;
	left: 0;
	min-width: 100%;
	max-width: 300px;
	max-height: 270px;
	margin: 0;
	padding: 0;
	opacity: 0;
	visibility: hidden;
	/*display: none;*/
	overflow-y: auto;
	background: #fff;
	box-shadow: 0 1px 6px rgba(0, 0, 0, 0.12), 0 1px 6px rgba(0, 0, 0, 0.12);
	-webkit-transition: all 0.2s ease-out;
	-ms-transition: all 0.2s ease-out;
	transition: all 0.2s ease-out;
	border-radius: 0;
	box-sizing: border-box;
	-webkit-transform: scale(0);
	-ms-transform: scale(0);
	transform: scale(0);
	-webkit-transform-origin: top left;
	-ms-transform-origin: top left;
	transform-origin: top left;
}
.combo-dropdown li {
	list-style: none;
	padding: 10px 15px;
	margin: 0 !important;
}
/**
 * On Active
 */
.combo-open .combo-dropdown {
	/*display: block; */
	-webkit-transform: scale(1);
	-ms-transform: scale(1);
	transform: scale(1);
	opacity: 1;
	visibility: visible;
}
/**
 * Search marker
 */
.combo-marker {
	text-decoration: underline;
}

  
  </style>
  
  
</head>

<body id="page-top">

  <div id="wrapper">

      <?php include('php/admin_nav_menu.php'); ?> 


    <div  style='padding;10px; border-radius:15px;'>
         <form   method='POST'   >
                <h1 class="header1 text-center">Add Transaction </h1>
              
              
		   <div id="ok" class="form-group row" style='border:2px solid #cccccc; border-radius:15px; padding:20px; margin:20px; background-color:#bbdefb !important;'>
                  <div class="col-sm-6 mb-3 mb-sm-0">
						  <div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">CUSTOMER NAME</span>
						  </div>
						  <input type="text" class="form-control" <?php if(isset($_GET['cus_name'])){ $cus_name = $_GET['cus_name'];   echo "value='$cus_name'  readonly ";  }?>  required='required' name='cus_name'>
						</div>
				</div>
                  <div class="col-sm-6">
							<div class="input-group mb-3">
							<div class="input-group-prepend">
							  <span class="input-group-text" id="basic-addon3">CUSTOMER PHONE(ID)</span>
							</div>
							<input type="text" class="form-control"  <?php if(isset($_GET['cus_phone'])){  $cus_phone = $_GET['cus_phone'];  echo "value='$cus_phone'  readonly "; }?> required='required' name='cus_phone'>
						  </div>
				 </div>
                </div>
    
	   <div id="ok" class="form-group row" style='border:2px solid #cccccc; border-radius:15px; padding:20px; margin:20px; background-color:#bbdefb !important;'>
                  <div class="col-sm-4 mb-3 mb-sm-0">
									  <div class="input-group mb-3">
										<div class="input-group-prepend">
										  <label class="input-group-text" for="inputGroupSelect01">PRODUCT</label>
										</div>
										<select class="search-select "  id="product" name='prod_id' required onchange="sp_value();"  >
									   <option value='' disabled selected >   Type To Search  </option>
											<?php 
											if( $all_product->num_rows >= 1){

										while( $all_product_data =	$all_product->result() ){
												extract($all_product_data );
												
												echo"
														 <option value='$product_id'  title='$selling_price'> $product_name  ($product_no_stock Creates in stock)</option>
														 
											";
											}
											
											}
											
											?>
											 
											</select> 
									  </div>
				</div>
                  <div class="col-sm-2">
							   <div class="input-group mb-3">
								  <div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">QTY</span>
								  </div>
								  <input type="number" class="form-control" id="n_item"onchange='get_total();'   onkeyup='get_total();' aria-describedby="basic-addon3" value='0'  min='1'   required='required' name='num_items'>
								</div>
				 </div>
				 
				  <div class="col-sm-2 mb-3 mb-sm-0">
							<div class="input-group mb-3">
								  <div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3"> PRICE</span>
								  </div>
								  <input type="number" class="form-control" id="sp" aria-describedby="basic-addon3" onkeyup='get_total();' value='0' readonly  required='required' name='selling_price'>
								</div>
				</div>
                  <div class="col-sm-3">
							 <div class="input-group mb-3">
								<div class="input-group-prepend">
								  <span class="input-group-text" id="basic-addon3">TOTAL </span>
								</div>
								<input type="text" class="form-control" id="total"  readonly   required='required' name='total'>
							  </div>
				 </div>
				 
				 
				   <div class="col-sm-1">
							  <button  type='submit' class='btn btn-success' name='more_product'> <i class='fa fa-plus'></i></button>
				 </div>
				 
				 
                </div>
      
            
       	</form>	  
      
	    <div id="ok" class="form-group row" >
                  <div class="col-sm-6 mb-3 mb-sm-0" style='border:2px solid #cccccc; border-radius:15px; padding:10px; '>
						 
						 
						 
						 
						 
						 
																  <table class="table table-bordered table-striped">
															<thead>
															  <tr>
																<th>Qty</th>
																	   
																<th>Product Name</th>
																			<th>Price</th>
																			<th>Total</th>
																<th>Action</th>
															  </tr>
															</thead>
															<tbody>
									<?php
									
									if(isset($_GET['reciept']) ) { 
									  $reciept = $_GET['reciept'];  
									  $reciept_get = new run_query("select * from   transactions where receipt='$reciept'  and tran_product !='TOTAL' ");
								 if( $reciept_get->num_rows >= 1){
									 while( $reciept_get_data =	$reciept_get->result() ){
														extract($reciept_get_data );
														
													$tran_selling_price =	 number_format($tran_selling_price,2); 
														$tran_total=   number_format($tran_total,2); 
									  
									  echo "
									  
									   <tr>
											<td> $tran_num_items </td>
											<td> $tran_product </td>
											<td> $tran_selling_price   </td>
											
											<td> <b>$tran_total </b></td>
											
											
											
																		<td>
																												
																												<a href='#updateordinance$tran_id' data-target='#updateordinance$tran_id' data-toggle='modal' style='color:blue;' class='small-box-footer'><i class='fa fa-edit '></i></a>

																								  <a href='#delete2' data-target='#delete$tran_id' data-toggle='modal' style='color:red;' class='small-box-footer'><i class='fa fa-trash '></i></a>
																								  
																										
																										
																										  <div id='updateordinance$tran_id' class='modal fade in' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
																						<div class='modal-dialog'>
																						  <div class='modal-content' style='height:auto'>
																								  <div class='modal-header'>
																									<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
																									  <span aria-hidden='true'>×</span></button>
																									<p class='modal-title'>Update Sales Details</p>
																								  </div>
																								  <div class='modal-body'>
																								  <form class='form-horizontal' method='post'>
																								<div class='form-group'>
																										<label class='control-label col-lg-3' for='price'>Qty</label>
																										<div class='col-lg-9'>
																										  <input type='number' class='form-control' id='price' name='qty$tran_id' value='$tran_num_items'  min='1' required>  
																										</div>
																									</div>
																									
																								  </div><br>
																								  <div class='modal-footer'>
																										<button type='submit' class='btn btn-primary' name='edit_prod$tran_id'>Save changes</button>
																									<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
																								  </div>
																								  </form>
																								</div>
																								
																							</div><!--end of modal-dialog-->
																					 </div>
																					 <!--end of modal-->  
																					<div id='delete$tran_id' class='modal fade in' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
																					  <div class='modal-dialog'>
																						<div class='modal-content' style='height:auto'>
																								  <div class='modal-header'>
																									<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
																									  <span aria-hidden='true'>×</span></button>
																									<p class='modal-title'>Delete Item</p>
																								  </div>
																								  <div class='modal-body'>
																							<form class='form-horizontal' method='post'>
																							<p>Are you sure you want to remove $tran_product?</p>
																							
																								  </div><br>
																								  <div class='modal-footer'>
																									<button type='submit' class='btn btn-primary' name='delete$tran_id'>Delete</button>
																									<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
																								  </div>
																							</form>
																								</div>
																						  
																							</div><!--end of modal-dialog-->
																					 </div>
																					 <!--end of modal-->  
																						</td>	  
														
										</tr>
									  
									  ";
									  
									  
									  
									    	if(isset($_POST['edit_prod'.$tran_id])){
											
											
															$search_product_cart = new run_query("select * from   transactions  where  tran_id='$tran_id' "); 
		 
				
													 $search_product_cart_data =	$search_product_cart->result();
														extract($search_product_cart_data );
														$num_items_new =  $_POST['qty'.$tran_id];
														$profit_new =  $num_items_new  *  $tran_profit;
														 $total_new =  $num_items_new  *   $tran_selling_price;
														 
														 $update_tran = new run_query("update    transactions  set tran_total='$total_new',  tran_profit='$profit_new', tran_num_items='$num_items_new' where  tran_id='$tran_id'  "); 
														
														$search_product = new run_query("select * from   product  where product_status='ACTIVE'  and product_id='$tran_prod_id' "); 
		 
															if( $search_product->num_rows >= 1){

															 $search_product_data =	$search_product->result();
																extract($search_product_data );
																
																$new_stock = $product_no_stock  + ($tran_num_items - $num_items_new);
																$add_stock = new run_query("update    product  set product_no_stock='$new_stock' where  product_id='$tran_prod_id' "); 
	
																}
														
																  echo "<script>
																  window.location.replace(\"add_transaction.php?cus_phone=$cus_phone&cus_name=$cus_name&reciept=$receipt\");</script>";

																	 
															}
									  
									  
									  	if(isset($_POST['delete'.$tran_id])){
															$search_product = new run_query("select * from   product  where product_status='ACTIVE'  and product_id='$tran_prod_id' "); 
		 
															if( $search_product->num_rows >= 1){

															 $search_product_data =	$search_product->result();
																extract($search_product_data );
																
																$new_stock = $product_no_stock + $tran_num_items;
																$add_stock = new run_query("update    product  set product_no_stock='$new_stock' where  product_id='$tran_prod_id' "); 
	
																}
														
															$del_tran_id = new run_query(" delete from transactions where tran_id ='$tran_id' " );
														
																  echo "<script>
																  window.location.replace(\"add_transaction.php?cus_phone=$cus_phone&cus_name=$cus_name&reciept=$receipt\");</script>";

																	 
															}
									  
									  
											}
														}
														
											
											
											
											  $reciept_get_gtotal = new run_query("select sum(tran_total) as reciept_get_grand_total from transactions  where receipt='$reciept' ");
	    $reciept_get_gtotal_data =  $reciept_get_gtotal->result();
	 	extract($reciept_get_gtotal_data );
		
	
	  echo "<input type='hidden'  id='balc'  value=' $reciept_get_grand_total' >";
										}
									
									?>
												 
															</tbody>
															
														  </table>
						 
						 
						 
						 
						 
				</div>
				
				
				
                  <div class="col-sm-6">
									
									
								
              <div class="box box-primary" style='border:2px solid #cccccc; border-radius:15px; padding:10px; background-color:#bbdefb !important;  '>
               
                <div class="box-body">
                  <!-- Date range -->
          <form method="post" >
				  <div class="row">
					 <div class="col-md-12">
						  
						  <div class="form-group">
							<label for="date">Total</label>
							
								<input type="text" style="text-align:right" class="form-control" id="totalff" name="total" placeholder="Total" 
								value="0"  tabindex="5" readonly>
							
							<input type="hidden"   <?php if(isset($_GET['cus_phone'])){  $cus_phone = $_GET['cus_phone'];  echo "value='$cus_phone'   "; }?>   name='cus_ph'  >
							<input type="hidden"   <?php if(isset($_GET['cus_name'])){  $cus_name = $_GET['cus_name'];  echo "value='$cus_name'   "; }?>   name='cus_na'  >
							
						  </div><!-- /.form group -->
						  <div class="form-group">
							<label for="date">Amt Paid</label>
							
								<input type="number" class="form-control text-right" id="paid" name="amt_paid" value="0" tabindex="8" placeholder="Amt Paid" onkeyup="bal();"  onchange='bal();'  >
						 </div><!-- /.form group -->
						  <div class="form-group">
							<label for="date">Balance </label>
							
								<input type="number" style="text-align:right" class="form-control" id="baler" name="amt_bal" placeholder="balance" value="0" readonly>
							
						  </div><!-- /.form group -->
              
					</div>
					
					

				</div>	
               
                 
                      <button class="btn btn-lg btn-block btn-primary" id="daterange-btn" name="save_print" type="submit"  tabindex="7">
                        Complete Sales
                      </button>
					<b><i style='color:red;'>Note: Completed Transaction and not be reverted! </i></b>
              
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->
           
			
			
				 </div>
                </div>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
      
				  
				
        </div>
          
        
      

    <style>

    #blue{
      background-color: hsl(54, 83%, 45%);
    }

       #view{
        color: white;
        text-decoration: none;
        float: right;
      }
      .print{
        position: relative;
        left: 42%;
        text-decoration: none;
        margin-bottom: 2rem;
      }
      button{
      background-color: hsl(54, 83%, 45%);
     }
      .rev{
      padding-left: 15rem;
    }
    /* #repo{
      margin-top: 1rem;
    } */
    .collapse{
      width: 12.7rem;
    }

 h2{
   margin-left: 3rem;
 }
 h1{
   margin-right: 3.6rem;
 }
 h3{
   margin-left: 3rem;
 }
       #yes{
        background-color: #6b8dec;
        color: white;
        height: 74rem;
        width: 40rem;
        margin-left: 12rem;
        margin-top: 2rem;
        padding: 4rem;
        margin-bottom: 2rem;
      }
    </style>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="js/sb-admin-2.min.js"></script>
  <script src="../stock/select.js"></script>
<script>
function sp_value(){
var selectBox = document.getElementById("product");
    var selectedValue = selectBox.options[selectBox.selectedIndex].title;
   
document.querySelector("#sp").value=selectedValue;
document.querySelector("#n_item").value=1;

var selling_price = document.querySelector("#sp").value;
var num_items =  document.querySelector("#n_item").value;

var total = selling_price  *  num_items;
document.querySelector("#total").value=total;

}



function get_total(){
   
var selling_price = document.querySelector("#sp").value;
var num_items =  document.querySelector("#n_item").value;

var total = selling_price  *  num_items;
document.querySelector("#total").value=total;

}




function bal(){
   
var paid = document.querySelector("#paid").value;
var bal =  document.querySelector("#balc").value;

var cbal = bal  - paid;
document.querySelector("#baler").value=cbal;

}

function  set_total(){
var bal =  document.querySelector("#balc").value;

document.querySelector("#totalff").value=bal;

}

set_total();
bal();

</script>
</body>

</html>
