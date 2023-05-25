<?php

function dato_producto ($field, $id_producto) {

    $conexion = mysqli_connect("localhost", "root", "rootroot")
    or die ("No se puede conectar a la base de datos");
    
    mysqli_select_db($conexion, "Amazen")
    or die ("No se puede seleccionar la base de datos");
    
    $query = "
        SELECT $field FROM producto
        WHERE id_producto = $id_producto
    ";
    
    //echo $query; //Para comprobar errores mysql
    
    $consulta = mysqli_query ($conexion,$query)
    or die ("Fallo en la consulta");

    $resultado = mysqli_fetch_assoc($consulta);

    mysqli_close($conexion);

    return $resultado[$field];

}

function img_producto ($id_producto) {

    $conexion = mysqli_connect("localhost", "root", "rootroot")
    or die ("No se puede conectar a la base de datos");
    
    mysqli_select_db($conexion, "Amazen")
    or die ("No se puede seleccionar la base de datos");
    
    $query = "
        SELECT img_1, img_2 FROM producto
        WHERE id_producto = $id_producto
    ";
    
    //echo $query; //Para comprobar errores mysql
    
    $consulta = mysqli_query ($conexion,$query)
    or die ("Fallo en la consulta");

    $resultado = mysqli_fetch_array($consulta);

    echo "    <td align='center' id='producto_td1' valign='top' >\n";
    echo "        <table id='imagenes_producto_t' >\n";
    echo "            <tr> \n";
    echo "                <td ><div id='imagenes_producto1'><img src='./img/imagenes_productos/".$resultado['img_1']."' class='anchura-img img-p' border='2'></div></td>\n";
    echo "            </tr>\n";
    if ($resultado['img_2']) {
        echo "            <tr>\n";
        echo "                <td><div id='imagenes_producto1'><img src='./img/imagenes_productos/".$resultado['img_2']."' class='anchura-img img-p' border='2'></div></td>\n";
        echo "            </tr>\n";
    }
    echo "        </table>\n";
    echo          "<div id='imagen_producto' >";
    echo "        <img src='./img/imagenes_productos/".$resultado['img_1']."'  class='anchura-img' >\n";
    echo          "</div>";
    echo "    </td>\n";

    mysqli_close($conexion);

}

function categoria_producto ($id_producto) {

    $conexion = mysqli_connect("localhost", "root", "rootroot")
    or die ("No se puede conectar a la base de datos");
    
    mysqli_select_db($conexion, "Amazen")
    or die ("No se puede seleccionar la base de datos");
    
    $query = "
        select categoria.nombre from categoria, producto
        where categoria.id_categoria = producto.id_categoria
        and id_producto = $id_producto
    ";
    
    //echo $query; //Para comprobar errores mysql
    
    $consulta = mysqli_query ($conexion,$query)
    or die ("Fallo en la consulta");

    $resultado = mysqli_fetch_array($consulta);

    mysqli_close($conexion);

    return $resultado['nombre'];

}

function porcenta_valoraciones($id_producto, $rate) {

    $conexion = mysqli_connect("localhost", "root", "rootroot")
    or die ("No se puede conectar a la base de datos");
    
    mysqli_select_db($conexion, "Amazen")
    or die ("No se puede seleccionar la base de datos");
    
    // esta query me devuelve el count total de todas las valoraciones de ese producto;

    $query1 = "
        select count(id_producto) from valoracion where id_producto = $id_producto
    ";
    
    //echo $query; //Para comprobar errores mysql
    
    $consulta = mysqli_query ($conexion,$query1)
    or die ("Fallo en la consulta");

    $resultado = mysqli_fetch_array($consulta);

    $total_valoraciones = $resultado[0];

    //Esta consulta devuelve el ratio de cada valoracion asociada a ese producto segun su rate
    $query2 = "
        select (count(id_producto)  * 100 / $total_valoraciones) 
        from valoracion 
        where id_producto = $id_producto
        and rate = $rate
    ";
    
    $consulta2 = mysqli_query ($conexion,$query2)
    or die ("Fallo en la consulta");

    $resultado2 = mysqli_fetch_array($consulta2);

    $total_valoraciones = $resultado2[0];

    $resul = round($resultado2[0]);

    mysqli_close($conexion);

    return $resul;

}

function txt_valoracion ($id_producto)  {

    $conexion = mysqli_connect("localhost", "root", "rootroot")
    or die ("No se puede conectar a la base de datos");
    
    mysqli_select_db($conexion, "Amazen")
    or die ("No se puede seleccionar la base de datos");
    
    // esta query me devuelve el count total de todas las valoraciones de ese producto;

    $query = "
        select * from valoracion where 
        id_producto = $id_producto
    ";
    
    //echo $query; //Para comprobar errores mysql
    
    $consulta = mysqli_query ($conexion,$query)
    or die ("Fallo en la consulta");

    $nfilas = mysqli_num_rows ($consulta);

    if ($nfilas == 0){
        echo "Aún no hay valoraciones para este producto";
    } else {
        for ($i=0; $i < $nfilas; $i++){

            $resultado = mysqli_fetch_array($consulta);

            $query_nom_usu = "select nombre from usuario where id_usuario = ".$resultado['id_usuario']."";
    
            //echo $query; //Para comprobar errores mysql
            $consulta2 = mysqli_query ($conexion,$query_nom_usu)
            or die ("Fallo en la consulta");

            $nom_usu = mysqli_fetch_array($consulta2);

                echo "<p id='valoracion'>\n";
                echo "        <p id='perfil_cliente'>\n";
                echo "            <table>\n";
                echo "                <td>\n";
                echo "                    <img src='./img/foto_perfil.jpg' id='foto_perfil'>\n";
                echo "                </td>\n";
                echo "                <td> \n";
                echo "                    <span id='nombre_perfil_cliente'>".$nom_usu[0]."</span>\n";
                echo "                </td>\n";
                echo "            </table>\n";
                echo "        </p>\n";
                echo "            <img src='./img/estrellas/estrellas_".$resultado['rate'].".png' id='estrellitas_valoracion_texto'>\n";
                echo "            <b id='titulo_valoracion_texto'>".$resultado['titulo_valoracion']."</b><br>\n";
                echo "            <span id='fecha_subida_valoracion'>Valorado el ".$resultado['fecha']."</span><br>\n";
                echo "            <p id='texto_valoracion'>\n";
                echo               $resultado['texto_valoracion'];
                echo "            </p>\n";
                echo "    </p> \n";
        }
    }
    mysqli_close($conexion);
}

?>