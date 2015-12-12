$(document).ready(function(){
    $('.btnRemove').click(function(e){
        var that = this;

        $( "#modal" ).Modal({
            "title": "Remover Meta",
            "content": "Deseja remover a meta?",
            "size": "small",
            "closeButtonText": "CANCELAR",
            "confirmButtonText": "REMOVER"
        });

        $("#modal").on("confirm", function(){
            $(that).parent('form').submit();
        });
        e.preventDefault();
    });
});