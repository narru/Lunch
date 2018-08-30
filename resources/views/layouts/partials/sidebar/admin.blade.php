<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ (\Request::route()->getName() == 'admin.index') ? 'active' : '' }}" href="{{ route('admin.index') }}">
          <i class="fa fa-dashboard"></i>
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (\Request::route()->getName() == 'admin.employees.index') ? 'active' : '' }}" href="{{ route('admin.employees.index') }}">
          <i class="fa fa-user"></i>
          Employees
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (\Request::route()->getName() == 'admin.chefs.index') ? 'active' : '' }}" href="{{ route('admin.chefs.index') }}">
          <i class="fa fa-user-o"></i>
          Chefs
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (\Request::route()->getName() == 'admin.searchmenu') ? 'active' : '' }}" href="{{ route('admin.searchmenu') }}"> 
          <i class="fa fa-search"></i>
          Last Day Menu
        </a>
      </li>
    </ul>

  </div>
</nav>
