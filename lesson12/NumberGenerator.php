<?php
require_once 'lib/CommandInterface.php';

class NumberGenerator implements CommandInterface {

    public function getName()
    {
        return 'numgen';
    }

    public function execute()
    {
        echo mt_rand(0, 10000);
    }

    public function help()
    {
        return 'Генерирует случайное целое число';
    }
}