<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a class="brand-link">
    <img src="{{ asset('../adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">ARSparepart</span>
  </a>
    <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Menu
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route ('sparepart') }}" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p style="font-style:italic"> Data Sparepart</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{  route('password') }}" class="nav-link">
                    <i class="nav-icon fas fa-lock"></i>
                    <p style="font-style:italic"> Ubah Password</p>
                  </a>
                </li>
              </ul>
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i style="color:red" class="nav-icon  fas fa-sign-out-alt"></i>
            <p class="text-red"> Keluar</p>
          </a>
        </li>
</aside>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->