<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

  <div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">

        @admin
          <li>
            <a href="{{ route('root') }}" class="waves-effect">
              <i class="bx bx-home-circle"></i>
              <span key="t-contact">@lang('sidebar.dashboard')</span>
            </a>
          </li>

          <li class="{{ request()->routeIs('airlines.*') ? 'mm-active' : '' }}">
            <a href="{{ route('airlines.index') }}" class="waves-effect">
              <i class='bx bx-globe text-info'></i>
              <span key="t-contact">@lang('sidebar.airlines')</span>
            </a>
          </li>

          <li class="{{ request()->routeIs('planes.*') ? 'mm-active' : '' }}">
            <a href="{{ route('planes.index') }}" class="waves-effect">
              <i class='bx bxs-paper-plane text-warning'></i>
              <span key="t-contact">@lang('sidebar.planes')</span>
            </a>
          </li>

          <li class="{{ request()->routeIs('airports.*') ? 'mm-active' : '' }}">
            <a href="{{ route('airports.index') }}" class="waves-effect">
              <i class='bx bx-buildings text-success'></i>
              <span key="t-contact">@lang('sidebar.airports')</span>
            </a>
          </li>

          <li class="{{ request()->routeIs('flights.*') ? 'mm-active' : '' }}">
            <a href="{{ route('flights.index') }}" class="waves-effect">
              <i class='bx bxs-plane-alt text-danger'></i>
              <span key="t-contact">@lang('sidebar.flights')</span>
            </a>
          </li>
        @else
          {{-- USER ROUTES  --}}

          <li>
            <a href="{{ route('profile') }}" class="waves-effect">
              <i class="bx bx-user-circle"></i>
              <span key="t-contact">@lang('sidebar.my_profile')</span>
            </a>
          </li>

          <li>
            <a href="{{ route('tickets.flights') }}" class="waves-effect">
              <i class="bx bx-credit-card"></i>
              <span>@lang('sidebar.book_ticket')</span>
            </a>
          </li>

          <li>
            <a href="{{ route('tickets.userTickets') }}" class="waves-effect">
              <i class="bx bx-credit-card"></i>
              <span>@lang('sidebar.my_tickets')</span>
            </a>
          </li>
        @endadmin

        @if (false)
          {{-- @if (config('app.env') == 'dev') --}}
          @include('layouts.template-sidebar')
        @endif

      </ul>
    </div>
    <!-- Sidebar -->
  </div>
</div>
<!-- Left Sidebar End -->
