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

    <script src="https://www.paypal.com/sdk/js?client-id=AUbRspe-Kqq08PQeYFKPO7E48hPutlC6w-UcfE4FgWku5Gff61SRIhs7yonybtizZg-p5WNvHkxbXIfh&currency=EUR"></script>

    <link class="icono" rel="shortcut icon" href="img/icon_amazen.png">
    <!-- Este link introduce la url de la fuente de amazon-->
    <link href="http://fonts.cdnfonts.com/css/amazon-ember" rel="stylesheet">
    <!-- Esta linea introduce el icono lupa de la barra de busqueda -->
    <script src="https://kit.fontawesome.com/712575d4a5.js" crossorigin="anonymous"></script>
    <!-- Esta linea introduce el icono redes sociales del footer -->
    <script src="https://kit.fontawesome.com/e1e79a1c29.js" crossorigin="anonymous"></script>


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
    $id_usu = $_SESSION['id_usu'];
    $nombre= $_REQUEST['nombre'];
    $apellidos= $_REQUEST['apellidos'];

    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellidos'] = $apellidos;

    $numero_jotas = $_REQUEST['numero_jotas_compra'];
    $_SESSION['numero_jotas'] = $numero_jotas;

    
    $resultado = $numero_jotas / 1000;
    $resultado = round($resultado, 2);

    //$resultado
    
  

echo "<div id='usuario'> ";                
        echo "<p > ";        
        echo "<table id='perfil_cliente'> ";            
        echo " <td>";                
            echo " <img src='../img/foto_perfil.jpg' id='foto_perfil'> ";                   
        echo " </td> ";               
        echo " <td> ";                
            echo " <span id='nombre_perfil_cliente'>$nombre $apellidos.</span>";                    
        echo " </td>";                              
        echo " </table>";            
        echo " </p>";        
echo "</div> ";    



echo "<div id='formulario_opinion'> ";    
        echo "<p id='seguro'>$nombre, vas a comprar <b>$numero_jotas</b> <span id='letra_jotas'>JotasⓇ</span>
        Por un precio de <b id='amarillo'>$resultado €</b><br><br>";
        echo "Continua con el pago a través de <span id='letra_jotas'>Paypal</span> con cualquiera de estas
        <b>3</b> opciones: </p><br><br>";

        /*---------------BOTONES DE PAYPAL--------------------*/
        echo "<div id='paypal-button-container'></div>
        <script>
            paypal.Buttons({
                style:{
                    color: 'blue',
                    shape: 'pill',
                    
                   },
                   createOrder: function(data, actions){
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: $resultado
                            }
                        }]
                    });
                },
                onApprove: function(data, actions){
                    actions.order.capture().then(function (detalles){
                        window.location.href='completado.php'
                    });
                },    
                onCancel: function(data) {
                    alert('Pago cancelado')
                }
                }).render('#paypal-button-container');
            </script>";
            
        echo "<br><br><input type='button' value='Cancelar' id='cancelar' onclick='history.go(-1);'>";



    echo "<div class='formulario-compra'>";  

    /*--------MONEDA JOTA GIRATORIA------------*/

    echo "<div class='moneda1'>
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