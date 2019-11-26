<?php include('php/admin_settings.php'); ?> 




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=1024">
  <meta name="description" content="BUSINESS MGT SYSTEM">
  <meta name="author" content="MICROLINKCODE">

  <title> <?php echo "$title | ADD STOCK "; ?> </title>

  <!-- Custom fonts-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles -->
  <link rel="stylesheet" href="index2.css" >
  
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
	color: #999999;
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
	background-color: #eee;
}
/**
 * Hovered option
 */
.option-hover {
	background-color: #dfdfdf;
	color: #454545;
}
/**
 * Option item
 */
.option-item {
	cursor: pointer;
/*border-bottom: 1px #e3e3e3 solid;*/ }
.option-item:hover {
	background-color: #efefef;
	color: #454545;
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
      <!-- Sidebar -->
  <?php include('php/admin_nav_menu.php'); 
  
  
  
  if(isset($_POST['btn_stock_add'])){
  
  $prod_id = addslashes(htmlentities($_POST['prod_id']));
$cost_priceW = addslashes(htmlentities($_POST['cost_price']));
$selling_priceW = addslashes(htmlentities($_POST['selling_price']));
$quantity = addslashes(htmlentities($_POST['quantity']));

  	$search_product = new run_query("select * from   product  where product_status='ACTIVE'  and product_id='$prod_id' "); 
		 
if( $search_product->num_rows >= 1){

 $search_product_data =	$search_product->result();
	extract($search_product_data );
	$new_product_no_stock = $product_no_stock +  $quantity;
	
$add_stock_product = new run_query("update   product  set product_no_stock='$new_product_no_stock', selling_price='$selling_priceW', cost_price='$cost_priceW' where product_status='ACTIVE'  and product_id='$prod_id' "); 

$inventory = new run_query(" insert into inventory set inventory_product_name='$product_name', inventory_no_add='$quantity', inventory_user_added=' $user_name (ID: $user_id) ', inventory_date='$reg_Date' ");


$activity_log = new run_query(" insert into activity_track set activity_desc=' $quantity CARTONS OF $product_name WAS ADDED TO THE STOCK WITH THE COST PRICE OF $cost_priceW  add by $user_name (ID: $user_id) ',  activity_status='STOCK_ADDED',  activity_date='$reg_Date' " );
	  echo "<script>alert('Product Added to the stock!!!');
			 
			 window.location.replace(\"addstock.php\");</script>";
        	
	}
  
  }
  
  
  
  
  
  
  ?> 

  
  
      <form  class="needs-validation" method='POST'  id="sign_in_up2" >
        
          <h1 class="header1 text-center">ADD ITEMS</h1> 
          <br>
          
          
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">SELECT PRODUCTS</label>
                </div>
               <select class="search-select " style='width:100%;' id="inputGroupSelect01" name='prod_id' required>
			   <option value='' disabled selected >   Type To Search  </option>
					<?php 
					if( $all_product->num_rows >= 1){

				while( $all_product_data =	$all_product->result() ){
						extract($all_product_data );
						
						echo"
								 <option value='$product_id'> $product_name  </option>
								 
					";
					}
					
					}
					
					?>
					 
					</select> 
              </div>
              <br>
    
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">COST PRICE</span>
                  </div>
                  <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" name='cost_price' required>
                </div>
    
                <br>
    
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">SELLING PRICE</span>
                  </div>
                  <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" name='selling_price' >
                </div>
    
                <br>
    
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">QUANTITY IN CARTONS</span>
                  </div>
                  <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" name='quantity'>
                </div>
    
                <br>
    
              
    
                  <button type='submit' name="btn_stock_add" class="btn btn-primary btn-user btn-block">
                      Submit
                    </button>
          </form>

    </div>
    </div>

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
  <script src="../stock/select.js"></script>
</body>
</html>