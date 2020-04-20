<?php


include(dirname(__DIR__) . '/nav_default.php');



?>
<body>


<div class="section">

    <div class="container">
        <div class="row">
            <div class="col-md-12"><h1>Cambiar contraseña</h1></div>
        </div>
        <div class="row">

            <div class="col-md-12">
                
                <form role="form"  action="<?php echo $helper->url("Login","cambiarPass"); ?>" method="post" class="col-lg-5" autocomplete="off">
                    <div class="form-group">
                        
                        <input hidden required class="form-control" type="email" name="mail" value="<?php $mail ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" >
                            Codigo recibido por correo
                        </label>
                        <input required class="form-control"  placeholder="codigo de validacion" type="text" name="codigo" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" >
                            Nueva contraseña
                        </label>
                        <input required class="form-control"  placeholder="su contraseña" type="password" name="pass" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        Cambiar Contraseña<br>
                    </button><br><br>
                   
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>