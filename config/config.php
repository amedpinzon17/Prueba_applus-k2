<?php



require_once("db.php");
require_once("conectar.php");

class Category extends Conexion {

    private $id;
    private $nombre;
    private $createdAt;
    private $updatedAt;

    public function __construct($id = 0, $nombre="", $createdAt="", $updatedAt="", $dbCnx= ""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        parent::__construct($dbCnx);
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    /* ---------------------------------- */

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    /* ---------------------------------- */

    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(){
        return $this->createdAt;
    }

    /* ---------------------------------- */

    public function setUpdatedAt($updatedAt){
        $this->updateAt = $updatedAt;
    }

    public function getUpdateAt(){
        return $this->updatedAt;
    }

    /* ---------------------------------- */

    public function insertCategoryData(){
        try{
            $stm = $this->dbCnx->prepare("INSERT INTO category2(nombre, createdAt, updatedAt) VALUES (?,?,?)");
            $stm->execute([$this->nombre, $this->createdAt, $this->updatedAt]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function selectCategoryAll(){
        try{
            $stm = $this->dbCnx->prepare("SELECT * FROM category2");
            $stm->execute();
            return $stm->fetchAll();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function categoryDelete(){
        try{
            $stm = $this->dbCnx->prepare("DELETE FROM category2 WHERE id=?");
            $stm->execute([$this->id]);
            echo "<script>alert('borrado exitosamente');document.location='./index.php'</script> ";/* cambiar la ruta */
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function selectOneCategory(){
        try{
            $stm = $this->dbCnx->prepare('SELECT * FROM category2 WHERE id=?');
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function updateCategory(){
        try{
            $stm = $this->dbCnx->prepare('UPDATE category2 SET nombre = ?, createdAt = ?, updatedAt = ? WHERE id=?');
            $stm->execute([$this->nombre, $this->createdAt, $this->updatedAt, $this->id]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}


/* --------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------- */




class Product extends Conexion {
    private $categoria;
    private $codigo;
    private $nombre;
    private $price;
    private $crated;
    private $updated;
    
     public function __construct($categoria = 0, $codigo = "", $nombre = "", $price ="", $created = "", $updated="", $dbCnx = ""){
        $this -> categoria = $categoria;
        $this -> codigo = $codigo;
        $this -> nombre = $nombre;
        $this -> price = $price;
        $this -> created = $created;
        $this -> updated = $updated;
        parent:: __construct($dbCnx);
    }



     public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getCategoria(){
        return $this->categoria;
    }

/* ----------------------------------------------------- */



public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getCodigo(){
        return $this->codigo;
    }

/* ----------------------------------------------------- */


public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

/* ----------------------------------------------------- */

public function setPrice($price) {
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }

/* ----------------------------------------------------- */


public function setCreated($created) {
        $this->created = $created;
    }

    public function getCreated(){
        return $this->created;
    }

/* ----------------------------------------------------- */


public function setUpdated($updated) {
        $this->updated = $updated;
    }

    public function getUpdated(){
        return $this->updated;
    }

/* ----------------------------------------------------- */




public function insertProduct(){
    try{
         $stm = $this -> dbCnx -> prepare('INSERT INTO product3(codigo, nombre, price, created, updated) VALUES (?,?,?,?,?)');
            $stm -> execute([$this -> codigo, $this -> nombre, $this -> price, $this -> created, $this -> updated]);
    }catch(Exception $e){
        return e->getMessage();
    }
}


 public function selectProductAll(){
        try{
            $stm = $this -> dbCnx -> prepare('SELECT * FROM product3');
            $stm -> execute();
            return $stm->fetchAll();
        }catch(Exception $e){
            return $e -> getMessage();
        }
    }


    public function deleteProduct(){
        try{ 
        $stm = $this -> dbCnx -> prepare('DELETE FROM product3 WHERE categoria=?');
        $stm ->execute([$this -> categoria]);
        return $stm->fetchAll();
        echo "<script>alert('borrado exitosamente');document.location='../product/product.php'</script> " ;
    }catch(Exception $e){
        return $e->getMessage();
    }
}


public function selectProductOne(){
        try{
            $stm = $this ->dbCnx -> prepare('SELECT * FROM product3 WHERE categoria=?');
            $stm ->execute([$this ->categoria]);
            return $stm -> fetchAll();
        }catch(Exception $e){
            return $e -> getMessage();
        }
    }

    public function updateProduct(){
        try{
            $stm = $this -> dbCnx -> prepare('UPDATE product3 SET codigo = ?, nombre = ?, price = ?, created = ?, updated = ? WHERE categoria=?');
            $stm -> execute([$this -> codigo, $this -> nombre, $this -> price, $this -> created, $this -> updated, $this -> categoria]);
        }catch(Exception $e){
            return $e -> getMessage();
        }
    }






}
?>
