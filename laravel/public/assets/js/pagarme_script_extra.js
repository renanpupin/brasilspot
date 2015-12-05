/**
 * Created by Tensai on 28/11/2015.
 */
$(document).ready(function() {
    PagarMe.encryption_key = "ek_test_lGkZJusx1QV5n9lOVayKznXyjbnqhg";
    var button = $("#card_form_submit")[0];
    var form = $("#payment_form");
    var divEntraSaiCartao = $("div.dadosCartaoShowHide");
    var toggleValidationCard = true;

    $("#boletoBoleto").each(function () {
        this.onclick =  function() {
            divEntraSaiCartao.hide();
            $("div.dadosCartaoShowHide :input").attr("disabled", true);
            $("div.dadosCartaoShowHide :input").attr("required", false);
            toggleValidationCard = false;
            alert(toggleValidationCard);

        }
    });

    $("input.cartaoRequerido").each(function () {
        this.onclick =  function() {
            divEntraSaiCartao.show();
            $("div.dadosCartaoShowHide :input").attr("disabled", false);
            $("div.dadosCartaoShowHide :input").attr("required", true);
            toggleValidationCard = true;
            alert(toggleValidationCard);
        };
    });


    button.onclick = function() { // quando o form for enviado...
        alert(toggleValidationCard);

        if(toggleValidationCard) {

            var creditCard = new PagarMe.creditCard();
            creditCard.cardHolderName = $("#payment_form #card_holder_name").val();
            creditCard.cardExpirationMonth = $("#payment_form #card_expiration_month").val();
            creditCard.cardExpirationYear = $("#payment_form #card_expiration_year").val();
            creditCard.cardNumber = $("#payment_form #card_number").val();
            creditCard.cardCVV = $("#payment_form #card_cvv").val();

            //remover name para não fazer submit dos dados do cartão
            $(".removeName").removeAttr("name");


            // pega os erros de validação nos campos do form
            var fieldErrors = creditCard.fieldErrors();

            //Verifica se há erros
            var hasErrors = false;
            for(var field in fieldErrors) {
                hasErrors = true; break;
            }

            if(hasErrors) {
                // realiza o tratamento de errors
                for (var field in fieldErrors) {
                    alert(fieldErrors[field]);
                }
            } else {
                // se não há erros, gera o card_hash...
                creditCard.generateHash(function(cardHash) {
                    // ...coloca-o no form...
                    form.append($('<input type="hidden" name="card_hash">').val(cardHash));
                    // e envia o form
                    form.get(0).submit();
                });
            }
            return false;
        }
        else {
            return true;
        }
    };
});