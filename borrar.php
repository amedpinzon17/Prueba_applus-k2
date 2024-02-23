<?php 
require_once(__DIR__ . "../config/config.php");

$recordCatego = new Category();

if(isset($_GET['id']) && isset ($_GET['req'])){
    if($_GET['req'] == "delete"){
        $recordCatego->setId($_GET['id']);
        $recordCatego->categoryDelete();
        echo "<script> alert('Datos borrados');document.location='./index.php'</script>";
    }
}

?>