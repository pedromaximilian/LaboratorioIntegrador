<?php


include(dirname(__DIR__) . '/nav_default.php');



?>
<body>


<div class="section">

    <div class="container">
        <div class="row">
            <div class="col-md-12"><h1>Inicio de sesion</h1></div>
        </div>
        <div class="row">

            <div class="col-md-12">
                
                <form role="form"  action="<?php echo $helper->url("Login","login"); ?>" method="post" class="col-lg-5" autocomplete="off">
                    <div class="form-group">
                        <label class="control-label" >
                            Correo electrónico
                        </label>
                        <input required class="form-control"  placeholder="ejemplo@correo.com" type="email" name="mail" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" >
                            Contraseña
                        </label>
                        <input required class="form-control"  placeholder="su contraseña" type="password" name="pass" required>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rol"  value="admin">
                        <label class="form-check-label">
                            Administrador
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rol" value="propietario" checked>
                        <label class="form-check-label">
                            Propietario
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Ingresar<br>
                    </button><br><br>
                    <a class="danger" href="<?php echo $helper->url("Login","ingresaMail"); ?>">Recuperar Contraseña</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>