<?php

namespace App\System\Results\Rest;
use App\Database\Mysql\Connection;
use App\System\Model;
use App\System\Output\Output;

class IndexGet {

    private $DB;

    public function __construct() {
        $this->DB = new Connection();
        $this->result();
    }

    public function result() {
        $table = Model::getModel();
        $sth = $this->DB->connection->prepare("SELECT * FROM ". $this->DB->prefix.strtolower($table));
        $sth->execute();
        $res = $sth->fetchAll(\PDO::FETCH_OBJ);
        new Output(array(
            "data" => $res,
            "status" => true
        ),200);
    }
}