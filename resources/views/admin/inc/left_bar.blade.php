
 <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{route('admin.dashboard')}}"><i class="icon ion-android-star-outline"></i> E-SHOPPER</a></div>
    <div class="sl-sideleft">

      <div class="sl-sideleft-menu">

        <a href="{{url('/')}}" class="sl-menu-link" target="_blank">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">visit Site</span>
          </div><!-- menu-item -->

        </a><!-- sl-menu-link -->
        <a href="{{route('admin.dashboard')}}" class="sl-menu-link @yield('dashboard')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="{{route('sliders')}}" class="sl-menu-link @yield('sliders')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Slider</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="{{route('brands')}}" class="sl-menu-link @yield('brands')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Brand</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <!-- sl-menu-link -->
        <a href="#" class="sl-menu-link @yield('categories')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Categories</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">

          <li class="nav-item"><a href="{{route('category')}}" class="nav-link @yield('add-category')">Add Categary</a></li>

          <li class="nav-item"><a href="{{route('sub-category')}}" class="nav-link @yield('sub-category')">Sub Categary</a></li>

          <li class="nav-item"><a href="{{route('sub-sub-category')}}" class="nav-link @yield('sub-sub-category')">Sub->Sub Categary</a></li>

        </ul>

        <a href="#" class="sl-menu-link @yield('products')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">products</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">

          <li class="nav-item"><a href="{{route('add-product')}}" class="nav-link @yield('add-product')">Add Product</a></li>

          <li class="nav-item"><a href="{{route('manage-product')}}" class="nav-link @yield('manage-product')">Manage Product</a></li>

        </ul>
        <a href="{{route('coupon')}}" class="sl-menu-link @yield('coupon')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Coupon</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link @yield('shipping')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Shipping Area</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">

          <li class="nav-item"><a href="{{route('division')}}" class="nav-link @yield('division')">Add Division</a></li>

          <li class="nav-item"><a href="{{route('district')}}" class="nav-link @yield('district')">Add District</a></li>

          <li class="nav-item"><a href="{{route('thana')}}" class="nav-link @yield('thana')">Add Thana</a></li>
        </ul>

        <a href="#" class="sl-menu-link @yield('orders')">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Orders</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">

            <li class="nav-item"><a href="{{route('pending-orders')}}" class="nav-link @yield('pending')">pending order</a></li>

            <li class="nav-item"><a href="{{route('confirmed-orders')}}" class="nav-link @yield('comfirmed-order')">Comfirmed Orders</a></li>

            <li class="nav-item"><a href="{{route('processing-orders')}}" class="nav-link @yield('processing-orders')">Processing Orders</a></li>
            <li class="nav-item"><a href="{{route('picked-orders')}}" class="nav-link @yield('picked-orders')">Picked Orders</a></li>
            <li class="nav-item"><a href="{{route('shipping-orders')}}" class="nav-link @yield('shipping-orders')">Shipping Orders</a></li>
            <li class="nav-item"><a href="{{route('delevered-orders')}}" class="nav-link @yield('delevered-orders')">Delevered Orders</a></li>
            <li class="nav-item"><a href="{{route('cancel-orders')}}" class="nav-link @yield('cancel-orders')">cancel Orders</a></li>
          </ul>

          <a href="{{route('reports')}}" class="sl-menu-link @yield('report')">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
              <span class="menu-item-label">Reports</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

      </div><!-- sl-sideleft-menu -->
      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
