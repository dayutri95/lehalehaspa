
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <img src="../lehaleha2.png">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        
          <a href="#" class="d-block"><?php echo "$_SESSION[nama]" ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li >
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Home  
              </p>
            </a>
            
          
          <?php $tgl="" ?>
          
          <li >
            <a href="sales.php?tgl=<?php echo"$tgl" ?>" class="nav-link">
              <i class="nav-icon fa fa-fw fa-industry"></i>
              <p>
                Daily Sales and Expense 
              </p>
            </a>
          </li>
          <li >
            <a href="qbd.php?tgl=<?php echo"$tgl" ?>" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Quick Book Data 
              </p>
            </a>
          </li>
          <li >
            <a href="bulanan.php" class="nav-link">
              <i class="nav-icon fa fa-bar-chart"></i>
              <p>
                Laporan Bulanan 
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
