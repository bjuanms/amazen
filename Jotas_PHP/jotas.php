<?php
	session_start();

	if (isset($_SESSION['id_usu'])) {
		$id_usu = $_SESSION['id_usu'];
		$nom_usu = $_SESSION['nom_usu'];
		$jota =  $_SESSION['jotas'];
	}

    require ("php/funciones_principales.php");
	require ("php/funciones.php");
?>

<!doctype html> 
<html lang=es>
<head>
    <meta charset='utf-8'>

    <link class="icono" rel="shortcut icon" href="img/icon_amazen.png">
    <!-- Este link introduce la url de la fuente de amazon-->
    <link href="http://fonts.cdnfonts.com/css/amazon-ember" rel="stylesheet">
    <!-- Esta linea introduce el icono lupa de la barra de busqueda -->
    <script src="https://kit.fontawesome.com/712575d4a5.js" crossorigin="anonymous"></script>
    <!-- Esta linea introduce el icono redes sociales del footer -->
    <script src="https://kit.fontawesome.com/e1e79a1c29.js" crossorigin="anonymous"></script>

    <link rel='stylesheet' href='./css/perfil.css' type='text/css' />
    <link rel='stylesheet' href='./css/jotas.css' type="text/css" />
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/footer.css">


    <link href='http://fonts.cdnfonts.com/css/amazon-ember' rel='stylesheet'>

    <!-- Esta linea introduce la libreria jQuery para poder ser utilizada -->
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <title>Amazen</title> 

</head>
<header>
    <?php 
        echo ft_header();
    ?>
</header> 

<body>
<?php
 
        //conectar con el server de bdd
        $conexion = mysqli_connect("localhost","root","rootroot") or die ("No se puede establecer conexión");

        mysqli_select_db($conexion,"amazen") or die ("no se puede seleccionar la base de datos");

        $query1="select nombre, apellidos, jotas from usuario where id_usuario ='$id_usu'";  
        //echo $query."<br>"; //para comprobar errores
        $consulta1 = mysqli_query($conexion,$query1) or die ("fallo en la consulta 1");
        //mostrar resultados
        $n_filas1 = mysqli_num_rows($consulta1);

        if ($n_filas1 <> 1) {
            echo "No existe ese usuario";
        }
        else { 

            $resultado1 = mysqli_fetch_array($consulta1);
            //echo "usuario correcto";
            $nombre = $resultado1['nombre'];
            $apellidos = $resultado1['apellidos'];
            // $jotas = $resultado1['jotas'];
            // $_SESSION['jotas_actu'] = $jotas;

        echo "<div id='usuario'> ";                
        echo "  <p>";        
        echo "      <table id='perfil_cliente'> ";            
        echo "      <td>";                
        echo "          <img src='../img/foto_perfil.jpg' id='foto_perfil'> ";                   
        echo "      </td> ";               
        echo "      <td>";                
        echo "          <span id='nombre_perfil_cliente'>$nombre $apellidos .</span>";                    
        echo "      </td>";                              
        echo "      </table>";            
        echo "  </p>";        
        echo "</div> ";    
         
        echo "<span id='jotas_dcha'><img src=./jota.png id='jota_peque'><b id='bjota'>$jota</b></span>"; 
echo "<div id='formulario_opinion'>";               
        echo "  <p id='titulo_jotas'><b>JOTA</b><span id='peque'>Ⓡ</span></p> ";             
        echo "  <p> Bienvenido al universo de nuestra Cryptomoneda <span id='letra_jotas'>JOTAⓇ</span>. <br><br>
                <span id='letra_jotas'>Jota</span> es una criptomoneda que hemos diseñado en Amazen para facilitar las compras, poder incrementar el poder adquisitivo de nuestros clientes y luchar contra la inflación de las monedas convencionales, en nuestro caso, el Euro.
                <br><br>
                <span id='letra_jotas'>Jota</span> sirve para adquirir productos y servicios como cualquier otra moneda. Está registrada en la cadena de bloques de AMAZEN entrerprises y es descentralizada, por lo que ninguna entidad puede interferir en su valor. ¡Compre <span id='letra_jotas'>JOTA</span> hoy!
                </p>";


       echo"<br><br>";
       
       echo " <!-- TradingView Widget BEGIN -->
            <div class='tradingview-widget-container'>
                <div id='tradingview_6636e'></div>
                <div class='tradingview-widget-copyright'><a href='https://es.tradingview.com/symbols/ECONOMICS-JOTA/' rel='noopener' target='_blank'><span class='blue-text'>Gráfico de JOTA</span></a> por TradingView</div>
                    <script type='text/javascript' src='https://s3.tradingview.com/tv.js'></script>
                    <script type='text/javascript'>
                    new TradingView.widget(
                    {
                    'autosize': true,
                    'symbol': 'ECONOMICS:JOTA',
                    'interval': 'D',
                    'timezone': 'Etc/UTC',
                    'theme': 'dark',
                    'style': '1',
                    'locale': 'es',
                    'toolbar_bg': '#f1f3f6',
                    'enable_publishing': false,
                    'hide_top_toolbar': true,
                    'hide_legend': true,
                    'save_image': false,
                    'container_id': 'tradingview_6636e'
                }
                    );
                    </script>
            </div>
            <!-- TradingView Widget END -->";

        echo " <br>";
        echo " <br>";

        echo "
       
                El cambio actual de la <span id='letra_jotas'>JotaⓇ</span> al EURO € es el siguiente:
                <br><br><br>
                <span id='cambio_actu'>
                <b id='amarillo'>1€</b> = 1000 <span id='letra_jotas'>JotasⓇ</span></span> ";
        
        echo"<br><br><br><br>";

    echo "<div class='formulario-compra'>";

            echo "<form action ='comprar_jotas.php' method='post'>
                    <fieldset id='fieldset'>
                        <p id='saldo_actu'>$nombre, tu saldo actual es de <b>$jota</b> <span id='letra_jotas'>JotasⓇ</span></p>
                        <br>
                        Aquí puedes obtener más:
                        <br><br><br>
                        Indique el número de <span id='letra_jotas'>JotasⓇ</span> que quiere comprar:<br> 
                        (Min 100 Max 1000)
                        <br><br>
                        <input type='number' name='numero_jotas_compra' min='100' max='1000' required>
                        <input type='hidden' name='nombre' value='".$nombre."'>
                        <input type='hidden' name='apellidos' value='".$apellidos."'>
                        <br>
                        <input type='submit' name='pagar' value='Pagar ahora con Paypal' id='enviar'>
                    </fieldset>";
                    
            echo "</form>";  
                



            /*--------MONEDA JOTA GIRATORIA------------*/
            echo "<div class='moneda-'>
                <div class='cara' id='frente-'><img src=./jota.png id='jota-'></div>
                <div class='cara' id='medio1-'></div>
                <div class='cara' id='medio2-'></div>
                <div class='cara' id='medio3-'></div>
                <div class='cara' id='medio4-'></div>
                <div class='cara' id='medio5-'></div>
                <div class='cara' id='medio6-'></div>
                <div class='cara' id='atras-'><img src=./jota.png id='jota-'></div>  
            </div>";
            echo "</div>";

    echo "</div>";


}
        
?>


<footer>
    <?php
        echo ft_footer();
    ?>
</footer>
    <?php
        echo ft_footer_final();
    ?>

</body>
    <!-- En esta línea referenciamos el archivo js donde implementamos jQuery -->
    <script src="../js/main.js"></script>
</html>