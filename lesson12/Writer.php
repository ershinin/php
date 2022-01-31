<?php
require_once 'lib/CommandInterface.php';

class Writer implements CommandInterface {

    public function getName()
    {
        return 'writer';
    }

    public function execute()
    {
        $number = mt_rand(1, 15);
        $result = '';
        for ($i = 0; $i <= $number; $i++) {
            $result = $result . chr(mt_rand(65, 90));
        }
        echo $result;
    }

    public function help()
    {
        return 'Генерирует случайную последовательность символов';
    }
}