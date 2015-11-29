/**
 * Created by Tensai on 28/11/2015.
 */

$(document).ready(function() { // quando o jQuery estiver carregado...
    PagarMe.encryption_key = "ek_test_lGkZJusx1QV5n9lOVayKznXyjbnqhg";
    var button = $("#card_form_submit")[0];

    var form = $("#payment_form");
    button.onclick = function() { // quando o form for enviado...
        // inicializa um objeto de cartão de crédito e completa
        // com os dados do form
        var creditCard = new PagarMe.creditCard();
        creditCard.cardHolderName = $("#payment_form #card_holder_name").val();
        creditCard.cardExpirationMonth = $("#payment_form #card_expiration_month").val();
        creditCard.cardExpirationYear = $("#payment_form #card_expiration_year").val();
        creditCard.cardNumber = $("#payment_form #card_number").val();
        creditCard.cardCVV = $("#payment_form #card_cvv").val();

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
                alert('submit');
                form.get(0).submit();
            });
        }
        return false;
    };
});