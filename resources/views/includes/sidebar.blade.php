@php
  $current_route = request()->route()->getName();
@endphp
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar"> 
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link {{ $current_route == 'dashboard'?'active':''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  Dashboard
              </p>
          </a>
        </li>
        @can('isAdmin')
        <li class="nav-item">
          <a href="{{ route('students') }}" class="nav-link {{ $current_route == 'students'?'active':''}}">
            <i class="fa-fw fas fa-users nav-icon"></i>
            <p>Students</p>
          </a>
        </li>  
        <li class="nav-item">
          <a href="{{ route('classes') }}" class="nav-link {{ $current_route == 'classes'?'active':''}}">
            <i class="nav-icon fa fa-copy"></i>
            <p>Classes</p>
          </a>
        </li> 
        @endcan
        <li class="nav-item">
          <a href="{{ route('getAllStudentPayments')}}" class="nav-link {{ $current_route == 'getAllStudentPayments'?'active':''}}">
            <i class="fa-fw fas fa-briefcase nav-icon"></i>
            <p>Payments</p>
          </a>
        </li> 
        @can('isAdmin')
        <li class="nav-item">
          <a href="{{ route('classPromotion') }}" class="nav-link {{ $current_route == 'classPromotion'?'active':''}}">
            <i class="fa-fw fas fa-briefcase nav-icon"></i>
            <p>Promotions</p>
          </a>
        </li> 
           
        <li class="nav-item">
          <a href="{{ route('staffs') }}" class="nav-link {{ $current_route == 'staffs'?'active':''}}">
            <i class="nav-icon fas fa-users"></i>
            <p>Staffs</p>
          </a>
        </li>  
        <li class="nav-item">
          <a href="{{ route('programmes') }}" class="nav-link {{ $current_route == 'programmes'?'active':''}}">
            <i class="fa-fw fas fa-briefcase nav-icon"></i>
            <p>Programmes</p>
          </a>
        </li>  
        <!-- <li class="nav-item">
          <a href="{{ route('semesters') }}" class="nav-link {{ $current_route == 'semesters'?'active':''}}">
            <i class="fa-fw fas fa-briefcase nav-icon"></i>
            <p>Semesters</p>
          </a>
        </li>  -->
        <li class="nav-item">
          <a href="{{ route('academicYears') }}" class="nav-link {{ $current_route == 'academicYears'?'active':''}}">
            <i class="fa-fw fas fa-briefcase nav-icon"></i>
            <p>Academic years</p>
          </a>
        </li> 
        @endcan
        <li class="nav-item">
            <a href="{{ route('getPasswordUpdate') }}" class="nav-link {{ $current_route == 'getPasswordUpdate'?'active':''}}">
              <i class="fa-fw fas fa-key nav-icon"></i>
              <p>Change password</p>
            </a>
          </li>
        <li class="nav-item">
            <a href="{{ route('staffLogout')}}" class="nav-link {{ $current_route == 'staffLogout'?'active':''}}">
              <i class="nav-icon fa fa-power-off"></i>
              <p>Sign out</p>
            </a>
        </li>
      </nav>
    </div>
  </aside>
