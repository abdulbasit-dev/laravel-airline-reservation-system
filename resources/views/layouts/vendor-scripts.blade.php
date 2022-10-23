<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
{{-- Select2 --}}
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/form-validation.init.js') }}"></script>

@yield('script')

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js') }}"></script>

{{-- sweetalert2 message --}}
@if (Session::has('message'))
  <script>
    Swal.fire({
      timer: "{{ Session::get('icon') === 'error' ? 20000 : 1500 }}",
      customClass: "{{ Session::get('icon') === 'error' ? 'swal-error' : null }}",
      icon: "{{ Session::get('icon') }}",
      title: "{{ Session::get('title') }}",
      text: "{{ Session::get('message') }}",
    })
  </script>
@endif

<script>
  $(document).ready(function() {
    // Select2
    $(".select2").select2();

    // Select2 while open fouces on search input
    $(document).on('select2:open', () => {
      document.querySelector('.select2-search__field').focus();
    });
  });


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
