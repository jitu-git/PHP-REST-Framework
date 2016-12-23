<?php

namespace App\System;
use App\System\Model;

class Controller {

    public $model;

    private $control_db;

    public function __construct() {
        $this->model = !isset($this->model) ? get_class($this) : $this->model;
        $this->control_db = Model::setModel($this->model);
        $this->getResults();
        #$this->setModelToDB();
    }

    public function getModel() {
        return $this->model;
    }

    private function setModelToDB() {
        $this->control_db = new Model($this->model);
    }

    public function getResults() {
        Model::res();
    }
} 