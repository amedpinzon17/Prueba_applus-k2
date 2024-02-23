<?php 

require_once(__DIR__."/../config/config.php");

$dataPrdoduc = new Product();

$producto4 = isset($_GET['categoria']) ? $_GET['categoria'] : null;

$dataPrdoduc->setCategoria($producto4);

$record1 = $dataPrdoduc->selectProductOne();

$valProduct = isset($record1[0]) ? $record1[0] : null;

if (isset($_POST['editar'])) {
    $dataPrdoduc->setCodigo($_POST['codigo']);
    $dataPrdoduc->setNombre($_POST['nombre']);
    $dataPrdoduc->setPrice($_POST['price']);
    $dataPrdoduc->setCreated($_POST['created']);
    $dataPrdoduc->setUpdated($_POST['updated']);

    $dataPrdoduc->updateProduct();
    echo "<script>alert('actualizado exitosamente');document.location='./product.php'</script>";
}

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
            <label for="codigo" class="form-label">codigo</label>
            <input type="text" id="codigo" name="codigo" class="form-control" value="<?php echo $valProduct['codigo']; ?>" />
        </div>
        <div class="mb-1 col-12">
            <label for="nombre" class="form-label">nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $valProduct['nombre']; ?>" />
        </div>
        <div class="mb-1 col-12">
            <label for="price" class="form-label">price</label>
            <input type="text" id="price" name="price" class="form-control" value="<?php echo $valProduct['price']; ?>" />
        </div>
        <div class="mb-1 col-12">
            <label for="created" class="form-label">created</label>
            <input type="date" id="created" name="created" class="form-control" value="<?php echo $valProduct['created']; ?>" />
        </div>
        <div class="mb-1 col-12">
            <label for="updated" class="form-label">Updated</label>
            <input type="date" id="updated" name="updated" class="form-control" value="<?php echo $valProduct['updated']; ?>" />
        </div>

        <div class="col-12 m-2">
            <input type="submit" class="btn btn-primary" value="UPDATE" name="editar" />
        </div>
    </form>
</div>

  

</body>
</html>