<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="assets/dist/img/TciLogo01.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">TCI</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="assets/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Kong<br>ฝ่ายขาย</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="index.php" class="nav-link">
            <i class="nav-icon fas fa fa-home"></i>
            <p>
              หน้าหลัก
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sales.php" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              ข้อมูลลูกค้า
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sales.php?act=storage" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              ข้อมูลตู้
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sales.php?act=order" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              สั่งผลิต
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../login.php" onclick="return confirm('Confirm?');" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              ออกจากระบบ
            </p>
          </a>
        </li>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>