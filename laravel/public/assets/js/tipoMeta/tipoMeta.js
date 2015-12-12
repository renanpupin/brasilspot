$(document).ready(function(){
    $('.btnRemove').click(function(e){
        var that = this;

        $( "#modal" ).Modal({
            "title": "Remover Tipo de Meta",
            "content": "Deseja remover o tipo da meta?",
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