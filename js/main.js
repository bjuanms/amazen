$(document).ready(function(){


    //Esta funcion hace que se oscurezca el fondo cuando pasamos el mouse encima de el campon login
    $(".login").mouseenter(function(){
        $("body").css({"background": "rgba(0, 0, 0, 0.4)", "transition": "0.3s"})
        $(".categorias").css({"opacity": "0.6", "transition": "0.3s"})
    });


    //Esta funcion hace que se restablezca el fondo cuando retiramos el mouse encima de el campon login
    $(".login").mouseleave(function(){
        $("body").css({"background": "white"})
        $(".categorias").css({"opacity": "1"})
    });


    //Funcion para el bnt-login y que se oscurezca el fondo al hacer mousedown
    $("#btn-login").mousedown(function(){
        $("#btn-login").css({"background": "#eeba37"})
    });

    $("#btn-login").mouseup(function()
    {
        $("#btn-login").css({"background": "rgb(242,221,172)"})
        $("#btn-login").css({"background": "linear-gradient(180deg, rgba(242,221,172,1) 0%, rgba(237,182,43,1) 97%, rgba(237,181,40,1) 100%)"})
    });

    $("#btn-login").mouseenter(function()
    {
        $("#btn-login").css({"background": "rgb(242,221,172)"})
        $("#btn-login").css({"background": "linear-gradient(180deg, rgba(242,221,172,1) 0%, rgba(237,182,43,1) 97%, rgba(237,181,40,1) 100%)"})
    });

    $("#btn-login").mouseleave(function()
    {
        $("#btn-login").css({"background": "rgb(240,194,80)"})
        $("#btn-login").css({"background": "linear-gradient(0deg, rgba(240,194,80,1) 0%, rgba(247,221,157,1) 100%)"})
    });


    //Funcion para que se oscurezca el fondo cuando nos situamos en el campo de busqueda
    $("#input-busqueda").focus(function(){
        $("body").css({"background": "rgba(0, 0, 0, 0.4)", "transition": "0.3s"})
        $(".categorias").css({"opacity": "0.6", "transition": "0.3s"})
    });

    $("#input-busqueda").blur(function(){
        $("body").css({"background": "white"})
        $(".categorias").css({"opacity": "1"})
    });

    //Funcion que añade borde al boton de buscar cuando clicamos
    $(".btn").mousedown(function(){
        $(".btn").css({"border": "solid 2px #ff8c0d"})
    });

    $(".btn").mouseup(function()
    {
        $(".btn").css({"border": "none"})
    });

    //Esta funcion hace que podamos volver a arriba con el boton del footer
    $(".volver-arriba").click(function()
    {
		$("body, html").animate({scrollTop: '0px'}, 0);
	});


    // Otra funcion

    $(".btn-lupa-submit").mouseenter(function(){
        $(".btn-lupa-submit").css({"opacity":"0.9"})
       
    });

    $(".btn-lupa-submit").mouseleave(function(){
        $(".btn-lupa-submit").css({"opacity":"0"})
    });




});