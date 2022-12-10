
  <aside class="main-sidebar sidebar-light-danger elevation-4">
    <div class="brand-link bg-danger">
      <span class="brand-text text-wrap" style="font-family:cursive">Mariage de NGABA OKOUM & MARIETTE</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pt-3 pb-3 mb-3 d-flex border-danger">
        <div class="info">
          <a href="#" class="d-block">MENU
          </a>
        </div>

      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{route('table.index')}}" class="nav-link {{ Request::routeIs('table.index') || Request::routeIs('table.show') || Request::routeIs('table.create') ? 'active' : '' }}">
              {{-- <i class="fas fa-list-alt"></i> --}}
              <i class="fas fa-caret-right"></i>
              <p>Gestion des tables</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('invite.index')}}" class="nav-link {{ Request::routeIs('invite.index') || Request::routeIs('invite.show') || Request::routeIs('invite.create') ? 'active' : '' }}">
              {{-- <i class="fas fa-list-alt"></i> --}}
              <i class="fas fa-caret-right"></i>
              <p>Gestion des invités</p>
            </a>
          </li>

          <br><br><br><br>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>