<?php
require_once("articulo.php");


// Creamos la lista de articulos de la página web
$lista_articulos = array( 
    "boli" => new Articulo("boli","Bolígrafo", "Bolígrafo de gel de punta fina azul", 1.45, "images/boligrafo.png"),
    "goma" => new Articulo("goma","Goma de Borrar", "Goma de borrar con zona de borrado de bolígrafo", 0.35, "images/goma.png"),
    "cuaderno" => new Articulo("cuaderno","Cuaderno", "Libreta de rayas de tamaño A5", 1.10, "images/cuaderno.png"),
    "lapiz" => new Articulo("lapiz","Lápiz", "Lápiz de punta fina de 0.5 mm", 0.55, "images/lapiz.png")   
);

?>