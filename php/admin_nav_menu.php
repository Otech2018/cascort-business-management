
		  
		  
		  
		   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion op" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> <?php echo "$title"; ?> </div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">

        <li class="nav-item active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecus" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-users"></i>
              <span>Customer </span>
            </a>
            <div id="collapsecus" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="all_customer.php">View Customers</a>
				  <a class="collapse-item" href="register.php">Register Customers</a>
                <a class="collapse-item" href="debt.php">Debt payment</a>
               
              </div>
            </div>
          </li>
		  
		   <li class="nav-item active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapset" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-table"></i>
              <span>Transactions </span>
            </a>
            <div id="collapset" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="add_transaction.php">Add Transaction</a>
				  <a class="collapse-item" href="report_transaction.php">View Transaction</a>
               
              </div>
            </div>
          </li>

		  
		  
		     <li class="nav-item active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_stock" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-cog"></i>
              <span>Stock </span>
            </a>
            <div id="collapse_stock" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="addstock.php">Add Items</a>
				  <a class="collapse-item" href="check_stock.php">Stock</a>
                 <a class="collapse-item" href="inventory_log.php">Inventory Log</a>
               
              </div>
            </div>
          </li>
     
  
     <li class="nav-item active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Staff" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-user"></i>
              <span>Staff </span>
            </a>
            <div id="Staff" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="add_staff.php">Add Staff</a>
				  <a class="collapse-item" href="all_staff.php">All Staff</a>
               
              </div>
            </div>
          </li>
		  
		  
		   <li class="nav-item active">
        <a class="nav-link" href="track.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Track Activities</span></a>
      </li>
  
  <?php
include('../g_php/change_password.php'); 

?>

        <hr class="sidebar-divider">

       
      <li class="nav-item active">
          <a id="blue" class="nav-link" href="log_out.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Log out</span></a>
        </li>          



</ul>

<div id="content-wrapper" class="d-flex flex-column">

      </ul>

    </nav>

<br/><br/>
        <div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4 op">
            <a id="repo" href="dashboard.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ">Welcome  <?php echo $user_name; ?> ( ADMIN) </a>
          </div>
