<?php
	session_start();



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
    $id_usuario = $_SESSION['id_usu'];
    $nuevas_jotas = $_SESSION['numero_jotas'];

    $nombre = $_SESSION['nombre'];
    $apellidos = $_SESSION['apellidos'];
    $jotas_actu = $_SESSION['jotas'];


    $conexion = mysqli_connect("localhost","root","rootroot") or die ("No se puede establecer conexión");
    mysqli_select_db($conexion,"amazen") or die ("no se puede seleccionar la base de datos");
    $query1="UPDATE `usuario` SET `jotas` = $jotas_actu + $nuevas_jotas WHERE `usuario`.`id_usuario` = $id_usuario;";  
    //echo $query."<br>"; //para comprobar errores
    $consulta1 = mysqli_query($conexion,$query1) or die ("fallo en la consulta 1");
    //mostrar resultados
    if (mysqli_query($conexion,$query1))
    {
        echo "<div id='usuario'> ";                
        echo "<p > ";        
        echo "<table id='perfil_cliente'> ";            
        echo " <td>";                
        echo " <img src='../img/foto_perfil.jpg' id='foto_perfil'> ";                   
        echo " </td> ";               
        echo " <td> ";                
        echo " <span id='nombre_perfil_cliente'>$nombre $apellidos .</span>";                    
        echo " </td>";                              
        echo " </table>";            
        echo " </p>";        
        echo "</div> ";    
        echo "<div id='formulario_opinion'> "; 
        echo "<br><br><br>Se ha realizado el pago correctamente. Se le enviará un correo con la confirmación.<br><br>";
        echo " <a href='./jotas.php'><input type='button' value='Volver' id='cancelar'></a>";
        
        /*--------MONEDA JOTA GIRATORIA------------*/
    echo "<div class='formulario-compra'>";
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

        $_SESSION['jotas'] = $jotas_actu + $nuevas_jotas;

        unset ($_SESSION['numero_jotas']);
        unset ($_SESSION['nombre']);
        unset ($_SESSION['apellidos']);

       

    }
    else{
        
        echo "Error";
        
    }

        mysqli_close ($conexion);
    
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