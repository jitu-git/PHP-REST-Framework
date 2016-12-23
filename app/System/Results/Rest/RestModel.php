<?php

namespace App\System\Results\Rest;

use App\Config\ConfigProvider;
use App\System\Model;

class RestModel {

    private static $config;

    private static $id;

    public function __construct() {
        $this->methods();
        self::getConfig();
    }

    public static function methods() {
        self::getConfig();
        return self::getUriSegment() . '_' . self::getCurrentMethod();
    }

    /**
     * Get current method name
     *
     * @method getCurrentMethod
     * @return string
     */
    private static function getCurrentMethod() {
        return strtolower(strtoupper($_SERVER['REQUEST_METHOD']));
    }


    /**
     *  Load config file
     *
     * @method getConfig
     */
    public static function getConfig() {
        return self::$config = ConfigProvider::getConfig("Config");
    }


    /**
     * @method getUriSegment
     * @return bool|string
     */
    public static function getUriSegment() {
        $methods = self::getMethod();
        if($methods){
            return $methods;
        }else{
            return "index";
        }
    }

    /**
     * @method getClassFromUrl
     * @return bool
     */
    private static function getMethod() {
        $methods = Model::getClassFromUrl();
        if($methods ){
            $class = explode("/",$methods[0]);
            $class = array_filter($class,function($val) {return ($val != "");});
            return self::url_ids($class);
        }else{
            return false;
        }
    }

    /**
     * find and set id from url to results class
     *
     * @param $url
     * @return bool|mixed|string
     */
    private static function url_ids($url) {
        if(count($url) > 1){
            $action = end($url);
            self::setId($action);
            return is_numeric($action) == true ? "id" : ($action == null &&  $action != strtolower(Model::getModel()) ? "index" : $action);
        }else{
            return false;
        }
    }

    private static function setId($id) {
        if(is_numeric($id))
        self::$id = $id;
    }

    public static function getId() {
        return self::$id;
    }
} 