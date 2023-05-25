<?

session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazen - Login</title>
    <link class="icono" rel="shortcut icon" href="../img/icon_amazen.png">
    <link rel="stylesheet" href="../css/login.css">
    <!-- Este link introduce la url de la fuente de amazon-->
	<link href="http://fonts.cdnfonts.com/css/amazon-ember" rel="stylesheet">
	<!-- Esta linea introduce la libreria jQuery para poder ser utilizada -->
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>
<body>
<!-- 
    <div class="logo">
        <img class="logo-img" src="../img/amazen_logo.png">
    </div> -->

    <div class="arriba">
        <div class="logo">
            <a href="../index.php"><img class="logo-img" src="../img/amazen_logo.png"></a>
        </div>
        <div class="login">
            <h4>Iniciar sesión</h4>
            <form action="login2.php" method="POST">
                <p class="txt1">
                    <b>Dirección de e-mail</b>
                </p>

                <input class="usr-mail" type="email" name="usr-mail"></input>
                <br>

                <input class="btn-log" type="submit" value="Continuar" name="continuar">
                <p class="txt2">
                    Al identificarse aceptas nuestras <a href="#">Condiciones de uso y venta.</a> Consulta nuestro <a href="#">Aviso de privacidad</a> y nuestras <a href="#">Aviso de Cookies</a> y <a href="#">Aviso sobre publicidad basada en los intereses del usuario.</a>
                </p>

                <p class="txt3">
                    <span class="triangulo">&#x2023;</span><a href="#">¿Necesitas ayuda?</a>
                </p>

            </form>
        </div>
        <div class="registro">
                <fieldset>
                    <legend>¿Eres nuevo en Amazen?</legend>
                    <a href='../registro/registro.php'><button class="btn-reg">Crea tu cuenta en Amazen</button></a>
                </fieldset>
        </div>



    </div>

    <hr>

    <div class="abajo">

        <a href="#">Condiciones de uso</a>
        <a href="#">Aviso de privacidad</a>
        <a href="#">Ayuda</a>
        <a href="#">Cookies</a>
        <a href="#">Publicidad basada en intereses</a>

        <p>(c) 1996-2022, Amazen.com, Inc. o sus afiliados</p>

    </div>

</body>

<!-- En esta línea referenciamos el archivo js donde implementamos jQuery -->
<script src="js/login.js"></script>
</html>