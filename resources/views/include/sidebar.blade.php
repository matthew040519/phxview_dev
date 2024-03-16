<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-image: linear-gradient(#04619F, #000000)">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PHXVIEW</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"  style="color: white">{{ Auth::user()->name }} @if( Auth::user()->role == 0)
            <br>
              <label for="">Package: {{ Auth::user()->member->package }}</label>
            @endif</a>
         
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if( Auth::user()->role == 1)
               <li class="nav-item">
                <a href="/admin/dashboard" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Entry
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/admin/client" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Client Management</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/task" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Task Management</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="announcement.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Announcement</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="/package" class="nav-link">
                  <i class="nav-icon fas fa-credit-card"></i>
                  <p>
                    Package
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="payout.php" class="nav-link">
                  <i class="nav-icon fas fa-credit-card"></i>
                  <p>
                    Payout Request
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reports.php" class="nav-link">
                  <i class="nav-icon fas fa-file-contract"></i>
                  <p>
                    Reports
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              @elseif(Auth::user()->role == 0)
              <li class="nav-item">
                <a href="/member/memberdashboard" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/member/genealogy" class="nav-link">
                    <i class="nav-icon fas fa-network-wired"></i>
                    <p>
                    Genealogy
                    </p>
                  </a>
                </li>
              <li class="nav-item">
                <a href="/member/packages" class="nav-link">
                  <i class="nav-icon fa fa-archive"></i>
                  <p>
                    Package
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/member/withdraw" class="nav-link">
                  <i class="nav-icon fa fa-archive"></i>
                  <p>
                    Withdraw
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              @endif
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>