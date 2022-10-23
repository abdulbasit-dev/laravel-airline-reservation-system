<header id="page-topbar">
  <div class="navbar-header">
    <div class="d-flex">
      <!-- LOGO -->
      <div class="navbar-brand-box">
        <a href="{{ route('root') }}" class="logo logo-dark">
          <span class="logo-sm">
            <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="22">
          </span>
          <span class="logo-lg">
            <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="17">
          </span>
        </a>

        <a href="{{ route('root') }}" class="logo logo-light">
          <span class="logo-sm">
            <img src="{{ URL::asset('/assets/images/air-plane-icon.jpg') }}" alt=""  class="rounded-circle" height="30">
          </span>
          <span class="logo-lg">
            <img src="{{ URL::asset('/assets/images/air-plane-icon.jpg') }}" alt="" class="rounded-circle mt-3" height="60">
          </span>
        </a>
      </div>

      <button type="button" class="btn btn-sm font-size-16 header-item waves-effect px-3" id="vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
      </button>
    </div>

    <div class="d-flex">

      <div class="dropdown d-none d-lg-inline-block ms-1">
        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen" onclick="toggleScreen()">
          <i class="bx bx-fullscreen"></i>
        </button>
        <script>
          function toggleScreen() {
            var elem = document.documentElement;
            if (!window.screenTop && !window.screenY) {
              openFullscreen();
            } else {
              closeFullscreen();
            }
            /* View in fullscreen */
            function openFullscreen() {
              if (elem.requestFullscreen) {
                elem.requestFullscreen();
              } else if (elem.webkitRequestFullscreen) {
                /* Safari */
                elem.webkitRequestFullscreen();
              } else if (elem.msRequestFullscreen) {
                /* IE11 */
                elem.msRequestFullscreen();
              }
            }

            /* Close fullscreen */
            function closeFullscreen() {
              if (document.exitFullscreen) {
                document.exitFullscreen();
              } else if (document.webkitExitFullscreen) {
                /* Safari */
                document.webkitExitFullscreen();
              } else if (document.msExitFullscreen) {
                /* IE11 */
                document.msExitFullscreen();
              }
            }
          }
        </script>
      </div>


      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="rounded-circle header-profile-user" src="{{ getAvatar(auth()->user()) }}" alt="Header Avatar">
          <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ ucfirst(Auth::user()->name) }}</span>
          <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <!-- item-->
          <a class="dropdown-item" href="{{ route('profile') }}"><i class="bx bx-user font-size-16 me-1 align-middle"></i> <span key="t-profile">@lang('translation.Profile')</span></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 me-1 text-danger align-middle"></i> <span
              key="t-logout">@lang('translation.Logout')</span></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
</header>
