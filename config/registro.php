<?php

if(isset($_POST['guardarCategory'])){
    require_once("config.php");


    $category = new Category();

    $category ->setNombre($_POST['nombre']);
    $category ->setCreatedAt($_POST['createdAt']);
    $category ->setUpdatedAt($_POST['updatedAt']);


    $category -> insertCategoryData();
    echo "<script> alert('los datos fueron guardados');document.location='./index.php'</script>";
}

?>