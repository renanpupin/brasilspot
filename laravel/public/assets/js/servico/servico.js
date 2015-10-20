$(document).ready(function(){
    $('.btnRemove').click(function(e){
        function submitForm(){
            $('form').submit();
        }

        $( "#modal" ).Modal({
            "title": "Remover Serviço",
            "content": "Deseja remover o serviço?",
            "size": "small",
            "onConfirm": submitForm,
            "closeButtonText": "CANCELAR",
            "confirmButtonText": "REMOVER"
        });
        e.preventDefault();
    });
});