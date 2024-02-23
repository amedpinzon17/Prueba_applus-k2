<?php 

require_once(__DIR__."../config/config.php");

$dataCatego = new Category();
$category4 = $_GET['id'];
$dataCatego -> setId($category4);

$record1 = $dataCatego ->selectOneCategory();
$valCate = $record1[0];

if(isset($_POST['editar'])){
    $dataCatego -> setNombre($_POST['nombre']);
    $dataCatego -> setCreatedAt($_POST['createdAt']);
    $dataCatego -> setUpdatedAt($_POST['updatedAt']);

    $dataCatego->updateCategory();
    echo "<script>alert('actualizado exitosamente');document.location='./index.php'</script>";

} 
/* require_once(__DIR__."../config/config.php");

$dataCatego = new Category();
$category4 = $_GET['id'];
$dataCatego->setId($category4);

$record1 = $dataCatego->selectOneCategory();
$valCate = $record1[0];

if(isset($_POST['editar'])){
    // Crear una nueva instancia para actualizar los datos
    $dataCategoUpdate = new Category();

    // Configurar los datos para la actualización
    $dataCategoUpdate->setId($category4);
    $dataCategoUpdate->setNombre($_POST['nombre']);
    $dataCategoUpdate->setCreatedAt($_POST['createdAt']);
    $dataCategoUpdate->setUpdatedAt($_POST['updatedAt']);

    // Actualizar los datos
    $dataCategoUpdate->updateCategory();
    
    echo "<script>alert('actualizado exitosamente');document.location='./index.php'</script>";
} */

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: beige;">


<!-- MODAL PARA EDITAR DATOS -->

<div class="container d-flex align-items-center justify-content-center bg-light-subtle" style="height: 100vh; width: 30rem;">
    <form class="col d-flex flex-wrap" action="" method="post">
        <div class="mb-1 col-12">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $valCate['nombre']; ?>" />
        </div>
        <div class="mb-1 col-12">
            <label for="createdAt" class="form-label">CreatedAt</label>
            <input type="text" id="createdAt" name="createdAt" class="form-control" value="<?php echo $valCate['createdAt']; ?>" />
        </div>
        <div class="mb-1 col-12">
            <label for="updatedAt" class="form-label">UpdatedAt</label>
            <input type="text" id="updatedAt" name="updatedAt" class="form-control" value="<?php echo $valCate['updatedAt']; ?>" />
        </div>

        <div class="col-12 m-2">
            <input type="submit" class="btn btn-primary" value="UPDATE" name="editar" />
        </div>
    </form>
</div>
  

</body>
</html>