
<?php


include (dirname(__DIR__).'/nav.php');
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form role="form"  action="<?php echo $helper->url("Cliente","actualizar"); ?>" method="post" class="col-lg-5">
                    <div class="form-group" hidden>
                        <input  required class="form-control" type="text" name="id" value="<?php echo $i->id ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <input required maxlength="50" class="form-control" placeholder="Ingrese su nombre" type="text" name="nombre" value="<?php echo $i->nombre ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Apellido
                            <br>
                        </label>
                        <input required maxlength="50" class="form-control" placeholder="Ingrese su apellido" type="text" name="apellido" value="<?php echo $i->apellido ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">DNI</label>
                        <input required maxlength="20" class="form-control" placeholder="Ingrese su Documento Nacional de Identidad" type="text" name="dni" value="<?php echo $i->dni ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Domicilio</label>
                        <input required maxlength="50" class="form-control" placeholder="Ingrese su domiciliactual" type="text" name="domicilio" value="<?php echo $i->domicilio ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mail</label>
                        <input required maxlength="50" class="form-control" placeholder="Ingrese su correo electronico" type="email" name="mail" value="<?php echo $i->mail ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telefono</label>
                        <input required maxlength="50" class="form-control" placeholder="Ingrese su numero de telefono" type="text" name="telefono" value="<?php echo $i->telefono ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar
                        <br>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"?>
</body>

</html>