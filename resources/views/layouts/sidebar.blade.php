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

        {{-- product --}}
        @can('product_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class="bx bxl-dropbox"></i>
              <span key="t-ecommerce">@lang('sidebar.product')</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a href="{{ route('products.index') }}" key="t-products">@lang('sidebar.product_list')</a></li>
              @can('add_products')
                <li><a href="{{ route('products.create') }}" key="t-products">@lang('sidebar.add_product')</a></li>
              @endcan
              @can('category_view')
                <li><a class="{{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}" key="t-products">@lang('sidebar.category')</a></li>
              @endcan
              @can('purchase_view')
                <li><a href="{{ route('purchases.check') }}" key="t-products">@lang('sidebar.purchase_products')</a></li>
              @endcan
            </ul>
          </li>
        @endcan

        {{-- return product --}}
        @can('returnProduct_view')
          <li>
            <a href="{{ route('return-products.index') }}" class="waves-effect">
              <i class="bx bx-archive-out"></i>
              <span key="t-contact">@lang('sidebar.return_product_list')</span>
            </a>
          </li>
        @endcan


        {{-- coupon --}}
        @can('coupon_view')
          <li>
            <a href="{{ route('coupons.index') }}" class="waves-effect">
              <i class="bx bxs-coupon"></i>
              <span key="t-contact">@lang('sidebar.coupon')</span>
            </a>
          </li>
        @endcan

        {{-- supplier --}}
        @can('supplier_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class="bx bxs-truck"></i>
              <span key="t-ecommerce">@lang('sidebar.supplier')</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a class="{{ request()->routeIs('suppliers.index') ? 'active' : '' }}" href="{{ route('suppliers.index') }}" key="t-products">@lang('sidebar.supplier_list')</a></li>
              @can('supplier_add')
                <li><a class="{{ request()->routeIs('suppliers.create') ? 'active' : '' }}" href="{{ route('suppliers.create') }}" key="t-products">@lang('sidebar.add_supplier')</a></li>
              @endcan
            </ul>
          </li>

        @endcan

        {{-- client --}}
        @can('client_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class="bx bx-customize"></i>
              <span key="t-ecommerce">@lang('sidebar.client')</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a href="{{ route('clients.index') }}" key="t-products">@lang('sidebar.client_list')</a></li>
              @can('client_add')
                <li><a href="{{ route('clients.create') }}" key="t-products">@lang('sidebar.add_client')</a></li>
              @endcan
              <li><a href="{{ route('clients.mapView') }}" key="t-products">@lang('sidebar.client_map')</a></li>
              @can('clientCategory_view')
                <li><a href="{{ route('client-categories.index') }}" key="t-products">@lang('sidebar.client_category')</a></li>
              @endcan
              @can('zone_view')
                <li><a href="{{ route('zones.index') }}" key="t-products">@lang('sidebar.zone')</a></li>
              @endcan
            </ul>
          </li>
        @endcan


        <li class="menu-title" key="t-menu">@lang('sidebar.title.orders')</li>

        {{-- orders --}}
        @can('order_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class="bx bx-box"></i>
              <span key="t-ecommerce">@lang('sidebar.order')</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a href="{{ route('orders.index') }}" key="t-products">@lang('sidebar.all_order')</a></li>
              <li><a href="{{ route('orders.index', ['status' => 'ordered']) }}" class="{{ request()->get('status') == 'ordered' ? 'active' : '' }}" key="t-products">@lang('sidebar.pending_orders')</a></li>
              <li><a href="{{ route('orders.index', ['status' => 'accepted']) }}" class="{{ request()->get('status') == 'accepted' ? 'active' : '' }}" key="t-products">@lang('sidebar.accepted_orders')</a></li>
              <li><a href="{{ route('orders.index', ['status' => 'canceled']) }}" class="{{ request()->get('status') == 'canceled' ? 'active' : '' }}" key="t-products">@lang('sidebar.canceled_orders')</a></li>
              <li><a href="{{ route('orders.index', ['status' => 'assigned']) }}" class="{{ request()->get('status') == 'assigned' ? 'active' : '' }}" key="t-products">@lang('sidebar.assigned_orders')</a></li>
              <li><a href="{{ route('orders.index', ['status' => 'pickedup']) }}" class="{{ request()->get('status') == 'pickedup' ? 'active' : '' }}" key="t-products">@lang('sidebar.pickedup_orders')</a></li>
              <li><a href="{{ route('orders.index', ['status' => 'delivered']) }}"class="{{ request()->get('status') == 'delivered' ? 'active' : '' }}" key="t-products">@lang('sidebar.delivered_orders')</a></li>
            </ul>
          </li>
        @endcan

        {{-- warehouse --}}
        @can('warehouse_view')
          <li>
            <a href="{{ route('new-order.index') }}" class="waves-effect">
              <i class="bx bx-store"></i>
              <span key="t-contact">@lang('sidebar.warehouse')</span>
            </a>
          </li>
        @endcan


        {{-- purchases --}}
        @can('purchase_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class='bx bx-dollar'></i>
              <span key="t-safe">@lang('sidebar.purchases')</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a href="{{ route('purchases.index') }}" key="t-safe">@lang('sidebar.purchases_list')</a></li>
              <li><a href="{{ route('purchase-history.index') }}" key="t-safe">@lang('sidebar.purchases_history')</a></li>
            </ul>
          </li>
        @endcan

        {{-- Payments --}}
        @can('payment_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class='bx bx-transfer'></i>
              <span key="t-safe">@lang('sidebar.payments')</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a href="{{ route('payments.index') }}" key="t-safe">@lang('sidebar.payments_list')</a></li>
              <li><a href="{{ route('payment-history.index') }}" key="t-safe">@lang('sidebar.payments_history')</a></li>
              <li><a href="{{ route('payment-history.received') }}" key="t-safe">@lang('sidebar.payments_received')</a></li>
            </ul>
          </li>
        @endcan

        {{-- Safe --}}
        @can('payment_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class='bx bxs-bank'></i>
              <span key="t-safe">@lang('sidebar.safe')</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a href="{{ route('safes.index') }}" key="t-safe">@lang('sidebar.safe_list')</a></li>
              @can('safe_add')
                <li><a href="{{ route('safes.create') }}" key="t-safe-create">@lang('sidebar.add_safe')</a></li>
              @endcan
            </ul>
          </li>
        @endcan

        {{-- Reports --}}
        @can('report_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class="bx bx-receipt"></i>
              <span key="t-invoices">@lang('sidebar.report.report')</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              @can('orderReport_view')
                <li><a href="{{ route('reports.order') }}" key="t-invoice-list">@lang('sidebar.report.order')</a></li>
              @endcan
              @can('productReport_view')
                <li><a href="{{ route('reports.product') }}" key="t-invoice-list">@lang('sidebar.report.product')</a></li>
              @endcan
              @can('clientReport_view')
                <li><a href="{{ route('reports.client') }}" key="t-invoice-list">@lang('sidebar.report.client')</a></li>
              @endcan
              @can('carReport_view')
                <li><a href="{{ route('reports.car') }}" key="t-invoice-list">@lang('sidebar.report.car')</a></li>
              @endcan
              @can('carExpenseReport_view')
                <li><a href="{{ route('reports.carExpense') }}" key="t-invoice-list">@lang('sidebar.report.car_expense')</a></li>
              @endcan
              @can('visitReport_view')
                <li><a href="{{ route('reports.visit') }}" key="t-invoice-list">@lang('sidebar.report.visit')</a></li>
              @endcan
              @can('expenseReport_view')
                <li><a href="{{ route('reports.expense') }}" key="t-invoice-list">@lang('sidebar.report.expense')</a></li>
              @endcan
              @can('supplierReport_view')
                <li><a href="{{ route('reports.supplier') }}" key="t-invoice-list">@lang('sidebar.report.supplier')</a></li>
              @endcan
              @can('returnProductReport_view')
                <li><a href="{{ route('reports.returnProduct') }}" key="t-invoice-list">@lang('sidebar.report.return_product')</a></li>
              @endcan
            </ul>
          </li>
        @endcan

        {{-- car --}}
        @can('car_view')
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
        @endcan

        {{-- car expenses --}}
        @can('carExpense_view')
          <li>
            <a href="{{ route('car-expenses.index') }}" class="waves-effect">
              <i class="bx bx-gas-pump"></i>
              <span key="t-contact">@lang('sidebar.car_expense_list')</span>
            </a>
          </li>
        @endcan

        {{-- Expense --}}
        @can('expense_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class='bx bx-wallet'></i>
              <span key="t-ecommerce">@lang('sidebar.expense')</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a class="{{ request()->routeIs('expenses.index') ? 'active' : '' }}" href="{{ route('expenses.index') }}" key="t-products">@lang('sidebar.expense_list')</a></li>
              @can('expense_add')
                <li><a class="{{ request()->routeIs('expenses.create') ? 'active' : '' }}" href="{{ route('expenses.create') }}" key="t-products">@lang('sidebar.add_expense')</a></li>
              @endcan
              @can('expenseTag_view')
                <li><a class="{{ request()->routeIs('expense-tags.index') ? 'active' : '' }}" href="{{ route('expense-tags.index') }}" key="t-products">@lang('sidebar.expense_tag_list')</a></li>
              @endcan
            </ul>
          </li>
        @endcan

        {{-- Contact --}}
        @can('contact_view')
          <li>
            <a href="{{ route('contacts.index') }}" class="waves-effect">
              <i class="bx bx-mail-send"></i>
              <span key="t-contact">@lang('sidebar.contact')</span>
            </a>
          </li>
        @endcan

        {{-- setting --}}
        @can('setting_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class="bx bx-cog"></i>
              <span key="t-ecommerce">@lang('sidebar.setting')</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a href="{{ route('settings.index') }}" key="t-products">@lang('sidebar.setting')</a></li>
              <li><a href="{{ route('exchange-history.create') }}" key="t-usd-rate-create">@lang('sidebar.usd_rate')</a></li>
              <li><a href="{{ route('exchange-history.index') }}" key="t-exchange">@lang('sidebar.exchange_history')</a></li>
            </ul>
          </li>
        @endcan

        <li class="menu-title" key="t-menu">@lang('sidebar.title.users')</li>

        {{-- worktime --}}
        @can('worktime_view')
          <li>
            <a href="{{ route('work-times.index') }}" class="waves-effect">
              <i class="bx bx-calendar"></i>
              <span key="t-contact">@lang('sidebar.work_time')</span>
            </a>
          </li>
        @endcan


        {{-- tracking --}}
        @can('tracking_live_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class="bx bx-map"></i>
              <span key="t-ecommerce">@lang('sidebar.tracking')</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a class="{{ request()->routeIs('tracking.live') ? 'active' : '' }}" href="{{ route('tracking.live') }}" key="t-products">@lang('sidebar.tracking_live')</a></li>
              <li><a class="{{ request()->routeIs('tracking.history') ? 'active' : '' }}" href="{{ route('tracking.history') }}" key="t-products">@lang('sidebar.tracking_history')</a></li>
            </ul>
          </li>
        @endcan

        {{-- Visit --}}
        @can('visit_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
              <i class='bx bx-revision'></i>
              <span key="t-ecommerce">@lang('sidebar.visit')</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a class="{{ request()->routeIs('visits.index') ? 'active' : '' }}" href="{{ route('visits.index') }}" key="t-products">@lang('sidebar.visit_list')</a></li>
              @can('visitDescription_view')
                <li><a class="{{ request()->routeIs('visit-description.index') ? 'active' : '' }}" href="{{ route('visit-description.index') }}" key="t-products">@lang('sidebar.visit_description_list')</a></li>
              @endcan
            </ul>
          </li>
        @endcan

        {{-- users & role mangement --}}
        @can('user_view')
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect {{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'mm-active' : '' }}">
              <i class="fas fa-users-cog"></i>
              <span key="t-ecommerce">@lang('sidebar.user_mangement')</span>
            </a>
            <ul class="sub-menu {{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'mm-show' : '' }}" aria-expanded="false">
              <li><a href="{{ route('users.index') }}" key="t-products">@lang('sidebar.user_list')</a></li>
              @can('user_add')
                <li><a href="{{ route('users.create') }}" key="t-products">@lang('sidebar.add_user')</a></li>
              @endcan
              @can('role_view')
                <li><a href="{{ route('roles.index') }}" key="t-products">@lang('sidebar.role')</a></li>
              @endcan
            </ul>
          </li>
        @endcan


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
