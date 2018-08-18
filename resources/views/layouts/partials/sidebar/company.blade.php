<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ (\Request::route()->getName() == 'company.dashboard') ? 'active' : '' }}" href="{{ route('company.dashboard') }}">
          <i class="fa fa-dashboard"></i>
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (\Request::route()->getName() == 'branch.index') ? 'active' : '' }}" href="{{ route('branch.index') }}">
          <i class="fa fa-link"></i>
          Branches
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (\Request::route()->getName() == 'admin.allAdmins') ? 'active' : '' }}" href="{{ route('admin.allAdmins') }}">
          <i class="fa fa-truck"></i>
          Warehouse
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (\Request::route()->getName() == 'subscription.index') ? 'active' : '' }}" href="{{ route('subscription.index') }}">
          <i class="fa fa-user-secret"></i>
          Managers
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (\Request::route()->getName() == 'users.trash') ? 'active' : '' }}" href="{{ route('users.trash') }}">
          <i class="fa fa-user-o"></i>
          Staffs
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Saved reports</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <i class="fa fa-bar-chart-o"></i>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-calendar-o"></i>
          Current month
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-calendar-plus-o"></i>
          Last quarter
        </a>
      </li>
    </ul>
  </div>
</nav>
