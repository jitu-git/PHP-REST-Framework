<?php

namespace App\Config;


class ConfigProvider {

    private $config,
    $namespace = __NAMESPACE__;



    public function __construct($config) {
        $this->config = $this->namespace . '\\' . $config;
    }

    private function config() {
        return new $this->config;
    }

    public static function getConfig($config) {
        $ab = new ConfigProvider($config);
        return $ab->config();
    }
} 