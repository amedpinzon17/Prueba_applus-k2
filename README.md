# Proyecto PHP, MySQL y AngularJS 

Este proyecto es una aplicación web que utiliza PHP, MySQL y AngularJS (v1). A continuación, se detallan las instrucciones para configurar el entorno y acceder a las diferentes funcionalidades.
## Instalación

### Paso 1: Configuración del entorno

Asegúrate de tener instalado XAMPP para ejecutar el servidor Apache y MySQL.


### Paso 2: Instalación de dependencias AngularJS

Ejecuta el siguiente comando en la raíz del proyecto para instalar las dependencias de AngularJS:

### `npm install`

### Paso 3: Configuración de la base de datos

- Crea una base de datos llamada applus_k2.
- Ejecuta el script SQL proporcionado en database.sql para crear las tablas necesarias.- 
Launches the test runner in the interactive watch mode.\
See the section about [running tests](https://facebook.github.io/create-react-app/docs/running-tests) for more information.

### Rutas

- (http://localhost/applus-k2/index.php)
- (http://localhost/applus-k2/product/product.php)
- (http://localhost/applus-k2/consultas/consulta1.php)
- (http://localhost/applus-k2/consultas/consulta2.php)

## Funcionalidades

### Gestión de Productos

   - Listar productos.
  -  Crear productos.
   - Editar productos.
   - Eliminar productos (se solicitará confirmación al usuario).

### Gestión de Biblioteca

## Entidades

   - Libro:
       - ID (clave primaria)
       - Título
       - Autor

   - Préstamo:
       - ID (clave primaria)
       - Identificador del libro (clave foránea referenciando a Libro)
       - Fecha de préstamo
       - Fecha de devolución
       - Identificador del usuario (clave foránea referenciando a Usuario)

   - Usuario:
       - ID (clave primaria)
       - Nombre
       - Apellido
       - Email

## Consultas

   - Consulta 1 - Libros Prestados:
       - Encuentra el título y el autor de los libros actualmente prestados, junto con el nombre del usuario que los tiene prestados. Incluye también la fecha de préstamo y la fecha de devolución.

   - Consulta 2 - Libros No Devueltos en 7 días:
       - Encuentra los títulos y autores de los libros que fueron prestados hace más de 7 días y aún no han sido devueltos. Incluye el nombre del usuario que los tiene prestados y la fecha de préstamo.
