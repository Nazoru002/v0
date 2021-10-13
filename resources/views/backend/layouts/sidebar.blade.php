<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-header">NAVIGASI PROGRAM</li>
    <li class="nav-item">
      <a href="{{ route('backend.main') }}" class="nav-link">
        <i class="nav-icon fa fa-home text-info"></i>
        <p>
          Halaman Utama
          {{-- <span class="badge badge-info right">2</span> --}}
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cog text-success"></i>
        <p>
          Master Data
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('user.index') }}" class="nav-link">
            <i class="fa fa-users nav-icon text-info"></i>
            <p>Data Pengguna</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-arrow-right text-danger"></i>
        <p>Menu - 01</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-arrow-left text-warning"></i>
        <p>Menu - 02</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user text-success"></i>
        <p>
          Manusia
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-ankh nav-icon text-info"></i>
            <p>Setengah Dewa</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-door-open nav-icon text-warning"></i>
            <p>
              Ujian Dewa
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-pray nav-icon text-primary"></i>
                <p>Dewa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-book-dead nav-icon text-danger"></i>
                <p>Undead</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-ban nav-icon text-danger"></i>
            <p>Undead</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-header">LABELS</li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-circle text-danger"></i>
        <p class="text">Important</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-circle text-warning"></i>
        <p>Warning</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-circle text-info"></i>
        <p>Informational</p>
      </a>
    </li>
  </ul>
</nav>