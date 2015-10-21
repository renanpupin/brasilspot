$(document).ready(function(){
    $('.btnRemove').click(function(e){
        function submitForm(){
            $('form').submit();
        }

        $( "#modal" ).Modal({
            "title": "Remover Categoria",
            "content": "Deseja remover a categoria?",
            "size": "small",
            "onConfirm": submitForm,
            "closeButtonText": "CANCELAR",
            "confirmButtonText": "REMOVER"
        });
        e.preventDefault();
    });
});