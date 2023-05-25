<style>
    .hidden-table {
        display: none;
    }

</style>


<?php

function productos_busqueda() {

    if (isset($_REQUEST['btn-lupa-submit'])) {
        $producto_busqueda = trim(strip_tags($_REQUEST['busqueda']));

        $conexion = mysqli_connect("localhost", "root", "rootroot")
        or die ("No se puede conectar a la base de datos");
        
        mysqli_select_db($conexion, "Amazen")
        or die ("No se puede seleccionar la base de datos");
        
        $query = "
            SELECT * FROM producto
            WHERE titulo_prod LIKE '%$producto_busqueda%'
        ";
        
        //echo $query; //Para comprobar errores mysql
        
        $consulta = mysqli_query ($conexion,$query)
        or die ("Fallo en la consulta");
        
        $nfilas = mysqli_num_rows ($consulta);

        if ($nfilas == 0) {
            echo "<p>UPS! No hay productos como el que estas buscando</p>";
        }
        else 
        {

            if ($nfilas > 7)   /// Esto es en el caso de que haya mas de siete resultados para que la tabla no se deslce a la derecha
            {
                echo "<table id='productos_relacionados_t'>";
                    for($i=0; $i < 7; $i++)
                        {
                            $resultado = mysqli_fetch_array($consulta);
                            echo "<td id='prods_relacs_td' valign='top'>";
                            echo "<a id='prods_relacs_links' href='producto.php?producto=".$resultado['id_producto']."'>";
                            echo "<img src='img/imagenes_productos/".$resultado['img_1']."' id='imagen_producto_relacionado'>";
                            echo "<p id='titulo_producto_relacionado'>".$resultado['titulo_prod']."</p>";
                            echo "<p id='valoracion_producto_relacionado'><img src='./img/estrellas/estrellas_".img_valoracion($resultado['id_producto']).".png' id='estrellitas_prod_relac'> <span id='valoraciones_prod_relac'>".count_valoracion($resultado['id_producto'])."</span></p>";
                            echo "<p id='precio_producto_relacionado'>".$resultado['precio']."</p></td>";
                            echo "</a>";
                        }
                echo "</table>";
        
                $nfilas = $nfilas - 7;
                if ($nfilas > 0) 
                {
                    echo "<table id='productos_relacionados_t'>";
                    for($i=0; $i < 7; $i++)
                    {
                            if ($nfilas > 0) {
                                $resultado = mysqli_fetch_array($consulta);
                                echo "<td id='prods_relacs_td' valign='top'>";
                                echo "<a id='prods_relacs_links' href='producto.php?producto=".$resultado['id_producto']."'>";
                                echo "<img src='img/imagenes_productos/".$resultado['img_1']."' id='imagen_producto_relacionado'>";
                                echo "<p id='titulo_producto_relacionado'>".$resultado['titulo_prod']."</p>";
                                echo "<p id='valoracion_producto_relacionado'><img src='./img/estrellas/estrellas_".img_valoracion($resultado['id_producto']).".png' id='estrellitas_prod_relac'> <span id='valoraciones_prod_relac'>".count_valoracion($resultado['id_producto'])."</span></p>";
                                echo "<p id='precio_producto_relacionado'>".$resultado['precio']."</p></td>";
                                echo "</a>";
                            } else {
                                echo "<td id='prods_relacs_td' valign='top'>";
                                echo "<a id='prods_relacs_links' href='producto.php?producto=".$resultado['id_producto']."'>";
                                echo "<img src='img/imagenes_productos/".$resultado['img_1']."' id='imagen_producto_relacionado'>";
                                echo "<p id='titulo_producto_relacionado'>".$resultado['titulo_prod']."</p>";
                                echo "<p id='valoracion_producto_relacionado'><img src='./img/estrellas/estrellas_".img_valoracion($resultado['id_producto']).".png' id='estrellitas_prod_relac'> <span id='valoraciones_prod_relac'>".count_valoracion($resultado['id_producto'])."</span></p>";
                                echo "<p id='precio_producto_relacionado'>".$resultado['precio']."</p></td>";
                                echo "</a>";
                            }
                            $nfilas--;
                    }
                        echo "</table>";
                }
            } else { // Esto es para cuando hay menos de siete o =7 resultados y no queremos que muestre los tables vacios
                echo "<table id='productos_relacionados_t'>";
                for($i=0; $i < $nfilas; $i++)
                    {
                        $resultado = mysqli_fetch_array($consulta);
                        echo "<td id='prods_relacs_td' valign='top'>";
                        echo "<a id='prods_relacs_links' href='producto.php?producto=".$resultado['id_producto']."'>";
                        echo "<img src='img/imagenes_productos/".$resultado['img_1']."' id='imagen_producto_relacionado'>";
                        echo "<p id='titulo_producto_relacionado'>".$resultado['titulo_prod']."</p>";
                        echo "<p id='valoracion_producto_relacionado'><img src='./img/estrellas/estrellas_".img_valoracion($resultado['id_producto']).".png' id='estrellitas_prod_relac'> <span id='valoraciones_prod_relac'>".count_valoracion($resultado['id_producto'])."</span></p>";
                        echo "<p id='precio_producto_relacionado'>".$resultado['precio']."</p></td>";
                        echo "</a>";
                    }
                echo "</table>";
            }
        }
        mysqli_close($conexion);
    }
}

