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

        <li class="menu-title" key="t-menu">@lang('sidebar.title.products')</li>

       

        {{-- car --}}
        {{-- @can('car_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class="bx bx-car"></i>
              <span key="t-ecommerce">@lang('sidebar.car')</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a href="{{ route('cars.index') }}" key="t-car">@lang('sidebar.car_list')</a></li>
              @can('car_add')
                <li><a href="{{ route('cars.create') }}" key="t-car">@lang('sidebar.add_car')</a></li>
              @endcan
            </ul>
          </li>
        @endcan --}}

        {{-- car expenses --}}
        {{-- @can('carExpense_view')
          <li>
            <a href="{{ route('car-expenses.index') }}" class="waves-effect">
              <i class="bx bx-gas-pump"></i>
              <span key="t-contact">@lang('sidebar.car_expense_list')</span>
            </a>
          </li>
        @endcan --}}







        {{-- @if (true) --}}
        @if (config('app.env') == 'dev')
          @include('layouts.template-sidebar')
        @endif

      </ul>
    </div>
    <!-- Sidebar -->
  </div>
</div>
<!-- Left Sidebar End -->
