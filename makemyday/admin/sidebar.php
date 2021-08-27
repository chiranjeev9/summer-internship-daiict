<?php include('business/loginsession.php');?>
<a href="index.php" class="brand-link">
      <img src="img/logo.jpg" alt="" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Make My Day</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $Avatar; ?>" alt="User Image" style="vertical-align: unset;">
          <!--<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $Name; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!--<i class="right fas fa-angle-left"></i>-->
              </p>
            </a>
            <!--<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>-->
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-location-arrow"></i>
              <p >
                Location Management
                <i class="fa fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="country.php" class="nav-link">
                  <i class="nav-icon fa fa-map-pin"></i>
                  <p>Manage Country</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="State.php" class="nav-link">
                  <i class="nav-icon fa fa-map-pin"></i>
                  <p>Manage State</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="city.php" class="nav-link">
                  <i class="nav-icon fa fa-map-pin"></i>
                  <p>Manage City</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="area.php" class="nav-link">
                  <i class="nav-icon fa fa-map-pin"></i>
                  <p>Manage Area</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user.php" class="nav-link">
                  <i class="nav-icon fa fa-user-plus"></i>
                  <p>Manage Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-comments"></i>
                  <p>Manage Feedback</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-male"></i>
                  <p>Manage Roles</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="fas fa-list nav-icon"></i>
              <p>
                Product Management
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="occation.php" class="nav-link">
                  <i class="nav-icon fa fa-arrow-right"></i>
                  <p>Manage Occations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="category.php" class="nav-link">
                  <i class="nav-icon fa fa-arrow-right"></i>
                  <p>Manage Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="subcategory.php" class="nav-link">
                  <i class="nav-icon fa fa-arrow-right"></i>
                  <p>Manage SubCategory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="nav-icon fa fa-arrow-right"></i>
                  <p>Manage Product</p>
                </a>
              </li>
             <!--  <li class="nav-item">
                <a href="price.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Price</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="gallery.php" class="nav-link">
                  <i class="nav-icon fa fa-arrow-right"></i>
                  <p>Manage Gallery</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-plus-square"></i>
              <p>
                Order Management
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="orders.php" class="nav-link">
                  <i class="nav-icon fa fa-plus"></i>
                  <p>Manage Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-credit-card"></i>
                  <p>Manage Payment</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Reports</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Customer Report</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Order Report</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Day Wise Reports</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>