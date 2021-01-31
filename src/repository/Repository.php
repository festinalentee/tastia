<?php

require_once __DIR__.'/../../Database.php';

class Repository {

    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }
}
//wzorzec projektowy - aby instancja tworzyla sie jako pojedynczy obiekt istniejacy w calym programie