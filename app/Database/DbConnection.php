<?php

namespace App\Database;
use App\Config\ConfigProvider;

abstract class DbConnection implements DbInterface {

    protected $dbSettings, $dbConfig, $DB, $model = "Database";

    public function connection() {
        $this->dbConfig = ConfigProvider::getConfig($this->model);
        $this->dbSettings = $this->dbConfig->getDbSettings();
    }
} 