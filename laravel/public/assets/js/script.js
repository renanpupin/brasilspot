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