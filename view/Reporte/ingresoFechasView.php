
<?php


include(dirname(__DIR__) . '/nav.php');
?>
<div class="section">
    <div class="container">
        <h1>Busqueda de cabañas</h1>
        <div class="row">
            <div class="col-md-12">
                <form role="form"  action="<?php echo $helper->url("Reporte","gananciaPorFechas"); ?>" method="post" class="col-lg-3">


                    <div class="form-group">
                        <label class="control-label">Fecha Inicio</label>
                        <input class="form-control" type="date" name="inicio" >
                    </div>
                    <div class="form-group">
                        <label class="control-label">Fecha Fin</label>
                        <input class="form-control" type="date" name="fin" >
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar
                        <br>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>