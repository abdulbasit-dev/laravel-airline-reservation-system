let uploadedDocumentMap = {};
Dropzone.options.myDropzone = {
  url: $('#storeTempFile').text(),
  maxFilesize: 10, // MB
  uploadMultiple: false,
  maxFiles: 1,
  addRemoveLinks: true,
  acceptedFiles: '.jpeg,.jpg,.png',
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
  },
  success: function (file, response) {
    $('#upload').append('<input type="hidden" name="file" value="' + response.name + '">');
    uploadedDocumentMap[file.name] = response.name;
  },
  removedfile: function (file) {
    file.previewElement.remove();
    var name = '';
    if (typeof file.file_name !== 'undefined') {
      name = file.file_name;
    } else {
      name = uploadedDocumentMap[file.name];
    }
    //send ajax request to delete file
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
      },
      type: 'POST',
      url: $('#deleteTempFile').text(),
      data: {
        fileName: name,
      },
      success: function (data) {},
      error: function (e) {
        console.log(e);
      },
    });
    $('#upload')
      .find('input[name="file"][value="' + name + '"]')
      .remove();
  },
  init: function () {
    this.on('maxfilesexceeded', function (file) {
      Swal.fire({
        text: $('#maxFileMessage').text(),
        icon: 'error',
      });
    });
  },
};
