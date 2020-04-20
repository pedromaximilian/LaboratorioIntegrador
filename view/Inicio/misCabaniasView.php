<?php



include(dirname(__DIR__) . '/navPropietario.php');
//return var_dump($lista);
?>



<div class="section">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12"><h1>Cabañas - Inicio</h1>
            <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>

                        <th>Domicilio</th>
                        <th>Localidad</th>
                        <th>Capacidad</th>
                        <th>Observacion</th>
                        <th>Propietario (quitar en produccion)</th>
                        <th>Precio Dia</th>
                        <th>Operacion</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($lista)) { ?>

                            <?php foreach ($lista as $i){ ?>
                    <tr>
                        <td>    <?php echo $i->domicilio; ?> </td>
                        <td>    <?php echo $i->localidad; ?> </td>
                        <td>    <?php echo $i->capacidad; ?> </td>
                        <td>    <?php echo $i->observaciones; ?> </td>
                        <td>    <?php echo $i->idPropietario; ?> </td>
                        <td>    <?php echo $i->precio; ?> </td>

                        <td>
                            
                            <a href="<?php echo $helper->url("reserva","misReservasPorCabania"); ?>&id=<?php echo $i->id; ?>" class="btn btn-warning">Reservas</a>
                        </td>
                    </tr>
                            <?php } ?>
                    <?php  } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<hr>

</body>
</html>