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
    <p id='titulo_perfil'><b>Acerca de tu perfil:</b></p>
    <br>
    <p>
    <?php
    if (isset($_REQUEST['editar'])){
        $contra_antigua = $_REQUEST['contraseña_antigua'];
        if (isset($_REQUEST['id'])){
            $id_usuario=trim(strip_tags($_REQUEST["id"]));
        }
        else{
            $id_usuario ="";
        }
    
        if ($id_usuario ==""){
            print "<p>ERROR</p>\n";
        } 
        else{
    //conectar con el server de bdd
    $conexion = mysqli_connect("localhost","root","rootroot") or die ("No se puede establecer conexión");
    mysqli_select_db($conexion,"amazen") or die ("no se puede seleccionar la base de datos");
    $query="select * from usuario where id_usuario ='$id_usuario'";
    //echo $query."<br>"; //para comprobar errores
    $consulta = mysqli_query($conexion,$query) or die ("fallo en la consulta");
    //mostrar resultados
    $n_filas = mysqli_num_rows($consulta);
    if ($n_filas <> 1)
    {
        echo "No existe ese usuario";
    }
    else{
        $resultado = mysqli_fetch_array($consulta);
        //echo "usuario correcto";
        $nombre = $resultado['nombre'];
        $apellidos = $resultado['apellidos'];
        $telefono = $resultado['telefono'];
        $email = $resultado['email'];
        $contraseña = $resultado['passwd'];
        $direccion = $resultado['direccion'];
        $ciudad = $resultado['ciudad'];
        $jotas = $resultado['jotas'];
        $id = $resultado['id_usuario'];

        echo "<table>";
         echo " <tr>" ; 
         echo"   <td>";
         echo "<img src='./img/foto_perfil.jpg' id='foto_perfil'> ";       
         echo"   </td>";
         echo"   <td valign='top'> ";
        echo"        <span id='nombre_usuario'><b class='nombre'>$nombre</b><b class='apellidos'> $apellidos</b></span>";
         echo"   </td>";
       echo" </tr>";
    echo"</table>";
    echo"<hr size='1' id='hr_bajo_tabla'>   ";
        
      
        echo "<form action ='contraseña.php' method='post'>";
        echo "<p id='cosas'><b>Nombre:</b> <input type='text' name='nombre' id='espacio_dcha' value='".$nombre."' ></p>";
        echo "<p id='cosas'><b>Apellidos:</b> <input type='text' name='apellidos' id='espacio_dcha' value='".$apellidos."' ></p>";
        echo "<p id='cosas'><b>Teléfono:</b> <input type='number' name='telefono' id='espacio_dcha' value='".$telefono."' ></p>";
        echo "<p id='cosas'><b>Correo electrónico:</b> <input type='text' name='email' id='espacio_dcha' value='".$email."' ></p>";
        echo "<p id='cosas'><b>Contraseña:</b> <input type='password' class='contra' name='passwd'  id='espacio_dcha' value='".$contraseña."' ></p>";
        echo "<p id='cosas'><b>Dirección:</b> <input type='text' name='direccion' id='espacio_dcha' value='".$direccion."' ></p>";
        echo " <p id='cosas'><b>Ciudad:</b> <input type='text' name='ciudad' id='espacio_dcha' value='".$ciudad."'></p>";
        echo "<input type='hidden' name='id' value='".$id."'>";
        echo "<input type='hidden' name='contra_antigua' value='".$contra_antigua."'>";
        echo "<input type='hidden' name='jotas' value='".$jotas."'>";
        echo "<br>";
        echo "<input type='submit' value='Guardar' id='enviar' name='editar'> "; 
        echo " <input type='button' value='Cancelar' id='enviar' onclick='history.go(-1);'>";
        echo "<hr size='1' id='hr_bajo_tabla'>";
        echo "<p id='cosas'><b>Jotas disponibles:</b> <span class='saldo' id='espacio_dcha'>$jotas</span><b id='jotas'>Jotas<b id='r'>®</b></b></p>";
        echo "</form>";
        
    }
}
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