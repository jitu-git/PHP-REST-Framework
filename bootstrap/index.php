<?php
use App\System\Model;
$current_path = $_SERVER['REQUEST_URI'];

$class = Model::controllerClass();
$namespace = 'App\Http\Controller\\' . $class;
$newObj = new $namespace;
