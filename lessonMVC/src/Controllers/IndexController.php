<?php
namespace Cakes\Controllers;

use Cakes\Kernel\Controller;

class IndexController extends Controller
{
    public function index(){
        echo $this->getIndex();
    }
}