$(document).ready(function(){

// Las siguientes 4 funciones sirven para dar estilo al boton amarillo en funcion de los eventos del cursor

    $(".btn-log").mousedown(function(){
        $(".btn-log").css({"background": "#eeba37"})
    });

    $(".btn-log").mouseup(function(){
        $(".btn-log").css({"background": "rgb(242,221,172)"})
        $(".btn-log").css({"background": "linear-gradient(180deg, rgba(242,221,172,1) 0%, rgba(237,182,43,1) 97%, rgba(237,181,40,1) 100%)"})
    });

    $(".btn-log").mouseenter(function()
    {
        $(".btn-log").css({"background": "rgb(242,221,172)"})
        $(".btn-log").css({"background": "linear-gradient(180deg, rgba(242,221,172,1) 0%, rgba(237,182,43,1) 97%, rgba(237,181,40,1) 100%)"})
    });

    $(".btn-log").mouseleave(function()
    {
        $(".btn-log").css({"background": "rgb(240,194,80)"})
        $(".btn-log").css({"background": "linear-gradient(0deg, rgba(240,194,80,1) 0%, rgba(247,221,157,1) 100%)"})
    });


//Esta funcion en principio me iba a ayudar a que el div de abajo ocupara el resto de espacio de la pantalla, pero no ha funcionado

    var height = $(window).height();
    height = height - ($(".arriba").height()) - 80;
    $(".abajo").height(height);

    $(window).resize(function()
    {
        var height = $(window).height();
        height = height - ($(".arriba").height())  - 70; 
        $(".abajo").height(height);
    });





    
});





