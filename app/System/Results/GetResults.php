<?php


namespace App\System\Results;

use App\System\Results\Rest\IndexGet;
use App\System\Results\Rest\IdGet;
use App\System\Results\Rest\RestModel;


class GetResults implements Result{

    private static $instance;
    public static $results;


    public function __construct() {

    }
    public static function index_get() {
        new IndexGet();
    }

    public function index_post() {
        echo __FUNCTION__;
    }

    public function id_get() {
        new IdGet();
    }

    public function id_post() {
        echo __FUNCTION__;
    }

    public function id_delete() {
        echo __FUNCTION__;
    }

    public function id_put() {
        echo __FUNCTION__;
    }


    public static function results() {
        #self::index_get();
        $method = RestModel::methods();
        call_user_func('self::'. $method);
    }

} 