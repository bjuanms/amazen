$(function(){

  // Cambia color fondo
  //  $("p").css({"background-color": "red"});

  //$("#segundo").css({"background-color": "red"});
  //$(".primero").css({"background-color": "blue"});

  //eventos click

  //$("button").click(function(){
  //  alert("Hola");
  //});

  $("#btn-hide").click(function(){
    $("#segundo").hide();
  });

  $("#btn-show").click(function(){
    $("#segundo").show();
  });

  //Eventos mouse
  //Fade hace que sea de manera gradual
  
  $(".primero").mouseenter(function(){
    //$("#segundo").fadeOut();
    $("#segundo").slideUp();
  });

  $(".primero").mouseleave(function(){
   // $("#segundo").fadeIn();
    $("#segundo").slideDown();
  });

  //Vamos a seleccionar el contenido o el elemento completo del documento html
  $("#btn-element").click(function(){
    //Coge el texto de este elemento 
    //alert($("#segundo").text());
    //Coge el html de este elemento 
    alert($("#segundo").html());

    //Coger el atributo de un elemento html
    alert($("#segundo").attr("id"));
    alert($("#segundo").attr("title"));

    //Funciones varias 
  // .removeClass("...");
  // .addClass("...");
  // Tipico boton de on y off
  // .toggleClass("...");
  // .empty();
  // .$(selector).remove();
  });

  $("#btn-bg").click(function(){
    $("body").css({"background":"red"});
  });



});