
<?php



include(dirname(__DIR__) . '/nav.php');
?>

<div class="section">
    <div class="container">

        
            <div class="col-md-12"><h1>Ganancia Obtenida: $<?php echo $ganancia  ?></h1>
            <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>

                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Cliente</th>
                        <th>Cabania</th>
                        <th>Costo</th>
                        <th>Comision</th>
                        <th>Operacion</th>

                    </tr>

                    </thead>
                    <tbody>


                    <?php if (isset($lista)) { ?>

                            <?php foreach ($lista as $i){ ?>
                    <tr>
                        <td>    <?php echo $i->inicio; ?> </td>
                        <td>    <?php echo $i->fin; ?> </td>
                        <td>    <?php echo $i->idCliente; ?> </td>
                        <td>    <?php echo $i->idCabania; ?> </td>
                        <td>    <?php echo "$". $i->costo; ?> </td>
                        <td>    <?php echo "$". $i->comision; ?> </td>
                        


                        <td>
                            <a href="<?php echo $helper->url("reserva","borrar"); ?>&id=<?php echo $i->id; ?>" class="btn btn-danger">Borrar</a>
                            
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



</script>
</body>
</html>