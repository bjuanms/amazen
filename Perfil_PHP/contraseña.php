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
    <?php
    if (isset($_REQUEST['nombre'])){
        $nombre=trim(strip_tags($_REQUEST["nombre"]));
    }
    else{
        $nombre ="";
    }
    if (isset($_REQUEST['apellidos'])){
        $apellidos=trim(strip_tags($_REQUEST["apellidos"]));
    }
    else{
        $apellidos ="";
    }
    if (isset($_REQUEST['telefono'])){
        $telefono=trim(strip_tags($_REQUEST["telefono"]));
    }
    else{
        $telefono ="";
    }
    if (isset($_REQUEST['email'])){
        $email=trim(strip_tags($_REQUEST["email"]));
    }
    else{
        $email ="";
    }
    if (isset($_REQUEST['passwd'])){
        $passwd=trim(strip_tags($_REQUEST["passwd"]));
    }
    else{
        $passwd ="";
    }
    if (isset($_REQUEST['direccion'])){
        $direccion=trim(strip_tags($_REQUEST["direccion"]));
    }
    else{
        $direccion ="";
    }
    if (isset($_REQUEST['ciudad'])){
        $ciudad=trim(strip_tags($_REQUEST["ciudad"]));
    }
    else{
        $ciudad ="";
    }
    $jotas= $_REQUEST["jotas"];
    $id_usuario= $_REQUEST["id"];
    $contra_antigua = $_REQUEST["contra_antigua"];

    if ($nombre =="" | $apellidos =="" | $telefono =="" | $email =="" | $passwd =="" | $direccion =="" | $ciudad ==""){
        print "<p>No se puede continuar. Hay campos vacíos.</p>\n";
        echo "<br>";
        echo " <input type='button' value='Reintentar' id='enviar' onclick='history.go(-1);'>";
    }
    else{
//------------------------------------------------------------------------------------------------------
echo "<form action ='update_perfil.php' method='post'>";
echo "<p id='cosas'>Escriba su contraseña actual para guardar los cambios:</p>";
echo "<p id='cosas'><b>Contraseña actual:</b> <input type='password' name='contra_actu' id='espacio_dcha'></p>"; 
echo "<input type='hidden' name='nombre' id='espacio_dcha' value='".$nombre."' ></p>";
echo "<input type='hidden' name='apellidos' id='espacio_dcha' value='".$apellidos."' ></p>";
echo "<input type='hidden' name='telefono' id='espacio_dcha' value='".$telefono."' ></p>";
echo "<input type='hidden' name='email' id='espacio_dcha' value='".$email."' ></p>";
echo "<input type='hidden' class='contra' name='passwd'  id='espacio_dcha' value='".$passwd."' ></p>";
echo "<input type='hidden' name='direccion' id='espacio_dcha' value='".$direccion."' ></p>";
echo "<input type='hidden' name='ciudad' id='espacio_dcha' value='".$ciudad."'></p>";
echo "<input type='hidden' name='id' value='".$id_usuario."'>";
echo "<input type='hidden' name='jotas' value='".$jotas."'>";
echo "<input type='hidden' name='contra_antigua' value='".$contra_antigua."'>";
echo "<br>";
echo "<input type='submit' value='Continuar' id='enviar' name='editar'> "; 
echo " <a href='./perfil.php'><input type='button' value='Cancelar' id='enviar'></a>";
echo "<hr size='1' id='hr_bajo_tabla'>";
echo "</form>";
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
