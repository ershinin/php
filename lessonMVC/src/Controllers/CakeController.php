<?php


namespace Cakes\Controllers;


use Cakes\Db\CakesDb;
use Cakes\Kernel\FileHandler;

class CakeController
{
    private $cakeDB;

    public function __construct(){
        $this->cakeDB = new CakesDb();
    }

    public function getCakesPreviews() {
        $cakes = $this->cakeDB->getAllCakesShort();
        if ($cakes) echo json_encode($cakes);
        else echo json_encode([]);
    }

    public function getCake() {
        $get = $_GET;
        $cakes = $this->cakeDB->getCakeById($get['id']);
        if ($cakes) echo json_encode($cakes);
        else echo json_encode(null);
    }

    public function findCakes() {
        $get = $_GET;
        $cakes = $this->cakeDB->getFilteredCakes($get['title'], $get['priceFrom'], $get['priceTo']);
        if ($cakes) echo json_encode($cakes);
        else echo json_encode([]);
    }

    public function addCake() {
        $post = $_POST;
        if ($this->cakeDB->getCakeByTitle($post['title'])) {
            $this->sendError(1);
            return;
        }
        $loadedImage = FileHandler::loadImageFile();
        if (!$loadedImage) {
            $this->sendError(3);
            return;
        }
        if (!$this->cakeDB->addNewCake($post['title'], $post['price'], $post['description'], $loadedImage)) {
            $this->sendError(2);
            return;
        }
        echo json_encode([
            'message' => 'SUCCESS'
        ]);
    }

    private function sendError($code) {
        echo json_encode([
            'message' => 'ERROR',
            'reason' => $code
        ]);
    }
}