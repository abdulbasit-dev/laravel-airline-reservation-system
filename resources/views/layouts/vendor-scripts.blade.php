<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>

<script>
  $('#change-password').on('submit', function(event) {
    event.preventDefault();
    var Id = $('#data_id').val();
    var current_password = $('#current-password').val();
    var password = $('#password').val();
    var password_confirm = $('#password-confirm').val();
    $('#current_passwordError').text('');
    $('#passwordError').text('');
    $('#password_confirmError').text('');
    $.ajax({
      url: "{{ url('update-password') }}" + "/" + Id,
      type: "POST",
      data: {
        "current_password": current_password,
        "password": password,
        "password_confirmation": password_confirm,
        "_token": "{{ csrf_token() }}",
      },
      success: function(response) {
        $('#current_passwordError').text('');
        $('#passwordError').text('');
        $('#password_confirmError').text('');
        if (response.isSuccess == false) {
          $('#current_passwordError').text(response.Message);
        } else if (response.isSuccess == true) {
          setTimeout(function() {
            window.location.href = "{{ route('root') }}";
            window.location.href = "{{ route('root') }}";
            window.location.href = "{{ route('root') }}";
          }, 1000);
        }
      },
      error: function(response) {
        $('#current_passwordError').text(response.responseJSON.errors.current_password);
        $('#passwordError').text(response.responseJSON.errors.password);
        $('#password_confirmError').text(response.responseJSON.errors.password_confirmation);
      }
    });
  });
</script>

@yield('script')

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js') }}"></script>

{{-- sweetalert2 message --}}
@if (Session::has('message'))
  <script>
    Swal.fire({
      timer: "{{ Session::get('icon') === 'error' ? 20000 : 2000 }}",
      customClass: "{{ Session::get('icon') === 'error' ? 'swal-error' : null }}",
      icon: "{{ Session::get('icon') }}",
      title: "{{ Session::get('title') }}",
      text: "{{ Session::get('message') }}",
    })
  </script>
@endif

<script>
  //this function is used to delete data that come from databale by passing the destroy url of that model in the button
  $(document).on('click', '.delete-btn', function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    const url = $(this).data('url');
    Swal.fire({
      title: "{{ __('messages.are_you_sure') }}",
      text: "{!! __('messages.warning_message') !!}",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "{{ __('buttons.yes_delete') }}",
      cancelButtonText: "{{ __('buttons.cancel') }}",
      customClass: {
        confirmButton: 'btn btn-success mt-2',
        cancelButton: 'btn btn-danger ms-2 mt-2'
      },
      buttonsStyling: !1
    }).then(function(willDelete) {
      if (willDelete.isConfirmed) {
        $.ajax({
          type: "POST",
          url: url,
          data: {
            _method: 'DELETE',
            _token: '{{ csrf_token() }}'

          },
          success: function(data) {
            Swal.fire({
              timer: "1000",
              text: "{{ __('messages.delete') }}",
              icon: "success"
            })
            $('#datatable').DataTable().ajax.reload();
          },
          error: function(data) {
            Swal.fire({
              title: "{{ __('messages.error_title') }}",
              text: "{{ __('messages.error') }}",
              icon: "error"
            });
          }
        });
      }
    });
  })

  // this function is used to delete data that by a tag that submit a form
  const submitDeleteForm = (formId) => {
    Swal.fire({
      title: '{{ __('messages.are_you_sure') }}',
      text: `{!! __('messages.warning_message') !!}`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: '{{ __('buttons.yes_delete') }}',
      cancelButtonText: '{{ __('buttons.cancel') }}',
      customClass: {
        confirmButton: 'btn btn-success mt-2',
        cancelButton: 'btn btn-danger ms-2 mt-2'
      },
      buttonsStyling: !1
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById(formId).submit();
      }
    })
  }

  $('.select-all').click(function() {
    let $select2 = $(this).parent().find('.select2');
    $select2.find('option').prop('selected', 'selected');
    $select2.trigger('change');
  });
  $('.deselect-all').click(function() {
    let $select2 = $(this).parent().find('.select2');
    $select2.find('option').prop('selected', '');
    $select2.trigger('change');
  });
</script>

@stack('scripts')
@yield('script-bottom')
