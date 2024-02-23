
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>
<body ng-app="myApp">


<div ng-controller="MyCtrl">
        <h1>proyecto con PHP, MySQL y AngularJS</h1>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach($all as $key => $val) {  ?>
        <tr ng-repeat="category in categories">
          <td>{{ category.id }}</td>
          <td>{{ category.nombre }}</td>
          <td>{{ category.createdAt }}</td>
          <td>{{ category.updatedAt }}</td>

        <td>
                <a class="btn btn-danger" href="borrar.php?id=<?= $val['id']?>&req=delete">Borrar</a>
                <a class="btn btn-warning" href="#">Editar</a>
                    </td>

        <?php } ?>
        </tr>
        
    </tbody>
    </table>
</div>
   
   






<!-- MODAL PARA AGRAGAR MAS ELEMENTOS A LA TABLA -->


        
        
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
   var app = angular.module('myApp', []);

app.controller('MyCtrl', function($scope,) {
    $scope.categories = <?php echo json_encode($all); ?>;

});




</script>
</body>
</html>