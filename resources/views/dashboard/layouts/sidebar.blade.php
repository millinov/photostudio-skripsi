<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar navbar navbar-light collapse ms-2 py-0 px-3" >
    <div class="position-sticky pt-3 pb-3 border rounded-start h-100" style="background-color: #B7F9F5;">
        <ul class="nav navbar-nav flex-column px-3">
            
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"href="/dashboard">
                <i class="bi bi-file-person me-2"></i>
                My Profile
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/wishlist') ? 'active' : '' }}" href="#">
                <i class="bi bi-cart4 me-2"></i>
                Wishlist
                </a> 
            </li>
        
            <li class="nav-item">
                <a class="nav-link t{{ Request::is('dashboard/history') ? 'active' : '' }}" href="#">
                <i class="bi bi-clock-history me-2"></i>
                History
                </a>
            </li>

            @can('seller')
                <div class="mt-2">
                    <div class="d-flex align-items-center ">
                        <span class="me-1">Seller</span>
                        <div class="w-100 border-top" style="border-color: black !important;"></div>
                    </div>
                    
                    <li class="nav-item mt-2">
                        <a class="nav-link {{ Request::is('dashboard/studio') ? 'active' : '' }}" href="@if(isset($studio)) /dashboard/studio/{{ $studio->slug }} @else /dashboard/studio  @endif">
                        <i class="bi bi-camera me-2"></i>
                        My Studio
                        </a>
                    </li>
                </div>
            @endcan

            @can('admin')
                <div class="mt-2">

                    <div class="d-flex align-items-center ">
                        <span class="me-1">Admin</span>
                        <div class="w-100 border-top" style="border-color: black !important;"></div>
                    </div>

                    <li class="nav-item mt-2">
                        <a class="nav-link {{ Request::is('dashboard/categories') ? 'active' : '' }}" href="/dashboard/categories">
                        <i class="bi bi-card-list me-2"></i>
                        Categories
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/users') ? 'active' : '' }}" href="/dashboard/users">
                        <i class="bi bi-card-list me-2"></i>
                        Users
                        </a>
                    </li>

                </div>
            @endcan

        </ul>
    </div>
</nav>