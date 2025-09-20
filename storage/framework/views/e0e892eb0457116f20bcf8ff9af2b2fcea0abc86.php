  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #26415d;">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('/')); ?>" class="brand-link">
      <img src="<?php echo e(asset('assets/img/favicon.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dream Home</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(asset('assets/img/author.png')); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo e(Auth::user()->firstname); ?> <?php echo e(Auth::user()->lastname); ?> <br> <?php echo e(Auth::user()->usertype); ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?php echo e(url('/dashboard')); ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          

          <?php if(Auth::user()->usertype == 'landlord'): ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Flat management
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('flat-management')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flat List</p>
                </a>
              </li>
              
            
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Renter Managerment
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('products-ajax-crud')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Renter List</p>
                </a>
              </li>
            
            </ul>
          </li>
          <?php endif; ?>
        

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Billing History
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if(Auth::user()->usertype == 'landlord'): ?>
              <li class="nav-item">
                <a href="<?php echo e(url('billing_history')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pay Bill</p>
                </a>
              </li>
              <?php endif; ?>
              <li class="nav-item">
                <a href="<?php echo e(url('pay_bill_list')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pay Bill List</p>
                </a>
              </li>
            
            </ul>
          </li>

          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Profile Setting
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('profile_view')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile View & Update</p>
                </a>
              </li>

              
            
            </ul>
          </li>
          <?php if(Auth::user()->usertype == 'landlord'): ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Role Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(url('roles')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Role Group</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo e(url('admin_role')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage User Role</p>
                </a>
              </li>
            
            </ul>
          </li>
          <?php endif; ?>
         
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH C:\laragon\www\mydreamhome\resources\views/admin/layout/leftmenu.blade.php ENDPATH**/ ?>