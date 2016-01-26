$(document).ready(function(){
   $(".btnCountChangePlus").click(function(){
       $("#qtdAssinaturas").val(parseInt($("#qtdAssinaturas").val())+1);
       var valorTotal = (parseInt($("#qtdAssinaturas").val())*24.90).toFixed(2);
       valorTotal = String(valorTotal).replace(".", ",");
      $("#total").val("R$ "+valorTotal);
   });
    $(".btnCountChangeMinus").click(function(){
        if(parseInt($("#qtdAssinaturas").val()) > 0){
            $("#qtdAssinaturas").val(parseInt($("#qtdAssinaturas").val())-1);
        }
        var valorTotal = (parseInt($("#qtdAssinaturas").val())*24.90).toFixed(2);
        valorTotal = String(valorTotal).replace(".", ",");
        $("#total").val("R$ "+valorTotal);
    });
});