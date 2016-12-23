<?php

namespace App\Database\Mysql;

use App\Database\DbConnection;
use \PDO;

class Connection extends DbConnection {

    private $host, $username, $password, $database, $port, $socket;

    public $connection, $prefix;

    public function __construct() {
        $this->dbConfig();
    }

    public function connect() {
        try{
            $this->connection = new PDO("mysql:dbname=". $this->database. ";host=". $this->host .";charset=utf8", $this->username, $this->password);
        }catch(\PDOException $e){
            die($e->getMessage());
        }
    }

    /**
     *  set db config
     */
    private function DbConfig() {
        $this->connection();
        foreach($this->dbSettings as $setting => $value) {
            $this->{$setting} = $value;
        }
        $this->connect();
    }

    /**
     * @return mixed
     */
    public function getConnection() {
        return $this->connection;
    }

    public static function DB() {
        $db = new Connection();
        $db->connect();
        return $db;
    }
}
