<?php

function ft_login () {

    $text_login = "";

    if (isset($_SESSION['id_usu'])){
        
        $text_login.= "   <div class='login'>\n";
        $text_login.= "       <p>Hola, </p>";
        $text_login.= "         <p>".$_SESSION['nom_usu']."</p>";
        $text_login.= "       <div class='dropdown-login'>\n";
        $text_login.= "           <span class='tri-login'>&#9652;</span>\n";
        $text_login.= "           <a href='../login/logout.php'><button id='btn-login'>Cerrar sesión</button></a>\n";
        $text_login.= "           <br>\n";
        $text_login.= "           <p><a id='empieza' href='../Perfil_PHP/perfil.php'>Mi perfil</a></p>\n";
        $text_login.= "           <p><a id='empieza' href='../Política_amazen/politica_amazen.php'>Atención al cliente</a></p>\n";
        $text_login.= "           <p><a id='empieza' href='../Jotas_PHP/jotas.php'>Compra Jotas</a></p>\n";
        $text_login.= "       </div>\n";
        $text_login.= "   </div>\n";
    } else {
        $text_login.= "   <div class='login'>\n";
        $text_login.= "       Hola, identifícate";
        $text_login.= "       <div class='dropdown-login'>\n";
        $text_login.= "           <span class='tri-login'>&#9652;</span>\n";
        $text_login.= "           <a href='login/login.php'><button id='btn-login'>Identificarse</button></a>\n";
        $text_login.= "           <br>\n";
        $text_login.= "           <p>¿Eres cliente nuevo?<a id='empieza' href='../registro/registro.php'> Empieza aquí</a></p>\n";
        $text_login.= "       </div>\n";
        $text_login.= "   </div>\n";
    }
    return $text_login;
}


function ft_header () {

    $text_header = "";


    $text_header.= "   <div class='div-logo'>\n";
    $text_header.= "       <img class='logo_menu' src='./img/amazon_logo_azul.png'/>\n";
    $text_header.= "   </div>\n";


    $text_header.= "   <form class='buscar' action='busqueda.php' method='POST'>\n";
    $text_header.= "       <input class='busqueda' type='text' name='busqueda' placeholder='Buscar' required>\n";
    $text_header.= "       <input class='btn-lupa-submit' type='submit' name='btn-lupa-submit' value=''>\n";

    $text_header.= "       <div class='btn-lupa'>\n";
    $text_header.= "          <i class='fas fa-search icon'></i>\n";
    $text_header.= "       </div>\n";
    $text_header.= "   </form>\n";


    $text_header.= "   <div  class='carrito'>\n";
    $text_header.= "       <img src='./img/Cesta.png'>\n";
    $text_header.= "       <div id='cart_menu_num' >59</div>\n";
    $text_header.= "   </div>\n";

    $text_header.= ft_login();

    $text_header.= "   <div class='jotas'>\n";
    $text_header.= "       Compra Jotas";
    $text_header.= "          <div class='moneda'>\n";
    $text_header.= "         <div class='cara' id='frente'><img src='./img/jota.png' id='jota'>\n";
    $text_header.= "                            </div>\n";
    $text_header.= "                            <div class='cara' id='medio1'></div>\n";
    $text_header.= "                            <div class='cara' id='medio2'></div>\n";
    $text_header.= "                            <div class='cara' id='medio3'></div>\n";
    $text_header.= "                            <div class='cara' id='medio4'></div>\n";
    $text_header.= "          <div class='cara' id='atras'><img src='./img/jota.png' id='jota'>\n";
    $text_header.= "                            </div>\n";
    $text_header.= "                        </div>\n";
    $text_header.= "   </div>\n";

    $text_header.= "       <div id='menu_header'>\n";
    $text_header.= "           <ul class='nav'>\n";
    $text_header.= "               <li id='item-cero'>\n";
    $text_header.= "                   <a href='../index.php'>Inicio</a>\n";
    $text_header.= "               </li>\n";
    $text_header.= "               <li id='item-uno'>\n";
    $text_header.= "                   <a href='#'>Mejor valorados</a>\n";
    $text_header.= "               </li>\n";
    $text_header.= "               <li id='item-dos'>\n";
    $text_header.= "                   <a href='#'>Ofertas</a>\n";
    $text_header.= "               </li>\n";
    $text_header.= "               <li id='item-tres'>\n";
    $text_header.= "                   <a href='#'>Novedades</a>\n";
    $text_header.= "               </li>\n";
    $text_header.= "               <li id='item-cuatro'>\n";
    $text_header.= "                   <a href='#'>Categorias</a>\n";
    $text_header.= "               </li>\n";
    $text_header.= "               <li id='item-cinco'>\n";
    $text_header.= "                   <a href='#'>Registro</a>\n";
    $text_header.= "               </li>\n";
    $text_header.= "               <li id='item-seis'>\n";
    $text_header.= "                   <a href='#'>Contacto</a>\n";
    $text_header.= "               </li>\n";
    $text_header.= "           </ul>\n";
    $text_header.= "       </div>\n";

    return $text_header;
}

