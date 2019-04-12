<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   
          <img src="../../lehaleha2.png">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Home  
              </p>
            </a>
            
          
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Master Data
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../produk" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../treatment" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Treatment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../kategori_treatment" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Kategori Treatment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../therapist" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Therapist</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../pelanggan" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Pelanggan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../suplier" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Suplier</p>
                </a>
              </li>
            </ul>
          </li>
          <li >
            <a href="../booking" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Booking 
              </p>
            </a>
          </li>
          <li >
            <a href="../barang_masuk" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Barang Masuk 
              </p>
            </a>
          </li>
          <li >
            <a href="../penjualan" class="nav-link">
              <i class="nav-icon fa fa-tree"></i>
              <p>
                Penjualan Produk 
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

