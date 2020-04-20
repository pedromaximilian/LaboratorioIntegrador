<?php


include(dirname(__DIR__) . '/nav.php');
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form role="form"  action="<?php echo $helper->url("Reporte","gananciaPorCabania"); ?>" method="post" class="col-lg-5">
                    <div class="form-group" hidden>
                        <input  class="form-control" type="text" name="id" value="">
                    </div>
                    
                    
                    
                    
                    <div class="form-group">
                        <label class="control-label">Cabañas</label>

                        <select name="id" class="form-control seleccion"/>


                        <?php foreach($lista as $item) {


                                echo "<option value=\"$item->id\"> $item->domicilio </option> ";

                        }
                        ?>
                        </select>
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