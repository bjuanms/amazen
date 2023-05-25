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
<form enctype="multipart/form-data" action='subir_valoracion.php' method="POST">
<div id='formulario_opinion'>
<!--Barra promoción debajo del menu superior. Con producto, desceripcion, precio y marca. 
<a href="pagina_principal.html" target="principal" color=black id="promo_link">
<div id="promo">  
    <table id="promo_tabla" >
        <tr>
            <td align="center" id="promo_td"><img src="./img/Marca.png" id="marca_promo" ></td>
            <td align="center" id="promo_td"><p id="descrip_promo"> Descubre nuestros últimos modelos</p></td>
            <td align="center" id="promo_td"><p id="precio_promo">10'50 € </p></td>
            <td align="center" id="promo_td"><img src="./img/portatil.png" id="prod_promo"></td>
        </tr>
    </table>
</div>
</a>-->
<?php
//print "<pre>"; print_r($_REQUEST); print "</pre>\n";
    //----------------FECHA DE LA VALORACION------------------------
    $time = time();
    $fecha= date("Y-m-d", $time);
    //--------------------------------------------------------------
    $id_usuario= $_REQUEST["id_usuario"];
    $id_producto= $_REQUEST["id_producto"];
    $estrellas = $_REQUEST['estrellas'];

    if (isset($_REQUEST['titulo_valoracion'])){
        $titulo_valoracion=trim(strip_tags($_REQUEST["titulo_valoracion"]));
    }
    else{
        $titulo_valoracion ="";
    }
    if (isset($_REQUEST['texto_valoracion'])){
        $texto_valoracion=trim(strip_tags($_REQUEST["texto_valoracion"]));
    }
    else{
        $texto_valoracion ="";
    }
    
    //--------------------IMAGEN------------------------------------
        $error = false;
        $target_path = "./fotos_subidas/";
        $basename = basename( $_FILES['uploadedfile']['name']);
        $target_path1 = $target_path . $basename; 
        
        
        // Si ya existe un fichero con el mismo nombre, renombrarlo
        if (is_file($target_path1))
            {
                $idUnico = time();
                $basename = $idUnico . "-" . $basename;
                $target_path1 = $target_path . $basename; 
            }
        elseif(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path1)) {
        //echo "El archivo ".  $basename. 
        //" ha sido subido";
        

        } else{
            //echo "Ha ocurrido un error, trate de nuevo!";
            $error = true;
        }
    //--------------------------------------------------------------
    //--------------CONTROL DE ERRORES-----------------------------
    if ($estrellas =="" | $titulo_valoracion =="" | $texto_valoracion ==""){
        echo "<br><br>";
        print "<p>La valoración no se ha registrado. Hay campos sin rellenar.</p>\n";
        echo "<br><br>";
        echo " <input type='button' value='Reintentar' id='enviar' onclick='history.go(-1);'>";
    } 
    //-------------------------------------
    else{
        
        $conexion = mysqli_connect("localhost","root","rootroot") or die ("No se puede establecer conexión");
        mysqli_select_db($conexion,"amazen") or die ("no se puede seleccionar la base de datos");
        $query="INSERT INTO `valoracion` (`id_valoracion`, `id_producto`, `id_usuario`, `titulo_valoracion`, `texto_valoracion`, `fecha`, `rate`, `imagen`) VALUES (NULL, '$id_producto', '$id_usuario', '$titulo_valoracion', '$texto_valoracion', '$fecha', '$estrellas', '$basename');";
        //echo $query."<br>"; //para comprobar errores
        //$consulta = mysqli_query($conexion,$query) or die ("fallo en la consulta");
        //mostrar resultados
        if (mysqli_query($conexion,$query))
        {
            echo "<br><br>";
            echo "Valoración realizada correctamente.";
            echo "<br><br>";
            echo " <input type='button' value='Salir' id='enviar' onclick='history.go(-2);'>";
            
        }
        else{
            echo "Valoración no realizada. Ha habido un error.";
            echo "<br><br>";
            echo " <input type='button' value='Reintentar' id='enviar' onclick='history.go(-1);'>";
        }

        mysqli_close ($conexion);
    }     
?>

</div>
</form>
</body>
</hhtml>