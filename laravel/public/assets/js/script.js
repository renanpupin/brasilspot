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

    //if($("#inputFiltrarEstado").length != 0){
    //    var estados = [
    //        { value: 'Acre', data: 'AC' },
    //        { value: 'Alagoas', data: 'AL' },
    //        { value: 'Amapá', data: 'AP' },
    //        { value: 'Amazonas', data: 'AM' },
    //        { value: 'Bahia', data: 'BA' },
    //        { value: 'Ceará', data: 'CE' },
    //        { value: 'Distrito Federal', data: 'DF' },
    //        { value: 'Espirito Santo', data: 'ES' },
    //        { value: 'Goiás', data: 'GO'},
    //        { value: 'Maranhão', data: 'MA'},
    //        { value: 'Mato Grosso do Sul', data: 'MS'},
    //        { value: 'Mato Grosso', data: 'MT'},
    //        { value: 'Minas Gerais', data: 'MG'},
    //        { value: 'Pará', data: 'PA'},
    //        { value: 'Paraíba', data: 'PB'},
    //        { value: 'Paraná', data: 'PR'},
    //        { value: 'Pernambuco', data: 'PE'},
    //        { value: 'Piauí', data: 'PI'},
    //        { value: 'Rio de Janeiro', data: 'RJ'},
    //        { value: 'Rio Grande do Norte', data: 'RN'},
    //        { value: 'Rio Grande do Sul', data: 'RS'},
    //        { value: 'Rondônia', data: 'RO'},
    //        { value: 'Roraima', data: 'RR'},
    //        { value: 'Santa Catarina', data: 'SC'},
    //        { value: 'São Paulo', data: 'SP'},
    //        { value: 'Sergipe', data: 'SE'},
    //        { value: 'Tocantins', data: 'TO'}
    //    ];
    //    $("#inputFiltrarEstado").autocomplete({
    //        lookup: estados,
    //        onSelect: function (suggestion) {
    //            alert('Selecionado: ' + suggestion.value + ', ' + suggestion.data);
    //        }
    //    });
    //};

    if($("#pesquisaEmpresa").length != 0){

        $('#pesquisaEmpresa').autocomplete({
            serviceUrl: 'Empresas/pesquisarEmpresa',
            onSelect: function (suggestion) {
                alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
            },
            transformResult: function(response) {
                console.log(response);
                response = JSON.parse(response);

                /*if(response[0].hasOwnProperty("nomeFantasia")){

                }*/

                return {
                    suggestions: $.map(response, function(dataItem) {
                        return { value: (dataItem.nomeFantasia != undefined ? dataItem.nomeFantasia : dataItem.nome), data: dataItem.id };
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
                console.log(response);
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




(function ($) {
    jQuery.expr[':'].Contains = function (elem, i, m) {
        return (elem.textContent || elem.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
    };

    function listFilter(input, list) {
        $(input).change(function () {
            var filter = $(this).val();
            if (filter) {
                $(list).find("li:not(:Contains(" + filter + "))").hide();
                $(list).find("li:Contains(" + filter + ")").show();
            } else {
                $(list).find("li").show();
            }
            return false;
        }).keyup(function () {
            $(this).change();
        });
    }

    //ready
    $(function () {
        if($("#inputFiltrarEstado").length != 0){
            listFilter("#inputFiltrarEstado", "#listaEstados");
        }

        if($("#inputFiltrarServicos").length != 0){
            listFilter("#inputFiltrarServicos", "#listaServicos");
        }


        function parseQueryString() {

            var str = window.location.search;
            var objURL = {};

            str.replace(
                new RegExp( "([^?=&]+)(=([^&]*))?", "g" ),
                function( $0, $1, $2, $3 ){
                    objURL[ $1 ] = $3;
                }
            );
            return objURL;
        };


        $('input[name="servicos[]"]').on('change', function (e) {

            e.preventDefault();

            var params = parseQueryString();

            if($('input[name="servicos[]"]:checked').length != 0){
                var servicos = "com=";

                $('input[name="servicos[]"]:checked').each(function(index, item)
                {
                    console.log(index,item);
                    servicos+= $(item).val()+",";
                });

                servicos = servicos.replace(/,\s*$/, "");
                //console.log(servicos);



                console.log("tem checkado");

                var url = window.location.pathname+"?"+(params["local"] != undefined ? "local="+params["local"]+"&" : "")+(params["tipo"] != undefined ? "tipo="+params["tipo"]+"&" : "")+(params["pesquisaEmpresa"] != undefined ? "pesquisaEmpresa="+params["pesquisaEmpresa"]+"&" : "")+(params["pesquisaEndereco"] != undefined ? "pesquisaEndereco="+params["pesquisaEndereco"]+"&" : "")+servicos;

            }else{

                console.log("nem tem checkado");

                var url = window.location.pathname+"?"+(params["local"] != undefined ? "local="+params["local"]+"&" : "")+(params["tipo"] != undefined ? "tipo="+params["tipo"]+"&" : "")(params["pesquisaEmpresa"] != undefined ? "pesquisaEmpresa="+params["pesquisaEmpresa"]+"&" : "")+(params["pesquisaEndereco"] != undefined ? "pesquisaEndereco="+params["pesquisaEndereco"]+"&" : "");
            }

            url = url.replace(/&\s*$/, "");

            console.log(url);
            window.location.href = url;
        });

    });
}(jQuery));