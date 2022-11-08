@extends('layouts.master')

@section('title')
  @lang('translation.user.profile')
@endsection

@section('plugin-css')
  <!-- Dropzone -->
  <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.user.profile')
    @endslot
    @slot('li_2')
      {{ route('profile') }}
    @endslot
    @slot('title')
      @lang('translation.user.profile')
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-xl-12">
      <div class="card overflow-hidden">
        <div class="bg-primary bg-soft">
          <div class="row">
            <div class="col-7">
            </div>
            <div class="col-5 align-self-end">
              <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="card-body pt-0">
          <div class="d-flex justify-content-between align-items-start">
            <div class="">
              <div class="mb-4">
                <img id="avatar" src="{{ getAvatar(auth()->user()) }}" alt="" class="rounded-circle avatar-lg">
              </div>
              <h5 class="font-size-15 text-truncate userName ms-2">{{ Auth::user()->name }}</h5>
              <p class="text-muted text-truncate ms-2 mb-0">{{ Auth::user()->getRoleName }}</p>
            </div>

            <div class="">
              <div class="pt-4">
                <div class="mt-4">
                  <a href="" class="btn btn-outline-primary waves-effect waves-light btn-sm" data-bs-toggle="modal" data-bs-target=".update-profile">@lang('buttons.edit_resource', ['resource' => __('attributes.profile')])</a>
                  <a href="" class="btn btn-outline-warning waves-effect waves-light btn-sm ms-2" data-bs-toggle="modal" data-bs-target=".update-password">@lang('buttons.edit_resource', ['resource' => __('attributes.password')])</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end card -->

      {{-- personal info --}}
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">@lang('translation.user.personal_info')</h4>

          <div class="table-responsive">
            <table class="table-nowrap mb-0 table">
              <tbody>
                <tr>
                  <th scope="row">@lang('translation.user.name')</th>
                  <td class="userName">{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                  <th scope="row">@lang('translation.user.email')</th>
                  <td id="email">{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                  <th scope="row">@lang('translation.user.phone')</th>
                  <td id="phone">{{ Auth::user()->phone }}</td>
                </tr>
                <tr>
                  <th scope="row">@lang('translation.user.address')</th>
                  <td id="address">{{ Auth::user()->address ?? '---' }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
  <!-- end row -->

  <!--  Update Profile Modal -->
  <div class="modal fade update-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myLargeModalLabel">@lang('translation.edit_resource', ['resource' => __('attributes.profile')])</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" novalidate enctype="multipart/form-data" id="update-profile">
            @csrf

            <div class="mb-3">
              <label for="name" class="col-form-label">@lang('translation.user.name')</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
              <div class="valid-feedback">
                @lang('validation.good')
              </div>
              <div class="invalid-feedback">
                @lang('validation.required', ['attribute' => __('translation.user.name')])
              </div>
            </div>

            <div class="mb-3">
              <label for="email" class="col-form-label">@lang('translation.user.email')</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
              <div class="valid-feedback">
                @lang('validation.good')
              </div>
              <div class="invalid-feedback">
                @lang('validation.required', ['attribute' => __('translation.user.email')])
              </div>
            </div>

            <div class="mb-3">
              <label for="phone" class="col-form-label">@lang('translation.user.phone')</label>
              <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}" required>
              <div class="valid-feedback">
                @lang('validation.good')
              </div>
              <div class="invalid-feedback">
                @lang('validation.required', ['attribute' => __('translation.user.phone')])
              </div>
            </div>

            <div class="mb-3">
              <label for="address" class="col-form-label">@lang('translation.user.address')</label>
              <input type="text" class="form-control" id="address" name="address" value="{{ old('address', auth()->user()->address) }}" required>
              <div class="valid-feedback">
                @lang('validation.good')
              </div>
              <div class="invalid-feedback">
                @lang('validation.required', ['attribute' => __('translation.user.address')])
              </div>
            </div>

            <div class="mb-3" id="upload">
              <label for="image" class="col-form-label">@lang('translation.user.image')</label>
              <div id="myDropzone" class="dropzone">
                <div class="dz-message needsclick">
                  <div class="mb-3">
                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                  </div>
                  <h4>@lang('translation.drop_here')</h4>
                </div>
              </div>
            </div>

            <div class="d-grid mt-3">
              <button class="btn btn-primary waves-effect waves-light UpdateProfile" data-id="{{ Auth::user()->id }}" type="submit">@lang('buttons.update')</button>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!--  Update Password Modal -->
  <div class="modal fade update-password" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myLargeModalLabel">@lang('translation.edit_resource', ['resource' => __('attributes.password')])</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" id="update-password">
            @csrf
            <div class="mb-3">
              <label for="current_password">@lang('translation.user.current_password')</label>
              <input id="current-password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" autocomplete="current_password">
              <div class="text-danger" id="current_passwordError" data-ajax-feedback="current_password"></div>
            </div>

            <div class="mb-3">
              <label for="newpassword">@lang('translation.user.new_password')</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="new_password" autocomplete="new_password">
              <div class="text-danger" id="new_passwordError" data-ajax-feedback="password"></div>
            </div>

            <div class="mb-3">
              <label for="userpassword">@lang('translation.user.confirm_password')</label>
              <input id="password-confirm" type="password" class="form-control" name="new_password_confirmation" autocomplete="new_password">
              <div class="text-danger" id="password_confirmError" data-ajax-feedback="password-confirm"></div>
            </div>

            <div class="d-grid mt-3">
              <button class="btn btn-primary waves-effect waves-light UpdatePassword" data-id="{{ Auth::user()->id }}" type="submit">Update Password</button>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
@endsection
@section('script')
  <!-- Dropzone js -->
  <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
  {{-- Dropzone Config --}}
  <script src="{{ URL::asset('assets/js/dropzone-config.js') }}"></script>

  <script>
    $('#update-profile').on('submit', function(event) {
      event.preventDefault();
      let formData = new FormData(this);
      $('#emailError').text('');
      $('#nameError').text('');
      $('#dobError').text('');
      $('#avatarError').text('');

      $.ajax({
        url: "{{ route('profile.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          Swal.fire({
            timer: 1500,
            text: data.message,
            icon: "success",
          })

          // update data
          $('.userName').text(data.data.name);
          $('#email').text(data.data.email);
          $('#phone').text(data.data.phone);
          $('#phone_alt').text(data.data.phone_alt);
          $('#address').text(data.data.address);
          //   $('#avatar').attr('src', data.data.image);

          // close the modal
          $('.update-profile').modal('hide');
          $('#update-profile')[0].reset();
          //reset valiation
          $('#update-profile').removeClass('was-validated');

        },
        error: function(data) {
          if (data.responseJSON.status === 500) {
            Swal.fire({
              timer: "20000",
              title: data.responseJSON.message,
              text: data.responseJSON.errors,
              customClass: "swal-error",
              icon: "error",
            })
          }
        }
      });
    });

    $('#update-password').on('submit', function(event) {
      event.preventDefault();
      let formData = new FormData(this);
      $.ajax({
        url: "{{ route('profile.updatePassword') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          Swal.fire({
            timer: 1500,
            text: data.message,
            icon: "success",
          })

          // close the modal
          $('.update-password').modal('hide');
          $('#update-password')[0].reset();
          //reset valiation
          $('#update-password').removeClass('was-validated');

        },
        error: function(data) {
          if (data.responseJSON.status === 500) {
            Swal.fire({
              timer: "20000",
              title: data.responseJSON.message,
              text: data.responseJSON.errors,
              customClass: "swal-error",
              icon: "error",
            })
          }
          if (data.responseJSON.status === 422) {
            $.each(data.responseJSON.errors, function(key, value) {
              $('#' + key + 'Error').text(value);
            });
          }

          //if password not match
          if (data.responseJSON.status === 401) {
            $('#current_passwordError').text(data.responseJSON.message);
          }
        }
      });
    });
  </script>
@endsection
