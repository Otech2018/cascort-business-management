<?php include('php/admin_settings.php'); ?> 




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


 <body >

<h4> <a id="red" href="add_transaction.php" class='op'>GO BACK</a></h4>


<center>
<h3 class='op' >Print Preview</h3>
                    <button class="btn btn-success op" onclick=' window.print();'>PRINT</button>
				
<br/> <br/><br/>
<div style='border:1px dotted black; width:700px;' class='print_mlc'>

 <h3>CASCORT GLOBAL RESOURCES LIMITED</h3>
 <p align='center'>Along Umuguma Okuku, Opp. Ebezina gas Plant, Owerri West Imo State.</p>
    <i>Thanks for patronizing us!!!</i>
    <hr>

    <div >
    
	 
      <table  class="table table-bordered table-striped">
		  <tr>
			<td>CUSTOMER NAME</td>
			<td> <b> <?php if(isset($_GET['cus_name'])){  $cus_name = $_GET['cus_name'];  echo "$cus_name  "; }?>  </b></td>
		  </tr>
		  <tr>
			<td>CUSTOMER PHONE</td>
			<td> <b> <?php if(isset($_GET['cus_phone'])){  $cus_phone = $_GET['cus_phone'];  echo "$cus_phone  "; }?>  </b> </td>
		  </tr>
		    <tr>
			<td>DATE</td>
			<td> <b> <?php echo date('d-m-Y'); ?>  </b> </td>
		  </tr>
		  <tr>
			<td> Receipt No:</td>
			<td> <b>  <?php if(isset($_GET['reciept'])){  $reciept_no = $_GET['reciept']; $reciept_no1 = strlen($_GET['reciept']) - 6; $reciept_no_s =strrev( substr($reciept_no, $reciept_no1)  ); echo $reciept_no_s; }?>  </b> </td>
		  </tr>
	  </table>
	    
	  <table class="table table-bordered table-striped">
		<tr>
			<td><b>NO</b></td>
			<td><b>ITEM</b></td>
			<td><b>RATE</b></td>
				<td><b>QTY</b></td>
			<td><b> TOTAL </b></td>
		</tr>
	  <?php if(isset($_GET['reciept'])){  
	  $no = 1;
	  $reciept = $_GET['reciept'];  
	  $reciept_get = new run_query("select * from   transactions where receipt='$reciept'  and tran_product !='TOTAL'  ");
 if( $reciept_get->num_rows >= 1){
	 while( $reciept_get_data =	$reciept_get->result() ){
						extract($reciept_get_data );
	  
	  echo "
	  
	   <tr>
	   <td> $no </td>
			
			<td> $tran_product </td>
			<td> $tran_selling_price </td>
			<td> $tran_num_items </td>
			<td> <b>$tran_total </b></td>
		</tr>
	  
	  ";
	  
	  $no ++;
	  }
	  
	
	  
	  
	    $amt_payed = new run_query("select * from   transactions where receipt='$reciept'  and tran_product ='TOTAL'  ");
	    $amt_payed_data =  $amt_payed->result();
	 	extract($amt_payed_data );
		
		  echo "
		  
		   <tr>
				<td colspan='4'> <b> TOTAL </b></td>
		
			<td> <b>N$tran_grand_total </b></td>
		</tr>
	  
	   <tr>
				<td colspan='4'> <b>PAID </b></td>
		
			<td> <b>N$tran_payed </b></td>
		</tr>
		
		
		 <tr>
				<td colspan='4'> <b>BALANCE </b></td>
		
			<td> <b>N$tran_bal </b></td>
		</tr>
	  
	  ";
	  }
	  }?> 
	  
	 
		
		
	  </table>
	  <br/><br/><br/><br/>
    </div>
       
</div>
	</center>
</body>

</html>
