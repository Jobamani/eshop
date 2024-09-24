
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
                  <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
                  <span class="text-secondary text-small">Adminstator</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
          @if(Auth::guard('admin')->check())
          <!-- Dashboard -->
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.dashboard')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
          <!-- end Dashboard -->
          
           <!-- My profile -->
            <li class="nav-item">
              <a class="nav-link" href="{{route('myprofile')}}">
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
                    <a class="nav-link" href="{{route('managecategory')}}">All Category</a>
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
                    <a class="nav-link" href="{{route('products.index')}}">All Products</a>
                    <a class="nav-link" href="{{route('product.men')}}">Men</a>
                    <a class="nav-link" href="{{route('product.women')}}">Women</a>
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
                    <a class="nav-link" href="{{route('customers.index')}}">All Customer</a>
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
                    <a class="nav-link" href="{{route('orders.index')}}">All Orders</a>
                  </li>
                </ul>
              </div>
            </li>
            @if(Auth::guard('admin')->check())

            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <!-- Logout -->
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="menu-title">Log Out</span>
                <i class="fa fa-sign-out menu-icon"></i>
              </a>
            </li>
          <!-- end logout -->
          @elseif(Auth::guard('web')->check())
            <form  id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <!-- Logout -->
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">
                <span class="menu-title">Log Out</span>
                <i class="fa fa-sign-out menu-icon"></i>
              </a>
            </li>
          @endif
     
          @endif
          <!-- checking admin routes -->

          <!-- customer route -->        
            <li class="nav-item">
              <a class="nav-link" href="{{route('dashboard')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/">
                <span class="menu-title">Website</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-order" aria-expanded="false" aria-controls="ui-order">
                <span class="menu-title">Manage Order</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-list-alt menu-icon"></i>
              </a>
              <div class="collapse" id="ui-order">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('customer.order.index')}}">All Orders</a>
                  </li>
                </ul>
              </div>
            </li>
          <!-- end customer route -->


          </ul>
        </nav>

       