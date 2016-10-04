$(document).ready(function() {

    PagarMe.encryption_key = "ek_test_NYt8FZ0GhouXCPz6t1WfR4wKAwdfAt";

    $("#card_form_submit").click(function(e){
        e.preventDefault();

        var form = $("#payment_form");

        var creditCard = new PagarMe.creditCard();
        creditCard.cardHolderName = $("#payment_form #card_holder_name").val();
        creditCard.cardExpirationMonth = $("#payment_form #card_expiration_month").val();
        creditCard.cardExpirationYear = $("#payment_form #card_expiration_year").val();
        creditCard.cardNumber = $("#payment_form #card_number").val();
        creditCard.cardCVV = $("#payment_form #card_cvv").val();

        // pega os erros de validação nos campos do form
        var fieldErrors = creditCard.fieldErrors();

        var hasErrors = false;
        for (var field in fieldErrors) {
            hasErrors = true;
            break;
        }

        if (hasErrors) {
            // realiza o tratamento de errors
            for (var field in fieldErrors) {
                alert(fieldErrors[field]);
            }
        } else {
            // se não há erros, gera o card_hash...
            creditCard.generateHash(function (cardHash) {
                $("#card_hash").val(cardHash);
                form.append($('<input type="hidden" name="card_hash">').val(cardHash));
                form.submit();
            });
        }
        return false;
    });
});