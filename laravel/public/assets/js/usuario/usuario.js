$(document).ready(function() {
    $('[name="perfis"]').change(function()
    {
        var selecionado = $('[name="perfis"] option:selected').html();
        if(selecionado == 'Vendedor')
        {
            $('#divPlanos').css('display','none');
            $('#divTipoVendedores').css('display','block');
            $('#divMetas').css('display','block');
        }
        else
            if(selecionado == 'Comerciante')
            {
                $('#divPlanos').css('display','block');
                $('#divTipoVendedores').css('display','none');
                $('#divMetas').css('display','none');

            }
        else
            if(selecionado == 'Administrador')
            {
                $('#divPlanos').css('display','none');
                $('#divTipoVendedores').css('display','none');
                $('#divMetas').css('display','none');

            }
        else
            {
                $('#divPlanos').css('display','none');
                $('#divTipoVendedores').css('display','none');
                $('#divMetas').css('display','none');
            }
    });

});