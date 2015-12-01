$(document).ready(function(){
    $('.btnRemove').click(function(e){
        var that = this;

        $( "#modal" ).Modal({
            "title": "Remover Filial",
            "content": "Deseja remover a filial?",
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