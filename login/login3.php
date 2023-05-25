<?php

session_start();

if (isset($_REQUEST['iniciar'])) {
    $mail = trim(strip_tags($_REQUEST['mail']));
    $passwd = trim(strip_tags($_REQUEST['passwd']));

    $conexion = mysqli_connect("localhost", "root", "rootroot")
    or die ("No se puede conectar a la base de datos");
    
    mysqli_select_db($conexion, "Amazen")
    or die ("No se puede seleccionar la base de datos");
    
    $query = "
        SELECT * FROM usuario
        WHERE email = '$mail'
        AND passwd = '$passwd'
    ";
    
    //echo $query; //Para comprobar errores mysql
    
    $consulta = mysqli_query ($conexion,$query)
    or die ("Fallo en la consulta");

    if ($resultado = mysqli_fetch_array($consulta)) {
        $_SESSION['id_usu'] = $resultado['id_usuario'];
        $_SESSION['nom_usu'] = $resultado['nombre'];
        $_SESSION['jotas'] = $resultado['jotas'];

        //echo "Has iniciado sesion como: ". $_SESSION['id_usu'] ."-".$_SESSION['nom_usu']."-".$_SESSION['jotas']."";
        header("Location:../index.php");

        /// Queda pendiente history.go(-1) que vuelva a la pag valoraciones si de ahí viene


    } else {
        //Aqui hay que hacer algo para controlar que la contraseña y el email no coinciden
        echo "<p>Datos introducidos son incorrectos</p>";
    }


    mysqli_close($conexion);

    


} else {
    echo "Algo ha ido mal";
}

?>