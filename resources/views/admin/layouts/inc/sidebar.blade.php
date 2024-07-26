
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="profile" />
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">David Grey. H</span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
          <!-- Dashboard -->
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
          <!-- end Dashboard -->
           <!-- My profile -->
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <span class="menu-title">My Profile</span>
                <i class="fa fa-user-circle-o menu-icon"></i>
              </a>
            </li>
            <!-- end my profile -->

             <!-- Manage category -->
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-category" aria-expanded="false" aria-controls="ui-category">
                <span class="menu-title">Manage Category</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-folder-open-o menu-icon"></i>
              </a>
              <div class="collapse" id="ui-category">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/buttons.html">All Category</a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- End manage category -->
            
            <!-- manage products -->
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-products" aria-expanded="false" aria-controls="ui-products">
                <span class="menu-title">Manage Products</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-th-large menu-icon"></i>
              </a>
              <div class="collapse" id="ui-products">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/buttons.html">All Products</a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- end manage products -->

            <!-- Manage customer -->
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-customer" aria-expanded="false" aria-controls="ui-customer">
                <span class="menu-title">Manage Customer</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-users menu-icon"></i>
              </a>
              <div class="collapse" id="ui-customer">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/buttons.html">All Customer</a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- end manage customer -->

            <!-- Manage order -->

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-order" aria-expanded="false" aria-controls="ui-order">
                <span class="menu-title">Manage Order</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-list-alt menu-icon"></i>
              </a>
              <div class="collapse" id="ui-order">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/buttons.html">All Orders</a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- end manage order -->

            <!-- Logout -->
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <span class="menu-title">Log Out</span>
                <i class="fa fa-sign-out menu-icon"></i>
              </a>
            </li>
          <!-- end logout -->
          </ul>
        </nav>