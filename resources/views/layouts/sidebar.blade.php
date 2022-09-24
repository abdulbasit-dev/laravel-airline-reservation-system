<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

  <div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">

        <li>
          <a href="{{ route('root') }}" class="waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-contact">@lang('sidebar.dashboard')</span>
          </a>
        </li>

        <li>
          <a href="{{ route('airlines.index') }}" class="waves-effect">
            <i class="bx bx-planet"></i>
            <span key="t-contact">@lang('sidebar.airlines')</span>
          </a>
        </li>

        <li>
          <a href="{{ route('planes.index') }}" class="waves-effect">
            <i class="bx bx-planet"></i>
            <span key="t-contact">@lang('sidebar.planes')</span>
          </a>
        </li>

        <li>
          <a href="{{ route('airports.index') }}" class="waves-effect">
            <i class="bx bx-planet"></i>
            <span key="t-contact">@lang('sidebar.airports')</span>
          </a>
        </li>

        <li>
          <a href="{{ route('flights.index') }}" class="waves-effect">
            <i class="bx bx-planet"></i>
            <span key="t-contact">@lang('sidebar.flights')</span>
          </a>
        </li>

        @if (true)
        {{-- @if (config('app.env') == 'dev') --}}
          @include('layouts.template-sidebar')
        @endif

      </ul>
    </div>
    <!-- Sidebar -->
  </div>
</div>
<!-- Left Sidebar End -->
