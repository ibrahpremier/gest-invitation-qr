
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <div class="brand-link">
      <span class="brand-text font-weight-bold ">Gestion des invités<br> au Mariage du kôrô</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pt-3 pb-3 mb-3 d-flex elevation-2">
        <div class="info">
          <a href="#" class="d-block">MENU
          </a>
        </div>

      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{route('invite.create')}}" class="nav-link {{ Request::routeIs('invite.create') ? 'active' : '' }}">
              <i class="fas fa-plus-circle"></i>
              <p>Ajouter un invité</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('invite.index')}}" class="nav-link {{ Request::routeIs('invite.index') || Request::routeIs('invite.show') ? 'active' : '' }}">
              <i class="fas fa-list-alt"></i>
              <p>Liste des invités</p>
            </a>
          </li>

          <br><br><br><br>
          {{-- <li class="nav-item bg-light">
            <a href="{{route('disconnect')}}" class="nav-link">
              <i class="fas fa-power-off"></i>
              <p>Déconnexion</p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>