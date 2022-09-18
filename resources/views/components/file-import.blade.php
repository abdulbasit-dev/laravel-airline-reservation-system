@section('plugin-css')
  <!-- Plugins css -->
  <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


{{-- import modal --}}
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="modal fade" id="importFile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('translation.file_upload')</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div>
          <form action="{{ $route }}" enctype="multipart/form-data" method="POST" class="dropzone" id="my-dropzone">
            @csrf
            <div class="fallback">
              <input name="file" type="file">
            </div>
            <div class="dz-message needsclick">
              <div class="mb-3">
                <i class="display-4 text-muted bx bxs-cloud-upload"></i>
              </div>

              <h4>@lang('translation.drop_here')</h4>
            </div>
          </form>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('buttons.close')</button>
        <button type="submit" onclick="document.getElementById('my-dropzone').submit()" class="btn btn-primary">@lang('buttons.submit')</button>
      </div>

    </div>
  </div>
</div>

@push('scripts')
  <!-- Dropzone js -->
  <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>


  <script type="text/javascript">
    var uploadedDocumentMap = {}
    Dropzone.options.myDropzone = {
      url: "{{ route('storeTempFile') }}",
      maxFilesize: 10, // MB
      uploadMultiple: false,
      maxFiles: 1,
      addRemoveLinks: true,
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      success: function(file, response) {
        $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
        uploadedDocumentMap[file.name] = response.name
      },
      removedfile: function(file) {
        file.previewElement.remove()
        var name = ''
        if (typeof file.file_name !== 'undefined') {
          name = file.file_name
        } else {
          name = uploadedDocumentMap[file.name]
        }
        $('form').find('input[name="file"][value="' + name + '"]').remove()
      },
      init: function() {
        this.on("maxfilesexceeded", function(file) {
          Swal.fire({
            text: "{{ __('messages.max_files') }}",
            icon: "error"
          });
        });
      }
    }
  </script>
@endpush
