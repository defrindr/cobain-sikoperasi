
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><?= Auth::user()->nama ?> ( <?= Auth::user()->username ?> )</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('auth.logout') }}" class="nav-link">logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->