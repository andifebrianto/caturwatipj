<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="index.php" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">Caturwati<span class="text-white font-weight-normal">Library</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="/" class="nav-item nav-link {{ ($title === "Home")  ? 'active' : '' }}">Home</a>
                <a href="/categories" class="nav-item nav-link {{ Request::path() === 'categories' ? 'active':'' }}">Categories</a>
                <a href="/books" class="nav-item nav-link {{ Request::path() === 'books' ? 'active':'' }}">Books</a>
                <a href="/about" class="nav-item nav-link {{ Request::path() === 'about' ? 'active':'' }}">About</a>

                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Welcome Back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                      </form>
                    </ul>
                </li>
                @else
                <a href="/login" class="nav-item nav-link {{ Request::path() === 'login' ? 'active':'' }}">Login</a>
                @endauth

            </div>
            <div class="" style="width: 100%; max-width: 300px;"> 
                <form action="/books">
                    @if (request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                    @endif
                    <div class="input-group-append"> 
                        <input name="cari" type="text" class="form-control border-0" placeholder="Masukkan Kata Kunci" value="{{ request('cari') }}">
                        <button type="submit" value="cari" class="input-group-text bg-primary text-dark border-0 px-3"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</div>