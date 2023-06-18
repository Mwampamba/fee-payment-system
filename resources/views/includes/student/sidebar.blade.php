@php
  $current_route = request()->route()->getName();
@endphp 
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar"> 
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('studentDashboard') }}" class="nav-link {{ $current_route == 'studentDashboard'?'active':''}}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dashboard
                </p>
            </a>
          </li> 
            <li class="nav-item">
              <a href="{{ route('studentPayments') }}" class="nav-link {{ $current_route == 'studentPayments'?'active':''}}">
                <i class="nav-icon fas fa-book"></i>
                <p>Payments</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('getPasswordUpdateForm') }}" class="nav-link {{ $current_route == 'getPasswordUpdateForm'?'active':''}}">
                <i class="fa-fw fas fa-key nav-icon"></i>
                <p>Change password</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('studentLogout') }}" class="nav-link {{ $current_route == 'studentLogout'?'active':''}}">
                <i class="nav-icon fas fa-power-off"></i>
                <p>Sign out</p>
              </a>
            </li>
        </ul>
      </nav>
    </div>
</aside>
