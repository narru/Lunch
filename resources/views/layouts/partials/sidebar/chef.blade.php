<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ (\Request::route()->getName() == 'chef.index') ? 'active' : '' }}" href="{{ route('chef.index') }}">
          <i class="fa fa-dashboard"></i>
          Orders <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (\Request::route()->getName() == 'menu.index') ? 'active' : '' }}" href="{{ route('menu.index') }}">
          <i class="fa fa-book"></i>
          Menu <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (\Request::route()->getName() == 'category.index') ? 'active' : '' }}" href="{{ route('category.index') }}">
          <i class="fa fa-user"></i>
          Categories
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (\Request::route()->getName() == 'item.index') ? 'active' : '' }}" href="{{ route('item.index') }}">
          <i class="fa fa-user-o"></i>
          Items
        </a>
      </li>
    </ul>

  </div>
</nav>
