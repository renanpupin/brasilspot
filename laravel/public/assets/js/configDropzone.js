
var baseUrl = "{{ url('/') }}";
var token = "{{ Session::getToken() }}";
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("div#dropzoneFileUpload1", {
    dictDefaultMessage: 'Seleciona a imagem principal.',
    url: baseUrl + "/Empresa/upload",
    params: {
        _token: token
    }
});
Dropzone.options.myAwesomeDropzone = {
    uploadMultiple: false,
    parallelUploads: 2,
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    accept: function(file, done) {

    },
};

