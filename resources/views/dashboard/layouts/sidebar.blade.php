<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse pb-5">
    <div class="position-sticky pt-3 sidebar-sticky">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
        <span>Menu</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle" class="align-text-bottom"></span>
        </a>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/books*') ? 'active' : '' }}" href="/dashboard/books">
            <span data-feather="file" class="align-text-bottom"></span>
            My Books
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/categories">
            <span data-feather="file" class="align-text-bottom"></span>
            Categories
          </a>
        </li>
      </ul>
    </div>

    <div class="position-sticky pt-3 sidebar-sticky">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
        <span>Tambah Data</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle" class="align-text-bottom"></span>
        </a>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashboard/books/create">
            <span data-feather="home" class="align-text-bottom"></span>
            Tambah Buku
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/categories/create">
            <span data-feather="file" class="align-text-bottom"></span>
            Tambah Kategori
          </a>
        </li>
      </ul>
    </div>

    <div class="position-sticky pt-3 sidebar-sticky">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
        <span>Pengaturan</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle" class="align-text-bottom"></span>
        </a>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashboard/profil/{{ $profil[0]->id }}/edit">
            <span data-feather="home" class="align-text-bottom"></span>
            Ubah Profil
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file" class="align-text-bottom"></span>
            Tambah User
          </a>
        </li> --}}
      </ul>
    </div>
</nav>