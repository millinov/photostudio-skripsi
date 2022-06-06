<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container">
      <a class="navbar-brand" href="/">ESTETIKA</a>
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
          <li class="nav-item">
            <a href="/sign-in" class="nav-link {{ ($active === "sign-in") ? 'active' : '' }}">Sign In <i class="bi bi-box-arrow-in-right"></i></a>
          </li>
        </ul>
      </div>
    </div>
</nav>