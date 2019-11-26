<?php include('php/admin_settings.php'); ?> 




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=1024">
  <meta name="description" content="BUSINESS MGT SYSTEM">
  <meta name="author" content="MICROLINKCODE">

  <title> <?php echo "$title | GET TRANSACTION "; ?> </title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <div id="wrapper">
  <?php include('php/admin_nav_menu.php'); ?> 



    <form id="yes" action="print_report.php" class="needs-validation" method='POST' >
        
      <h1 id="trans" class="header1 text-center">Report For All Transactions</h1>
      <hr class="sidebar-divider d-none d-md-block"> 
      <br>
      
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Start Date</span>
          </div>
          <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" required='required' name='start_date'>
        </div>
  
        <br><br>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon3">End Date</span>
        </div>
        <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" required='required' name='end_date'>
      </div>
      
              <br><br><br>
              <button type='submit' class='btn btn-primary'  name='tran_btn' >Go</button>
    
      </form>
      
    

  <style>

 .collapse{
      width: 12.7rem;
    }

     #print{
       position: relative;
       text-decoration: none;
       text-transform: uppercase;
       color: white;
       background-color: hsl(54, 83%, 45%);
       left: 25rem;
     }

     #view{
          text-decoration: none;
          color: white;
        }

        
        button{
      background-color: hsl(54, 83%, 45%);
     }

     #blue{
      background-color: hsl(54, 83%, 45%);
    }

    #top{
      margin-left: 1rem;
      margin-top: 6rem;
    }

   #h{
  text-decoration: underline;
  text-transform: capitalize;
  text-align: center;
}

        #trans{
          color: white;
        }
     
         #yes{
          background-color: #6b8dec;
          height: 30rem;
          width: 45rem;
          margin-left: 10rem;
          margin-top: 2rem;
          padding: 4rem;
          margin-bottom: 2rem;
        }
      
      </style>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="js/sb-admin-2.min.js"></script>


</body>
</html>