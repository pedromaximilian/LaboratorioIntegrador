<?php


include(dirname(__DIR__) . '/nav_default.php');



?>
<body>


<div class="section">

    <div class="container">
        <div class="row">
            <div class="col-md-12"><h1>Recuperar Contraseña</h1></div>
            <p>Por favor ingrese el correo electronico con el cual se registro en la Inmobiliaria</p>
            <p>Se enviará un codigo para que pueda recuperar el acceso.</p>
        </div>
        <div class="row">

            <div class="col-md-12">
                
                <form role="form"  action="<?php echo $helper->url("Login","enviarCodigo"); ?>" method="post" class="col-lg-5" autocomplete="off">
                    <div class="form-group">
                        <label class="control-label" >
                            Correo electrónico
                        </label>
                        <input required class="form-control"  placeholder="ejemplo@correo.com" type="email" name="mail" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        Obtener código<br>
                    </button><br><br>
                    
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>