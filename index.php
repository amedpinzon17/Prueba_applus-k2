
<?php

require_once(__DIR__ ."../config/config.php");

$data = new Category(0, "nombre", "createdAt", "updatedAt", "dbCnx");

$all = $data->selectCategoryAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla - Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body ng-app="myApp">


<div ng-controller="MyCtrl">
    <div class="titulo">
        <h2>prueba con PHP, MySQL y AngularJS</h2>
        <h4> Tabla Category</h4>
    </div>
        
    <div class="botonesEnlaces">
        <a href="./product/product.php" class="enlace">Product</a>
        <a href="./consultas/consulta1.php" class="enlace">Consulta 1 - Libros Prestados</a>
        <a href="./consultas/consulta2.php" class="enlace">Consulta 2 - Libros No Devueltos en 7 días</a>
         <button type="button" class="btn btn-primary  boton"  data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button>
    </div>

       
<div class="table container">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">CreatedAt</th>
        <th scope="col">UpdatedAt</th>
        <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach($all as $key => $val) {  ?>
        <tr ng-repeat="category in categories">
          <td><?php echo $val['id']; ?></td>
          <td><?php echo $val['nombre']; ?></td>
          <td><?php echo $val['createdAt']; ?></td>
          <td><?php echo $val['updatedAt']; ?></td>

        <td>
                <a class="btn btn-danger" href="borrar.php?id=<?= $val['id']?>&req=delete">Borrar</a>
                <a class="btn btn-warning" href="editar.php?id=<?= $val['id']?>">Editar</a>
        </td>
        <?php } ?>
        </tr> 
    </tbody>
    </table>
    </div>
</div>
   
   






<!-- MODAL PARA AGRAGAR MAS ELEMENTOS A LA TABLA -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="col d-flex flex-wrap" action="./config/registro.php" method="post">
            <div class="mb-1 col-12">
                <label for="nombre" class="form-label">Nombre</label>
                <input 
                  type="text"
                  id="nombre"
                  name="nombre"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
              <label for="createdAt" class="form-label">CreatedAt</label>
                <input 
                  type="date"
                  id="createdAt"
                  name="createdAt"
                  class="form-control"  
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="updatedAt" class="form-label">UpdatedAt</label>
                <input 
                  type="date"
                  id="updatedAt"
                  name="updatedAt"
                  class="form-control"  
                 
                />
              </div>
            <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="guardarCategory" name="guardarCategory"/>
            </div>
         </form>
            </div>
        </div>
        </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




</body>
</html>