var baseUrl = $("#hiddenBaseUrl").val();
var token = $("#hiddenToken").val();
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("div#dropzoneFileUpload1", {
    dictDefaultMessage: 'Selecione as imagens.',
    dictCancelUpload: "Cancelar upload",
    dictCancelUploadConfirmation: "Você tem certeza que deseja cancelar o upload?",
    dictRemoveFile: "Remover Arquivo",
    dictMaxFilesExceeded: "Você não pode carregar mais arquivos.",
    dictFileTooBig: "O tamanho do arquivo é muito grande ({{filesize}}MiB). O tamanho máximo é de: {{maxFilesize}}MiB.",
    dictInvalidFileType: "Você não pode carregar arquivos deste tipo.",
    url: baseUrl + "/Empresa/uploadFiles",
    maxFilesize: 2, // MB
    maxFiles: 5,
    params: {
        _token: token
    },
    addRemoveLinks: true,
    removedfile: function(file) {
        var name = file.name;
        /*$.ajax({
         type: 'POST',
         url: 'delete.php',
         data: "id="+name,
         dataType: 'html'
         });*/
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }
});
Dropzone.options.myAwesomeDropzone = {
    uploadMultiple: false,
    parallelUploads: 2,
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    maxFiles: 5,
    addRemoveLinks: true,
    accept: function(file, done) {

    },
};

