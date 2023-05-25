<?php
	session_start();

	if (isset($_SESSION['id_usu'])) {
		$id_usu = $_SESSION['id_usu'];
		$nom_usu = $_SESSION['nom_usu'];
		$jota =  $_SESSION['jotas'];
        $apellidos = $_SESSION['apellidos'];
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

<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/footer.css">
<link rel='stylesheet' href='../css/perfil.css' type='text/css' />

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

<body >
<!--Barra promoción debajo del menu superior. Con producto, desceripcion, precio y marca.-->
<div id='formulario_opinion'>
    <p id='titulo_perfil'><b>Mis pedidos:</b></p>
    <br>
    <p>
    <?php
   
        echo "<table>";
         echo " <tr>" ; 
         echo"   <td>";
         echo "<img src='./img/foto_perfil.jpg' id='foto_perfil'> ";       
         echo"   </td>";
         echo"   <td valign='top'> ";
                echo"        <span id='nombre_usuario'><b class='nombre'>$nom_usu</b><b class='apellidos'> $apellidos</b></span>";
                echo"   </td>";
            echo" </tr>";
            echo"</table>";
            echo"<hr size='1' id='hr_bajo_tabla'><br>";
            
    //ESTO ES LO NUEVO AÑADIDO A LO QUE YA ESTABA, POR SI HAY QUE BUSCAR LOS NAMES DEL CSS

            // Conectar con el servidor de base de datos
            $conexion = mysqli_connect ("localhost", "root", "rootroot")
            or die ("No se puede conectar con el servidor");
                
            // Seleccionar base de datos
            mysqli_select_db ($conexion,"amazen")
                or die ("No se puede seleccionar la base de datos");
            // Enviar consulta
            
            $instruccion = "select * from pedido where id_usuario = $id_usu";
            $consulta = mysqli_query ($conexion,$instruccion)
                or die ("Fallo en la consulta");
            // Mostrar resultados de la consulta
            $nfilas = mysqli_num_rows ($consulta);
            if ($nfilas > 0)
            {
                print ("<TABLE id='tabla_pedidos' border='1'>\n");
                print ("<TR>\n");
                print ("<TH>Fecha del pedido</TH>\n");
                print ("<TH>Número de unidades</TH>\n");
                print ("<TH>Precio final</TH>\n");
                print ("</TR>\n");

                for ($i=0; $i<$nfilas; $i++)
                {
                $resultado = mysqli_fetch_array ($consulta);
                print ("<TR>\n");
                print ("<TD id='td_tabla_pedidos'>" . $resultado['fecha_pedido'] . "</TD>\n");
                print ("<TD id='td_tabla_pedidos'><span id='unidades_total'>" . $resultado['unidades_total'] . "</span></TD>\n");
                print ("<TD id='td_tabla_pedidos'><span id='precio_total'>" . $resultado['precio_total'] ."</span></TD>\n");                
                print ("</TR>\n");
                }

                print ("</TABLE>\n");
                
            }
            else
                print ("Todavía no has realizado ningún pedido.");

            // Cerrar 
            mysqli_close ($conexion);

    echo "<hr size='1' id='hr_bajo_tabla'>";
    

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
