<?php
namespace App\Config;

class Database {

    private $setting = array();

    public $default = "Mysql";

    public function __construct() {
        $this->setDbSettings();
    }

    public function setDbSettings() {
        $this->setting =  [
            "host" => "localhost",
            "database" => "minmarks_new",
            "username" => "root",
            "password" => "",
            "port" => 3306,
            "socket" => 'MySQL',
            "prefix" => 'mm_'
        ];
    }

    /**
     * @return array
     */
    public function getDbSettings() {
        return $this->setting;
    }
} 