function comprobar_form () {

    //Comprobar todos los campos esten rellenos
    //Long nombre
    if (document.getElementById("nombre").value == "" || document.getElementById("nombre").value.length < 3) {
        document.getElementById("error1").innerHTML = " Requiere por lo menos 3 caracteres";
    } else {
        document.getElementById("error1").innerHTML = "";
    }
    //Long Pass
    if (document.getElementById("1_pas").value == "" || (document.getElementById("1_pas").value.length < 5 || document.getElementById("1_pas").value.length > 30)) {

        document.getElementById("error2").innerHTML = " Debe contener entre 5 y 30 caracteres";
    } else {
        document.getElementById("error2").innerHTML = "";
    }
    //Pass igual
    if (document.getElementById("2_pas").value == "" || (document.getElementById("1_pas").value != document.getElementById("2_pas").value)) {
        document.getElementById("error3").innerHTML = " Debe coincidir con su contraseña anterior";
    } else {
        document.getElementById("error3").innerHTML = "";
    }
    //Mayor de edad
    if (document.getElementById("age").value == "" || (document.getElementById("age").value < 18 || document.getElementById("age").value > 90)) {
        document.getElementById("error4").innerHTML = " Solo entre 18 y 90 años";
    } else {
        document.getElementById("error4").innerHTML = "";
    }


    //No contemplado si encuentra @

    if (document.getElementById("email").value == "") {

        document.getElementById("error5").innerHTML = " Introduce una direccion valida";
    }

    //Long tel
    if (document.getElementById("tel").value == "" || document.getElementById("tel").value.length != 10) {
        document.getElementById("error6").innerHTML = " Numero con 10 digitos";
    } else {
        document.getElementById("error6").innerHTML = "";
    }
    //Algo seleccionado
    if (document.getElementById("n_integrantes").selectedIndex == 0) {
        document.getElementById("error7").innerHTML = " Campo obligatorio";
    } else {
        document.getElementById("error7").innerHTML = "";
    }
    //Algo seleccionado
    if (document.getElementById("f_nac").value == "") {

        document.getElementById("error8").innerHTML = " Campo obligatorio";
    } else {
        document.getElementById("error8").innerHTML = "";
    }
    //Algo seleccionado
    if (document.getElementById("sx").selectedIndex == 0) {

        document.getElementById("error9").innerHTML = " Campo obligatorio";
    } else {
        document.getElementById("error9").innerHTML = "";
    }
}


function hola(){
    alert ("HOLA");
}


function comprobar() {

    //event.stopImmediatePropagation();
    
        if (document.getElementById("usr-name").value == "" || document.getElementById("usr-name").value.length < 3) {
            document.getElementById("error1").innerHTML = " Requiere por lo menos 3 caracteres";
            
            // Esta funcion hace que se detenga el envio del formulario a php
            event.preventDefault(); //AJAX?????

        } else {
            document.getElementById("error1").innerHTML = "";
        }


}