function ft_footer () {

    $text_footer = "";

    $text_footer.= "<div class='container_footer'>\n";
    $text_footer.= "    <div class='volver-arriba'>\n";
    $text_footer.= "        <p>Volver arriba</p>\n";
    $text_footer.= "    </div>\n";

    $text_footer.= "    <div class='box_footer'>\n";
    $text_footer.= "        <h4>Conócenos</h4>\n";
    $text_footer.= "        <a href='#'>Trabajar en Amazen</a>\n";
    $text_footer.= "        <a href='#'>Sobre Amazen.es</a>\n";
    $text_footer.= "        <a href='#'>Sostenibilidad</a>\n";
    $text_footer.= "        <a href='#'>Amazen Science</a>\n";
    $text_footer.= "    </div>\n";

    $text_footer.= "    <div class='box_footer'>\n";
    $text_footer.= "        <h4>Gana dinero con nosotros</h4>\n";
    $text_footer.= "        <a href='#'>Vender en Amazen</a>\n";
    $text_footer.= "        <a href='#'>Vender en Amazen Business</a>\n";
    $text_footer.= "        <a href='#'>Vende en Amazen Handmade</a>\n";
    $text_footer.= "        <a href='#'>Vender en Amazen Launchpad</a>\n";
    $text_footer.= "        <a href='#'>Programa de afiliados</a>\n";
    $text_footer.= "        <a href='#'>Logística de Amazen</a>\n";
    $text_footer.= "        <a href='#'>Promociona tus productos</a>\n";
    $text_footer.= "        <a href='#'>Publica tu libro en Kindle</a>\n";
    $text_footer.= "        <a href='#'>Amazen Pay</a>\n";
    $text_footer.= "        <a href='#'>Alojar un Amazen Hub</a>\n";
    $text_footer.= "    </div>\n";

    $text_footer.= "    <div class='box_footer'>\n";
    $text_footer.= "        <h4>Métodos de pago Amazen</h4>\n";
    $text_footer.= "        <a href='#'>Métodos de pago</a>\n";
    $text_footer.= "        <a href='#'>Conversor de divisas de Amazen</a>\n";
    $text_footer.= "        <a href='#'>Cheques Regalo</a>\n";
    $text_footer.= "        <a href='#'>Recarga online</a>\n";
    $text_footer.= "        <a href='#'>Recarga en tienda</a>\n";
    $text_footer.= "    </div>\n";

    $text_footer.= "    <div class='box_footer'>\n";
    $text_footer.= "        <h4>¿Necesitas ayuda?</h4>\n";
    $text_footer.= "        <a href='#'>Amazen y COVID-19</a>\n";
    $text_footer.= "        <a href='#'>Localizar o gestionar compras</a>\n";
    $text_footer.= "        <a href='#'>Tarifas y políticas de envío</a>\n";
    $text_footer.= "        <a href='#'>Amazen Prime</a>\n";
    $text_footer.= "        <a href='#'>Devolver o reemplazar productos</a>\n";
    $text_footer.= "        <a href='#'>Reciclaje</a>\n";
    $text_footer.= "        <a href='#'>Gestionar contenido y dispositivos</a>\n";
    $text_footer.= "        <a href='#'>App Amazen</a>\n";
    $text_footer.= "        <a href='#'>Atención al Cliente</a>\n";
    $text_footer.= "        <a href='#'>IVA sobre los bienes</a>\n";
    $text_footer.= "        <a href='#'>Accesibilidad</a>\n";
    $text_footer.= "    </div>\n";
    $text_footer.= "</div>\n";

    $text_footer.= "<div class='box_copyright'>\n";
    $text_footer.= "    <hr>\n";
    $text_footer.= "    <div class='logo'>\n";
    $text_footer.= "        <img src='img/amazon_logo_footer.png' alt=''>\n";
    $text_footer.= "    </div>\n";
    $text_footer.= "    <div class='paises_copyrigth'>\n";
    $text_footer.= "        <ul>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>Australia</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li >\n";
    $text_footer.= "                <a href='#'>Alemania</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>Brasil</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>Canadá</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>China</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>Estados Unidos</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>Francia</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>India</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li >\n";
    $text_footer.= "                <a href='#'>Italia</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>Japón</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>México</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>Países Bajos</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>Polonia</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>Emiratos Arabes Unidos</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>Reino Unido</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>Singapur</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "            <li>\n";
    $text_footer.= "                <a href='#'>Turquía</a>\n";
    $text_footer.= "            </li>\n";
    $text_footer.= "        </ul>\n";
    $text_footer.= "    </div>\n";
    $text_footer.= "</div>\n";

    return $text_footer;

}

function ft_footer_final() {
    $footer_final = "";

    $footer_final.= "<div class='footer-final'>\n";
	$footer_final.= "	<ul>\n";
	$footer_final.= "		<li><a href='#'>Condiciones de Uso y Venta</a></li>\n";
	$footer_final.= "		<li><a href='#'>Aviso de Privacidad</a></li>\n";
	$footer_final.= "		<li><a href='#'>Área Legal</a></li>\n";
	$footer_final.= "		<li><a href='#'>Cookies</a></li>\n";
	$footer_final.= "		<li><a href='#'>Publicidad basada en intereses</a></li>\n";
	$footer_final.= "	</ul>\n";
	$footer_final.= "	<br>\n";
	$footer_final.= "	<p>© 1996-2022, Amazen.com, Inc. o sus afiliados</p>\n";
	$footer_final.= "</div>\n";

    return $footer_final;
}

?>