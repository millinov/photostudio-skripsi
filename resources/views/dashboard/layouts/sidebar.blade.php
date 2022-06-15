<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar navbar navbar-light collapse ms-2 py-0 px-3" >
    <div class="position-sticky pt-3 pb-3 border rounded-start" style="background-color: #e3f2fd;">
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

            <div class="border-top mt-2">
                <li class="nav-item mt-2">
                    <a class="nav-link {{ Request::is('dashboard/studio') ? 'active' : '' }}" href="/dashboard/studio">
                    <i class="bi bi-camera me-2"></i>
                    My Studio
                    </a>
                </li>
            </div>

        </ul>
    </div>
</nav>