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
            $stm = $this->dbCnx->conexion("INSERT INTO category2(nombre, createdAt, updatedAt) VALUES (?,?,?)");
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
            $stm = $this->dbCnx->prepare('UPDATE category2 SET nombre = ?, createdAt = ?, updateAt = ? WHERE id=?');
            $stm->execute([$this->nombre, $this->createdAt, $this->updatedAt, $this->id]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
?>
