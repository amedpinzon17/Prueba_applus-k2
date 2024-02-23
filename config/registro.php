<?php

if(isset($_POST['guardarCategory'])){
    require_once("config.php");


    $category = new Category();

    $category ->setNombre($_POST['nombre']);
    $category ->setCreatedAt($_POST['createdAt']);
    $category ->setUpdatedAt($_POST['updatedAt']);


    $category -> insertCategoryData();
    echo "<script> alert('los datos fueron guardados');document.location='../index.php'</script>";
}


/* ------------------------------------------------------------------- */

if(isset($_POST['guardarProduct'])){
    require_once("config.php");


    $producto = new Product();
    
    $producto -> setCategoria($_POST['categoria']);
    $producto -> setCodigo($_POST['codigo']);
    $producto -> setNombre($_POST['nombre']);
    $producto -> setPrice($_POST['price']);
    $producto -> setCreated($_POST['created']);
    $producto -> setUpdated($_POST['updated']);

    $producto ->insertProduct();
    echo "<script> alert('los datos fueron guardados');document.location='./../product/product.php'</script>";

}
?>