<?php

$sidebar = [
  [
    "title" => "Dashboard",
    "link" => "/",
    "icon" => "fas fa-tachometer-alt",
    "children" => []
  ],
  [
    "title" => "Menu Master",
    "link" => "#",
    "icon" => "fas fa-th",
    "children" => [
      [
        "title" => "Anggota",
        "link" => route('anggota.index'),
        "icon" => "",
      ],
      [
        "title" => "User",
        "link" => route('user.index'),
        "icon" => "",
        "role" => "Administrator",
      ],
    ]
  ],
  [
    "title" => "Menu Transaksi",
    "link" => "#",
    "icon" => "fas fa-th",
    "children" => [
      [
        "title" => "Peminjaman",
        "link" => route('peminjaman.index'),
        "icon" => "",
      ],
      [
        "title" => "Tabungan",
        "link" => route('tabungan.index'),
        "icon" => "",
      ],
    ]
  ],
  [
    "title" => "Report",
    "link" => "#",
    "icon" => ""
  ],
  [
    "title" => "Setting",
    "link" => "#",
    "icon" => "fas fa-cogs",
    "children" => [
      [
        "title" => "Base Setting",
        "link" => "#",
        "icon" => "fas fa-cog",
      ],
      [
        "title" => "Ganti Password",
        "link" => route('auth.change_password.form'),
        "icon" => "fas fa-cog",
      ]
    ]
  ]
];

?>



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?= HtmlHelper::generateSidebar($sidebar) ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>