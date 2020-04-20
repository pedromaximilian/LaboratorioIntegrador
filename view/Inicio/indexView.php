<?php


include(dirname(__DIR__) . '/nav_default.php');

if (count($lista)<=0){
    echo '<script> alert("No se encontraron cabañas disponibles en estas fechas") </script>';

}

?>
<style>
    .carousel .item {
        height: 300px;
    }

    .item img {
        position: absolute;
        object-fit: contain;
        top: 0;
        left: 0;
        min-height: 300px;
    }
</style>

<div class="container">



</div>

<?php if (isset($lista)) { ?>

    <?php foreach ($lista as $i) { ?>
        <div class="section form-group">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <div id="<?php echo $i->id ?>" class="carousel slide" data-ride="carousel">


                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">

                                <?php //return var_dump( count($i->imagenes)) ?>

                                <?php if (isset($i->imagenes) && count($i->imagenes)>0) { ?>
                                    <?php for ($x = 0; $x < count($i->imagenes); $x++) { ?>
                                        <?php if ($x == 0) { ?>
                                            <div class="item active max">
                                                <img src="../images/<?php echo $i->imagenes[$x]->uri ?>"
                                                     class="img-responsive">
                                            </div>
                                        <?php } else { ?>

                                            <div class="item">
                                                <img src="../images/<?php echo $i->imagenes[$x]->uri ?>"
                                                     class="img-responsive">
                                            </div>

                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <?php if (!isset($i->imagenes)  || count($i->imagenes)==0) { ?>
                                    <div class="item active max">
                                        <img src="https://i.imgur.com/RzfOP05.png" class="img-responsive">
                                    </div>

                                <?php } ?>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#<?php echo $i->id ?>" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="right carousel-control" href="#<?php echo $i->id ?>" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Proximo</span>
                            </a>
                        </div>

                    </div>
                    <div class="col-md-6">

                    <h1><?php echo $i->localidad ?></h1>
                    <h3><?php echo $i->domicilio ?></h3>
                    <h3><?php echo "Capacidad: " . $i->capacidad . " personas" ?></h3>
                    <h3><?php echo "$" . $i->precio ?> por día</h3>
                    <h3></h3>

                    <p><?php echo $i->observaciones ?></p>
                </div>
            </div>
        </div>
        </div>

    <?php } ?>
<?php } ?>

<style>
    .footer {
    padding: 10px 0 10px 0;
    background-color: #35404f;
    color: #878c94;
    
    
}


</style>
<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">

        
        <div class="row text-center"> © 2020. Hecho por Pedro Lucero.</div>
        </div>
        
    </div>  
    </footer>
<!-- Footer -->
</body>

</html>