<?php

interface CommandInterface {

    public function getName();

    public function execute();

    public function help();
}