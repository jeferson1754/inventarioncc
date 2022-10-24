<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/estilo.css">

</head>

<body  class="login" >
    <form action="_functions.php" method="POST">
        <div id="login">
            <br>
            <div class="row justify-content-center">
                <a href="https://intranet.redinterclinica.cl/">
                <img src="https://intranet.redinterclinica.cl/img/logo_login.png" alt="" margin="20px" width="239px">
                </a>
            </div>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <br>

                            <br>
                            <h3 class="text-center" style="font-weight:bold;font-size: 50px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Bienvenidos</h3>
                            <br>
                            <div class="form-group">
                                <label for="correo" class="lbl">Usuario:</label><br>
                                <input type="text" name="nombre" id="nombre" class="form-control ipt" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="lbl">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control ipt" required>
                                <input type="hidden" name="accion" value="acceso_user">
                            </div>
                            <div class="form-group">
                                <br>
                                <center>
                                    <input type="submit" class="btn btn-success boton4" value="Ingresar">
                                </center>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>
</body>

</html>