// Esta funcion carga los 6 productos aleatorios que se colocan en el final de las paginas principales
function productos_random() {

    $conexion = mysqli_connect("localhost", "root", "rootroot")
    or die ("No se puede conectar a la base de datos");
    
    mysqli_select_db($conexion, "Amazen")
    or die ("No se puede seleccionar la base de datos");
    

    //Esta query va a contar el total de productos
    $query_max = "SELECT MAX(id_producto) FROM producto";

    //echo $query; //Para comprobar errores mysql

    $consulta = mysqli_query ($conexion,$query_max)
    or die ("Fallo en la consulta");

    /// En la variable $max se almacena el numero total de productos
    $max = mysqli_fetch_array($consulta);

    $query_min = "SELECT MIN(id_producto) FROM producto";

    //echo $query; //Para comprobar errores mysql

    $consulta = mysqli_query ($conexion,$query_min)
    or die ("Fallo en la consulta");

    /// En la variable $max se almacena el numero total de productos
    $min = mysqli_fetch_array($consulta);

    echo "<table id='productos_relacionados_t'>";
    for ($i=0; $i<6; $i++){
        /// Hacemos otra query que nos devuelva los valores de dichos objetos
        $id_random = rand($min[0], $max[0]);

        $query2 = "
            SELECT * FROM producto
            WHERE id_producto = $id_random
        ";

        $consulta2 = mysqli_query ($conexion,$query2)
        or die ("Fallo en la consuuuulta");

        $resultado = mysqli_fetch_array($consulta2);

        echo "    <td id='prods_relacs_td' valign='top'>";
        echo "        <a id='prods_relacs_links' href='producto.php?producto=".$resultado['id_producto']."'>";
        echo "        <img src='img/imagenes_productos/".$resultado['img_1']."' id='imagen_producto_relacionado'>";
        echo "        <p id='titulo_producto_relacionado'>".$resultado['titulo_prod']."</p>";
        echo "        <p id='valoracion_producto_relacionado'><img src='./img/estrellas/estrellas_".img_valoracion($id_random).".png' id='estrellitas_prod_relac'> <span id='valoraciones_prod_relac'>".count_valoracion($id_random)."</span></p>";
        echo "        <p id='precio_producto_relacionado'>".$resultado['precio']."</p></td>";
        echo "        </a>";
        echo "    </td>";

    }
    echo "</table>";

    mysqli_close($conexion);
}

/// Esta funcion devulve la imagen que corresponde a cada estrellita en funcion de su media de valoraciones
function img_valoracion($id_producto){

    $conexion = mysqli_connect("localhost", "root", "rootroot")
    or die ("No se puede conectar a la base de datos");
    
    mysqli_select_db($conexion, "Amazen")
    or die ("No se puede seleccionar la base de datos");

    $query = "
    SELECT FLOOR(AVG(rate)) 
    FROM valoracion
    WHERE id_producto = $id_producto
    ";

    //echo $query; //Para comprobar errores mysql

    $consulta = mysqli_query ($conexion,$query)
    or die ("Fallo en la consulta");

    $avg = mysqli_fetch_array($consulta);
    //El valor estará guardado en $avg[0]

    mysqli_close($conexion);



    return $avg[0];

}

//Esta funcion da como resultado el numero total de valoraciones que tiene un producto

function count_valoracion($id_producto) {

    $conexion = mysqli_connect("localhost", "root", "rootroot")
    or die ("No se puede conectar a la base de datos");
    
    mysqli_select_db($conexion, "Amazen")
    or die ("No se puede seleccionar la base de datos");

    $query = "
    SELECT COUNT(id_valoracion)
    FROM valoracion
    WHERE id_producto = $id_producto
    ";

    //echo $query; //Para comprobar errores mysql

    $consulta = mysqli_query ($conexion,$query)
    or die ("Fallo en la consulta");

    $count = mysqli_fetch_array($consulta);
    //El valor estará guardado en $avg[0]

    mysqli_close($conexion);

    return $count[0];

}

?>