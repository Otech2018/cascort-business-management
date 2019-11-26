<?php include('php/admin_settings.php'); ?> 




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=1024">
  <meta name="description" content="BUSINESS MGT SYSTEM">
  <meta name="author" content="MICROLINKCODE">

  <title> <?php echo "$title | TRANSACTION "; ?> </title>

    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
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


 <body id="page-top" >

  <div id="wrapper">

    <?php include('php/admin_nav_menu.php'); ?> 


      
              
                <div class="card-body">
                  <div class="table-responsive ">
                    <table class="table table-bordered print_mlc " id="all_customer" width="100%" cellspacing="0">
                      <thead>
					  <tr>
                            <th colspan='9' style='text-align:center; font-size:30px;'>TRANSACTION TABLE</th>
                          
                        </tr>
                        <tr>
                            <th>SN</th>
                           <th> DATE </th>
                           <th> CUS PHONE </th>
                           <th> ITEM </th>
                           <th> COST PRICE </th>
                           <th> SELLING PRICE </th>
						   <th> QTY </th>
						     <th> TOTAL </th>
						   <th> PROFIT </th>
						   
                        </tr>
                      </thead>
        
                            <tbody>
                               
							      <?php if(isset($_POST['tran_btn'])){  
	  
								  $start_date = $_POST['start_date'];  
								   $end_date = $_POST['end_date']; 
								  $get_tran = new run_query("select * from   transactions where tran_date between '$start_date' and  '$end_date'   and tran_product !='TOTAL' ");
							 if( $get_tran->num_rows >= 1){
							 $no =1;
								 while( $get_tran_data =	$get_tran->result() ){
													extract($get_tran_data );
								  
								  echo "
								  
								   <tr>
										<td> $no </td>
										<td> $tran_date </td>
										<td> $tran_custormer_phone </td>
										<td> $tran_product </td>
										<td> <b>N$tran_cost_price </b></td>
										<td>N $tran_selling_price </td>
										<td> $tran_num_items </td>
										<td> N$tran_total </td>
										<td> <b>N$tran_profit </b></td>
									</tr>
								  
								  ";
								  $no++;
								  }
								    $get_tran_total = new run_query("select sum(tran_grand_total) as tran_grand_total1,  sum(tran_payed) as tran_payed1,  sum(tran_bal) as tran_bal1 from transactions where tran_date between '$start_date' and  '$end_date'   and tran_product ='TOTAL' ");
	    $get_tran_total_data =  $get_tran_total->result();
	 	extract($get_tran_total_data );
		
		
		 $get_tran_profit = new run_query("select sum(tran_profit) as tran_profit1, sum(tran_num_items) as tran_num_items1  from transactions where tran_date between '$start_date' and  '$end_date'   and tran_product !='TOTAL' ");
	    $get_tran_profit_data =  $get_tran_profit->result();
	 	extract($get_tran_profit_data );
		  echo "
	  
	    
									
									
									 <tr style='color:blue;' align='center'>
								   <td>_</td>
								   	<td></td>
										  <td>_</td>
								   	<td></td>
									
										<td></td>
										<td> TOTAL = </td>
										<td> <b> $tran_num_items1 </b> </td>
										<td> <b> N$tran_grand_total1 </b> </td>
										<td> <b> N$tran_profit1 </b>  </td>
									
									
									</tr>
									
									
									 <tr style='color:green;' align='center'>
								   <td>_</td>
								   	<td></td>
										  <td>_</td>
								   	<td></td>
									
										<td></td>
										<td></td>
										<td>  PAID =  </td>
										<td> <b> N$tran_payed1 </b> </td>
										<td></td>
									
									
									</tr>
									
									 <tr style='color:red;' align='center'>
								   <td>_</td>
								   	<td></td>
										  <td>_</td>
								   	<td></td>
									
										<td></td>
										<td></td>
										<td>  BAL =  </td>
										<td> <b> N$tran_bal1 </b> </td>
										<td></td>
									
									
									</tr>
									<tr style='color:blue;' align='center'>
									<td>_</td>
										<td></td>
										<td>   Transaction      </td>
										<td> table </td>
										<td> from </td>
										<td>  <b> $start_date</b> </td>
										<td>  To  </td>
										<td>  <b> $end_date</b></td>
										<td></td>
										
										
									</tr>
	  
	  ";
	  
		
								  }
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
