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
      //ESTE VALOR VIENE DADO POR SESION
    //conectar con el server de bdd
    $conexion = mysqli_connect("localhost","root","rootroot") or die ("No se puede establecer conexión");
    mysqli_select_db($conexion,"amazen") or die ("no se puede seleccionar la base de datos");
    $query="select * from usuario where id_usuario ='$id_usu'";
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
    echo"<hr size='1' id='hr_bajo_tabla'>";
        
      
        echo "<form action ='editar_perfil.php' method='post'>";
        echo "<p id='cosas'><b>Nombre:</b> <span class='nombre' id='espacio_dcha'>$nombre</span></p>";
        echo "<p id='cosas'><b>Apellidos:</b> <span class='apellidos' id='espacio_dcha'>$apellidos</span></p>";
        echo "<p id='cosas'><b>Teléfono:</b> <span class='telefono' id='espacio_dcha'>$telefono</span></p>";
        echo "<p id='cosas'><b>Correo electrónico:</b> <span class='correo' id='espacio_dcha'>$email</span></p>";
        echo "<p id='cosas'><b>Contraseña:</b> <input type='password' name='contraseña_antigua' value=".$contraseña." id='espacio_dcha' readonly></p>";
        echo "<p id='cosas'><b>Dirección:</b> <span class='direccion' id='espacio_dcha'>$direccion</span></p>";
        echo " <p id='cosas'><b>Ciudad:</b> <span class='ciudad' id='espacio_dcha'>$ciudad</span></p>";
        echo "<br>";
        echo "<input type='submit' value='Editar' id='enviar1' name='editar'>"; 
        echo "<a href='./pedidos.php?id=$id_usu'> <input type='button' value='Mis pedidos' id='enviar' ></a>";
        echo "<hr size='1' id='hr_bajo_tabla'>";
        echo "<p id='cosas'><b>Jotas disponibles:</b> <span class='saldo' id='espacio_dcha'>$jotas</span>
        <b id='jotas'>Jotas<b id='r'>®</b></b>
        <a href='../jotas_php/jotas.php?'><input type='button' value='Comprar Jotas®' id='enviar2' ></a></p>";
        echo "<input type='hidden' name='id' value=".$id.">"; //EL ID HIDDEN PARA GUARDAR EL VALOR ID (REQUEST)
        echo "</form>";
        $_SESSION['apellidos'] = $apellidos;
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

