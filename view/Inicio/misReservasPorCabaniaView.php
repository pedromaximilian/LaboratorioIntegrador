<?php



include(dirname(__DIR__) . '/navPropietario.php');
//return var_dump($lista);
?>


<div class="section">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1>Reservas - Por Cabaña</h1>
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>

                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Cliente</th>
                            <th>Cabania</th>
                            <th>Ganancia</th>


                        </tr>

                    </thead>
                    <tbody>


                        <?php if (isset($lista)) { ?>

                            <?php foreach ($lista as $i) { ?>
                                <tr>
                                    <td> <?php echo $i->inicio; ?> </td>
                                    <td> <?php echo $i->fin; ?> </td>
                                    <td> <?php echo $i->idCliente; ?> </td>
                                    <td> <?php echo $i->idCabania; ?> </td>
                                    <td> <?php echo $i->ganancia; ?> </td>

                                </tr>

                            <?php } ?>
                        <?php  } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




</body>

</html>