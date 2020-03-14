<?php 
    $title="Inicio - Tienda Online"; 
   

    require_once("listaArticulos.php");
    require_once("carrito.php");
    session_start();

    //Comprobamos si se ha pedido borrar el carrito
    if (isset($_REQUEST["accion"]) and $_REQUEST["accion"]=="reset" ) {
        session_destroy();
        unset($_SESSION["carrito"]);
    }

    $carrito = new Carrito();
    // Comprobamos si existe la variable de sesión que contenga el carrito
    if (isset($_SESSION["carrito"])){
        $carrito = $_SESSION["carrito"];
    } else {
        $carrito = new Carrito();
    }


    // Ahora comprobamos si hay parámetros en la URL
    // eso siginificaría que hay que añadir el artículo
    if (isset($_REQUEST["id"])) {
        // Hay algo, buscamos el articulo y lo añadimos al carrito
        $id = $_REQUEST["id"];
        // Recogemos el articulo del array de articulos.
        $articulo = $lista_articulos[$id];
        // añadimos el articulo al carrito
        $carrito->addArticulo($articulo);
        //Guardamos el carrito en la session para actualziarlo
        $_SESSION["carrito"] = $carrito;
    } 

    require_once("cabecera.php");
?>

<!-- Aquí dentro va el código de esta página -->
<p><a href="index.php">Inicio</a></p>

<h2>Contenido del carrito</h2>
<?php
    if ($carrito->getSize()!=0) {
?>
    
<ul class='articulo'>
    <?php 
    foreach ($carrito->getLineas() as $linea) {
    ?>
        <li>
            <img src="<?php echo $linea->getArticulo()->getImagen();?>" alt="<?php echo $linea->getArticulo()->getDescripcion();?>">
            <h3><?php echo $linea->getArticulo()->getNombre(); ?></h3>
            <p class="precio"> <?php echo $linea->getArticulo()->getPrecio(); ?> €</p>
            <p class="unidades"> <?php echo $linea->getUnidades();?> Unidades</p>
        </li>
   <?php } ?>
</ul>
    <div class="resumen">
        <a href="addCarrito.php?accion=reset"><img src="images/vaciar-carrito.png" alt="Vaciar Carrito"></a>
        <div class="total">
            <p>Total </p>
            <p>Unidades: <?php echo $carrito->getTotalUnidades()?></p>
            <p>TOTAL: <?php echo $carrito->getTotal()?>€</p>
        </div>

    </div>
<?php } else {?>
    <h3>No se han añadido articulos al carrito</h3>
<?php } ?>


<?php require_once("pie.php"); ?>
