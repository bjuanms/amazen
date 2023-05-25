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
<link rel='stylesheet' href='./css/perfil.css' type='text/css' />

<link class="icono" rel="shortcut icon" href="img/icon_amazen.png">
	<!-- Este link introduce la url de la fuente de amazon-->
	<link href="http://fonts.cdnfonts.com/css/amazon-ember" rel="stylesheet">
	<!-- Esta linea introduce el icono lupa de la barra de busqueda -->
	<script src="https://kit.fontawesome.com/712575d4a5.js" crossorigin="anonymous"></script>

	<!-- Esta linea introduce el icono redes sociales del footer -->
	<script src="https://kit.fontawesome.com/e1e79a1c29.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/footer.css">

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
<body  >

<!--Barra promoción debajo del menu superior. Con producto, desceripcion, precio y marca.-->
<div id='formulario_opinion'>
   <br><br>
    <?php
    //print "<pre>"; print_r($_REQUEST); print "</pre>\n";
    if (isset($_REQUEST['contra_actu'])){
        $contra_actu=trim(strip_tags($_REQUEST["contra_actu"]));
    }
    else{
        $contra_actu ="";
    }
    
    $nombre=$_REQUEST["nombre"];
    $apellidos=$_REQUEST["apellidos"];
    $telefono=$_REQUEST["telefono"];
    $email=$_REQUEST["email"];
    $passwd=$_REQUEST["passwd"];
    $direccion=$_REQUEST["direccion"];
    $ciudad=$_REQUEST["ciudad"];           
    $jotas= $_REQUEST["jotas"];
    $id_usuario= $_REQUEST["id"];
    $contra_antigua= $_REQUEST["contra_antigua"];

    if ($contra_actu !== $contra_antigua || $contra_actu == ""){
        print "<p>Contraseña Incorrecta. Datos no actualizados.</p>\n";
        echo "<br>";
        echo " <input type='button' value='Reintentar' id='enviar' onclick='history.go(-1);'> <input type='button' value='Salir' id='enviar' onclick='history.go(-3);'>";
    }
    else{
//------------------------------------------------------------------------------------------------------
    //echo "$contra_Actu";
    //conectar con el server de bdd
    $conexion = mysqli_connect("localhost","root","rootroot") or die ("No se puede establecer conexión");
    mysqli_select_db($conexion,"amazen") or die ("no se puede seleccionar la base de datos");
    $query="UPDATE `usuario` SET `nombre` = '$nombre', `apellidos` = '$apellidos', `telefono` = $telefono, `email` = '$email', `passwd` = '$passwd', `direccion` = '$direccion', `ciudad` = '$ciudad', `jotas` = $jotas WHERE `usuario`.`id_usuario` = $id_usuario;";
    //echo $query."<br>"; //para comprobar errores
    $consulta = mysqli_query($conexion,$query) or die ("fallo en la consulta");
    //mostrar resultados
    if (mysqli_query($conexion,$query))
    {
        echo "Contraseña correcta.";
        echo "<br><br>";
        echo "Datos actualizados correctamente.";
        echo "<br><br>";
        echo " <a href='./perfil.php?id=$id_usuario'><input type='button' value='Volver' id='enviar'></a>";

        $_SESSION['nom_usu'] = $nombre;

    }
    else{
        
        echo "Usuario No actualizado";
        echo "<br><br>";
        echo " <input type='button' value='Reintentar' id='enviar' onclick='history.go(-1);'>";
    }

mysqli_close ($conexion);
    }


    
    ?>
    </p>

<br><br><br><br>

</div>

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
