<?php


namespace App\System;
use App\System\Results\GetResults;
use App\System\Results\Rest\RestModel;

class Model {

    private static $model, $config;

    public function __construct($model) {
        self::setModel($model);
    }


    /**
     * set model name automatic
     *
     * @param $model
     */
    public static function setModel($model) {
        self::$model = self::setModelName($model);
    }

    /**
     * get all results
     */
    public static function res() {
        GetResults::results(self::$model);
    }

    /**
     * get model name
     *
     * @return mixed
     */
    public static function getModel() {
        return self::$model;
    }

    /**
     * set model name by url
     *
     * @param $model
     * @return string
     */
    private static function setModelName($model) {
        if(strpos($model,"Controller") === false) {
            return $model;
        }else{
            $find_model = explode("\\", $model);
            $new_model = end($find_model);
            return setTableName($new_model);
        }
    }


    /**
     * get class name from url
     *
     * @method getClassFromUrl
     * @return array
     */
    public static function getClassFromUrl() {
        self::$config = RestModel::getConfig();
        $url = $_SERVER['REQUEST_URI'];
        $methods = explode(self::$config->base_path,$url);
        $methods = array_filter($methods,function($val) {return ($val != '/');});
        return array_values($methods);

    }

    public static function controllerClass() {
        $class = self::getClassFromUrl();
        if(isset($class[0])){
            return explode("/",$class[0])[1];
        }else{
            return self::$config->default_controller;
        }
    }
} 