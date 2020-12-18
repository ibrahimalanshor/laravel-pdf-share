<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.index') }}" class="brand-link text-center">
    <span class="brand-text font-weight-light"><b>{{ site('name') }}</b></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('admin.index') }}" class="nav-link {{ active('admin') }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.files.index') }}" class="nav-link {{ active('admin/files') }}">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              PDF
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.users.index') }}" class="nav-link {{ active('admin/users') }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              User
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.setting') }}" class="nav-link {{ active('admin/setting') }}">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Setting
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>