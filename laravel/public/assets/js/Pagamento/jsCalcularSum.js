$(document).ready(function() {

    sum = 0;
    $('.valores1').each(function() {
        sum += Number(String(this.value).replace("R$ ", "").replace(",","."))
    });

    totalTotal = $("#idTotal")[0];
    totalTotal.value = "R$ " + String(sum).replace('.',',');

    $("input[type='checkbox']" ).change( "click", function() {
        sum = 0;
        $('.valores1').each(function() {
            if ($($(this).parent().parent().children("td")[0]).children("input")[0].checked == true) {
                sum += Number(String(this.value).replace("R$ ", "").replace(",","."))
            }
        });
        totalTotal.value = "R$ " + String(sum).replace('.',',');
    })
});