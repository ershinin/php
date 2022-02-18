<?php
namespace Cakes\Db;

use Cakes\Kernel\DBConnection;
use PDO;

class CakesDb
{
    private $dbConnection;

    public function __construct(){
        $this->dbConnection = DbConnection::getInstance()->getConnection();
    }

    public function getAllCakesShort(){
        $sql = "SELECT id, title, price, image FROM cakes ;";
        $statement = $this->dbConnection->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCakeById($id){
        $sql = "SELECT * FROM cakes WHERE id = ? ;";
        $statement = $this->dbConnection->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getCakeByTitle($title){
        $sql = "SELECT * FROM cakes WHERE title = ? ;";
        $statement = $this->dbConnection->prepare($sql);
        $statement->execute([$title]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function addNewCake($title, $price, $description, $image){
        $sql = "INSERT INTO cakes (title, price, description, image) VALUE (:title_param, :price_param, :desc_param, :image_param) ;";
        $statement = $this->dbConnection->prepare($sql);
        return $statement->execute([
            'title_param' => $title,
            'price_param' => $price,
            'desc_param' => $description,
            'image_param' => $image,
        ]);
    }

    public function getFilteredCakes($title, $priceFrom, $priceTo){
        $params = [
            'price_From' => $priceFrom,
            'price_To' => $priceTo,
        ];
        if ($title) {
            $sql = "SELECT id, title, price, image FROM cakes WHERE price >= :price_From AND price <= :price_To AND title LIKE :title ;";
            $params = array_merge($params, ['title' => '%'.$title.'%']);
        } else $sql = "SELECT id, title, price, image FROM cakes WHERE price >= :price_From AND price <= :price_To;";
        $statement = $this->dbConnection->prepare($sql);
        $statement->execute($params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}