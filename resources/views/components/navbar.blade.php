<nav class="navbar navbar-dark">
  <div class="container-fluid">
    <a href="{{ route('homepage') }}" class="navbar-brand">
      <h1 class="h4 letter-spacing-2">The Aulab Post</h1>
    </a>

    <form action="{{route('article.search')}}" method="GET" class="d-flex">
      <input class="form-control me-2" type="search" name="query" placeholder="Cosa stai cercando?" aria-label="Search">
      <button class="btn btn-outline-info text-white" type="submit">Cerca</button>
    </form>

    <div class="align-self-end">

      @auth
        <ul class="nav">
          <li class="nav-item dropdown h5">
            <a 
              href="#" 
              class="nav-link dropdown-toggle letter-spacing-2 text-white"
              role="button"
              data-bs-toggle="dropdown"
              data-bs-auto-close="outside"
              aria-expanded="false"
            > {{ Auth::user()->name }}
            </a>
            
            <ul class="dropdown-menu dropdown-menu-end">

              <li>
                <a 
                  href="{{ route('article.index') }}"
                  class="dropdown-item"
                  >Tutti gli articoli
                </a>
              </li>

              <li>
                <a 
                  href="{{ route('careers') }}"
                  class="dropdown-item"
                  >Lavora con noi
                </a>
              </li>

              @if (Auth::user()->is_writer)
                <li>
                  <a 
                    href="{{ route('article.create') }}" 
                    class="dropdown-item"
                    >Crea articolo
                  </a>
                </li>

                <li>
                  <a 
                    href="{{ route('writer.dashboard') }}" 
                    class="dropdown-item"
                    >Dashboard Redattore
                  </a>
              @endif

              @if (Auth::user()->is_revisor)
                <li>
                  <a 
                    href="{{ route('revisor.dashboard') }}" 
                    class="dropdown-item"
                    >Dashboard Revisore
                  </a>
                </li>
              @endif

              @if (Auth::user()->is_admin)
                <li>
                  <a 
                    href="{{ route('admin.dashboard') }}" 
                    class="dropdown-item"
                    >Dashboard Admin
                  </a>
                </li>
              @endif

              <li>
                <a 
                  href="#" 
                  class="dropdown-item"
                  onclick="event.preventDefault(); document.querySelector('#form-logout').submit();"
                  >Logout
                </a>
              </li>
              <form method="POST" action="{{ route('logout') }}" class="d-none" id="form-logout">@csrf</form>
            </ul>
          </li>
        </ul>
      @endauth

      @guest
        <ul class="nav">
          <li class="nav-item"><a href="{{ route('register') }}" class="nav-link text-white">Registrati</a></li>
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-white">Accedi</a></li>
        </ul>
      @endguest
    </div>
  </div>
</nav>