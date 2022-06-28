<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #B7F9F5;">
    <div class="container">
      <a class="navbar-brand" href="/">FOTOLOGI</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">About</a>
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
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome back, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard">My Dashboard <i class="bi bi-layout-text-sidebar-reverse"></i></a></li>
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