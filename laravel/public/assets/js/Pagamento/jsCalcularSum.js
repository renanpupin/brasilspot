$(document).ready(function() {


    totalTotal = $("#idTotal")[0];
    sum = 0;

    firstrun = $("input[type='checkbox']" )
    sum = 0;
    $('.valores1').each(function() {
        if ($($(firstrun).parent().parent().children("td")[0]).children("input")[0].checked == true) {
            sum += Number(String(this.value).replace("R$ ", "").replace(",","."))
        }
    });
    totalTotal.value = "R$ " + String(sum.toFixed(2)).replace('.',',');


    $("input[type='checkbox']" ).off("click").change( "click", function() {
        checkerbox = this;
        sum = 0;
        $('.valores1').each(function() {
            if ($($(this).parent().parent().children("td")[0]).children("input")[0].checked == true) {
                sum += Number(String(this.value).replace("R$ ", "").replace(",","."))
            }
        });
        totalTotal.value = "R$ " + String(sum.toFixed(2)).replace('.',',');
    })
});

