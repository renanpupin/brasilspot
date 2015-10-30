$(document).ready(function(){
    $('.btnRemove').click(function(e){
        var that = this;

        $( "#modal" ).Modal({
            "title": "Remover Serviço",
            "content": "Deseja remover o serviço?",
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