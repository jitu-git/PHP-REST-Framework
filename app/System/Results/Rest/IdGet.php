<?php

namespace App\System\Results\Rest;
use App\Database\Mysql\Connection;
use App\System\Output\Output;
use App\System\Model;
use App\System\Results\Rest\RestModel;

class IdGet {

    private $DB;

    public function __construct() {
        $this->DB = new Connection();
        $this->result();
    }

    public function result() {
        $table = Model::getModel();
        $sth = $this->DB->connection->prepare("SELECT * FROM ". $this->DB->prefix.strtolower($table).' WHERE id = :id' );
        $sth->execute(array(":id" => RestModel::getId()));
        $res = $sth->fetchAll(\PDO::FETCH_OBJ);
        if($res ){
            new Output(array(
                "data" => $res,
                "status" => true
            ),200);
        }else{
            new Output(array(
                "data" => $res,
                "status" => false
            ),404);
        }
    }
}