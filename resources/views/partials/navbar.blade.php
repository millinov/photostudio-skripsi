<nav class="navbar navbar-expand-lg navbar-light fs-6" style="background-color: #B7F9F5;">
    <div class="container">
      <a class="navbar-brand" href="/">FOTOLOGY</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ ($active === "studios") ? 'active' : '' }}" href="/katalog">Katalog</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Kategori</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">

          @auth

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="">Welcome back, {{ auth()->user()->name }}</span>
                <div class="img-thumbnail ms-2 rounded-circle p-0" style="max-width: 40px; max-height: 40px; overflow: hidden;">
                    <img src="@if(auth()->user()->profile_pic) {{ asset('storage/') .'/' . auth()->user()->profile_pic }} @else img/image-about.jpg  @endif" alt="{{ auth()->user()->username }}"style="height: 40px;" class="d-block m-auto">
                </div>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard">My Dashboard <i class="bi bi-layout-text-sidebar-reverse"></i></a></li>
                @can('seller')
                    <li><a class="dropdown-item" href="@if(isset(auth()->user()->studio[0])) /dashboard/studio/{{ auth()->user()->studio[0]->slug }}@else /dashboard/studio  @endif">My Studio <i class="bi bi-camera"></i></a></li>
                @else
                    <li>
                      <form action="/become-a-seller/{{ auth()->user()->username }}" method="post">
                        @csrf 
                        <input type="hidden" value="2" name="is_seller" id="is_seller">
                        <button type="submit" class="dropdown-item" >Become a Studio Owner <i class="bi bi-caret-right-fill"></i></button>
                      </form>
                    </li>
                @endcan
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf 
                    {{-- pokoknya form hrs ada csrf --}}
                    <button type="submit" class="dropdown-item" >Logout <i class="bi bi-box-arrow-right"></i></button>
                  </form>
                </li>
              </ul>
            </li>

          @else

            <li class="nav-item">
              <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}">Login <i class="bi bi-box-arrow-in-right"></i></a>
            </li>

          @endauth

        </ul>

      </div>
    </div>
</nav>