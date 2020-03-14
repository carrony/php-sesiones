<?php 
    $title="Inicio - Tienda Online"; 
    require_once("cabecera.php");

    require_once("listaArticulos.php");
?>

<!-- Aquí dentro va el código de esta página -->

<h2>Listado de productos de la tienda</h2>
<!-- Crearemos un listado de productos con tantos elemento como artículos tengamos -->
<ul class='articulo'>
    <?php 
    foreach ($lista_articulos as $articulo) {
    ?>
        <li>
            <img src="<?php echo $articulo->getImagen();?>" alt="<?php echo $articulo->getDescripcion();?>">
            <div>
                <h3><?php echo $articulo->getNombre(); ?></h3>
                <p> <?php echo $articulo->getDescripcion();?> </p>
            </div>
            <p class="precio"> <?php echo $articulo->getPrecio(); ?> €</p>
            <a href="addCarrito.php?id=<?php echo $articulo->getId();?>" ><img src="images/carrito.png" alt="Añadir al carrito"></a>
        </li>
   <?php } ?>
</ul>


<?php require_once("pie.php"); ?>
