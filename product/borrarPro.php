<?php 
require_once(__DIR__ ."/../config/config.php");

$recordProdu = new Product();

if(isset($_GET['categoria']) && isset ($_GET['req'])){
    if($_GET['req'] == "delete"){
        $recordProdu->setCategoria($_GET['categoria']);
        $recordProdu->deleteProduct();
        echo "<script> alert('Datos borrados');document.location='./product.php'</script>";
    }
}

?>