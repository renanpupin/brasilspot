// Ripple-effect animation
(function($) {
    "use strict";
    $(".ripple").click(function(e){
        var rippler = $(this);

        // create .wave element if it doesn't exist
        if(rippler.find(".wave").length == 0) {
            rippler.append("<span class='wave'></span>");
        }

        var wave = rippler.find(".wave");

        // prevent quick double clicks
        wave.removeClass("animate");

        // set .wave diametr
        if(!wave.height() && !wave.width())
        {
            var d = Math.max(rippler.outerWidth(), rippler.outerHeight());
            wave.css({height: d, width: d});
        }

        // get click coordinates
        var x = e.pageX - rippler.offset().left - wave.width()/2;
        var y = e.pageY - rippler.offset().top - wave.height()/2;

        // set .wave position and add class .animate
        wave.css({
            top: y+'px',
            left:x+'px'
        }).addClass("animate");
    });

})(jQuery, undefined);


(function($) {
    "use strict";

    //script para verificar se o gotop aparece
    //code here

    //init dropdown
    if($("#sideMenu").length != 0){
        $("#sideMenu").dropdown();
    }

    //init alert globally
    $(".close-alert").click(function(e){
        $(this).parent().remove();
        e.preventDefault();
    });


})(jQuery, undefined);


(function($) {
    "use strict";

    if($(".navSite").length != 0) {
        var $navbar = $(".navSite"),
            y_pos = $navbar.offset().top,
            height = $navbar.height();

        $(".menu").click(function () {
            $("#nav").toggleClass("open");
        });
    }

    if($("#inputFiltrarEstado").length != 0){
        var estados = [
            { value: 'Acre', data: 'AC' },
            { value: 'Alagoas', data: 'AL' },
            { value: 'Amapá', data: 'AP' },
            { value: 'Amazonas', data: 'AM' },
            { value: 'Bahia', data: 'BA' },
            { value: 'Ceará', data: 'CE' },
            { value: 'Distrito Federal', data: 'DF' },
            { value: 'Espirito Santo', data: 'ES' },
            { value: 'Goiás', data: 'GO'},
            { value: 'Maranhão', data: 'MA'},
            { value: 'Mato Grosso do Sul', data: 'MS'},
            { value: 'Mato Grosso', data: 'MT'},
            { value: 'Minas Gerais', data: 'MG'},
            { value: 'Pará', data: 'PA'},
            { value: 'Paraíba', data: 'PB'},
            { value: 'Paraná', data: 'PR'},
            { value: 'Pernambuco', data: 'PE'},
            { value: 'Piauí', data: 'PI'},
            { value: 'Rio de Janeiro', data: 'RJ'},
            { value: 'Rio Grande do Norte', data: 'RN'},
            { value: 'Rio Grande do Sul', data: 'RS'},
            { value: 'Rondônia', data: 'RO'},
            { value: 'Roraima', data: 'RR'},
            { value: 'Santa Catarina', data: 'SC'},
            { value: 'São Paulo', data: 'SP'},
            { value: 'Sergipe', data: 'SE'},
            { value: 'Tocantins', data: 'TO'}
        ];
        $("#inputFiltrarEstado").autocomplete({
            lookup: estados,
            onSelect: function (suggestion) {
                alert('Selecionado: ' + suggestion.value + ', ' + suggestion.data);
            }
        });
    };

    if($("#pesquisaEmpresa").length != 0){

        $('#pesquisaEmpresa').autocomplete({
            serviceUrl: 'Empresas/pesquisarEmpresa',
            onSelect: function (suggestion) {
                alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
            },
            transformResult: function(response) {
                response = JSON.parse(response);
                return {

                    suggestions: $.map(response, function(dataItem) {
                        //return { value: (dataItem.nome != undefined ? dataItem.nome : dataItem.nomeFantasia), data: dataItem.id };
                        return { value: dataItem.nomeFantasia, data: dataItem.id };
                    })
                };
            }
        });
    };

    if($("#pesquisaEndereco").length != 0){
        $('#pesquisaEndereco').autocomplete({
            serviceUrl: 'Empresas/pesquisarEndereco',
            onSelect: function (suggestion) {
                alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
            },
            transformResult: function(response) {
                response = JSON.parse(response);
                return {
                    suggestions: $.map(response, function(dataItem) {
                        return { value: dataItem.endereco + ", " + dataItem.cidade + " - " + dataItem.estado, data: dataItem.id };
                    })
                };
            }
        });
        //on submit we can get the value by
        //$('#pesquisaEmpresa').autocomplete().selection.data
        //if($('#pesquisaEmpresa').autocomplete().selection.data !== null){}
    };

    if (typeof(lightbox) !== 'undefined'){
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'showImageNumberLabel': true,
            'albumLabel': 'Imagem %1 de %2',
        });
    }


})(jQuery, undefined);