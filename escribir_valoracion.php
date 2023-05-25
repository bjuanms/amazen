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

    

    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/escribir_valoracion.css" type="text/css" />


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

<?php


if (isset($_SESSION['id_usu'])) {

    $id_usuario = $_SESSION['id_usu'];
    $nom_usu = $_SESSION['nom_usu'];
    $jota =  $_SESSION['jotas'];




   
    $id_producto = $_REQUEST['id_prod']; //ESTE VALOR VIENE DADO POR SESION
        
        //conectar con el server de bdd
        $conexion = mysqli_connect("localhost","root","rootroot") or die ("No se puede establecer conexión");
        mysqli_select_db($conexion,"amazen") or die ("no se puede seleccionar la base de datos");
        $query1="select nombre, apellidos from usuario where id_usuario ='$id_usuario'";  
        $query2="select titulo_prod, img_1 from producto where id_producto ='$id_producto'";
        //echo $query."<br>"; //para comprobar errores
        $consulta1 = mysqli_query($conexion,$query1) or die ("fallo en la consulta 1");
        $consulta2 = mysqli_query($conexion,$query2) or die ("fallo en la consulta 2");
        //mostrar resultados
        $n_filas1 = mysqli_num_rows($consulta1);
        $n_filas2 = mysqli_num_rows($consulta2);
        if ($n_filas1 <> 1)
        {
            echo "No existe ese usuario";
        }
        elseif ($n_filas2 <> 1)
        {
            echo "No existe ese producto";
        }
        else{ 
            $resultado1 = mysqli_fetch_array($consulta1);
            $resultado2 = mysqli_fetch_array($consulta2);
            //echo "usuario correcto";
            $nombre = $resultado1['nombre'];
            $apellidos = $resultado1['apellidos'];
            $titulo_prod = $resultado2['titulo_prod'];
            $imagen_1 = $resultado2['img_1'];
    
        echo "<form enctype='multipart/form-data' action='subir_valoracion.php' method='POST'>";    
        echo "<div id='usuario'> ";                
        echo "<p > ";        
        echo "<table id='perfil_cliente'> ";            
        echo " <td>";                
        echo " <img src='./img/foto_perfil.jpg' id='foto_perfil'> ";                   
        echo " </td> ";               
        echo " <td> ";                
        echo " <span id='nombre_perfil_cliente'>$nombre $apellidos.</span>";                    
        echo " </td>";                              
        echo " </table>";            
        echo " </p>";        
        echo "</div> ";    
            
        echo "<div id='formulario_opinion'> ";               
        echo "<p id='titulo_valoraciones'><b>Escribir una opinión</b></p> ";                 
        echo "<br> ";                 
        echo "<p> ";                 
        echo "<table> ";                     
        echo "<td> ";                         
        echo "<img src='./img/".$imagen_1."' id='imagen_prod' > ";                             
        echo "</td> ";                         
        echo "<td valign='top'>  ";                         
        echo " <span id='nombre_producto'>$titulo_prod</span> ";                            
        echo "</td> ";                         
        echo "</table> ";                         
        echo "</p> ";                   
        
        echo "<input type='hidden' name='id_usuario' value='".$id_usuario."'>";
        echo "<input type='hidden' name='id_producto' value='".$id_producto."'>";

        }
?>


    
<hr size='1' id='hr_bajo_tabla'>
<p id='valoracion_general'> 
<span id='titulo_valoracion_general'><b>Valoración general</b></span>
</p>



<form id='form_estrellitas'>
    <input type='reset' value='Borrar' id='boton_borrar'>
    <p class='clasificacion' id='form_p'>
      <input id='radio1' type='radio' name='estrellas' value='5'><!--
      --><label for='radio1' id='form_label'>★</label><!--
      --><input id='radio2' type='radio' name='estrellas' value='4'><!--
      --><label for='radio2' id='form_label'>★</label><!--
      --><input id='radio3' type='radio' name='estrellas' value='3'><!--
      --><label for='radio3' id='form_label'>★</label><!--
      --><input id='radio4' type='radio' name='estrellas' value='2'><!--
      --><label for='radio4' id='form_label'>★</label><!--
      --><input id='radio5' type='radio' name='estrellas' value='1'><!--
      --><label for='radio5' id='form_label'>★</label>
    </p>
  </form>

<hr size='1' id='hr_bajo_tabla'>
<p id='valoracion_general'> 
    <span id='titulo_valoracion_general'><b>Añade un título</b></span>
</p>
    <input type='text' name='titulo_valoracion' id='input_titulo_valoracion' placeholder='¿Qué es lo más importante?'>

<hr size='1' id='hr_bajo_tabla'>
<p id='valoracion_general'> 
    <span id='titulo_valoracion_general'><b>Añadir una foto o vídeo</b></span>
</p>
    
    <p id='blablabla'>Los compradores encuentran las imágenes y vídeos más útiles que únicamente el texto.</p>
  <br>
  <input name="uploadedfile" type="file" /> <br> <!-- src='./img/añadir_foto.png' HAY QUE ARREGLAR ESTO-->
  <hr size='1' id='hr_bajo_tabla'>
  <p id='valoracion_general'> 
    <span id='titulo_valoracion_general'><b>Añadir una reseña escrita</b></span><br><br>
    <textarea name='texto_valoracion' rows='8' cols='93'></textarea>
    <br>
    <hr size='1' id='hr_bajo_tabla'><br>
    <input type='button' value='Volver'  onclick='history.go(-1);' id='enviar2'>
    <input type='submit' value='Enviar' id='enviar'><br><br><br><br>
</p>
</div>
</form>
    
    

<?php
}
 else{
    header("Location:../login/login.php");
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