<?php

class Executor
{
    private $commands;

    public function __construct($commands)
    {
        $this->commands = $commands;
    }

    public function executeCommand($arguments)
    {
        try {
            if ($arguments[0] === 'list') {
                foreach ($this->commands as $key => $value) {
                    $command = $this->getCommand($value);
                    echo $key . ': ' . $command->help() . PHP_EOL;
                }
                return;
            }
            if (in_array($arguments[0], array_keys($this->commands))) {
                $command = $this->getCommand($this->commands[$arguments[0]]);
                if (isset($arguments[1]) && $arguments[1] === 'help') {
                    echo $command->help();
                } else {
                    echo 'Запускаем команду ' . $command->getName() . '...' . PHP_EOL;
                    $command->execute();
                }
            } else {
                echo 'Команда ' . $arguments[0] . ' не найдена';
            }
        } catch (LogicException $exp) {
            echo "Произошла внутренняя ошибка: " . $exp->getMessage();
        }
    }

    private function getCommand($name) {
        $file = '../' . $name . '.php';
        if (!file_exists($file))
            throw new LogicException("Файл $name.php не найден");
        require_once $file;
        $obj = new $name;
        if (!is_a($obj, CommandInterface::class))
            throw new LogicException("Класс $name не реализует нужный интерфейс");
        return $obj;
    }

}