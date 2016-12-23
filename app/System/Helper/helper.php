<?php

function pr($array,$die = true) {
    echo "<pre>";
    print_r($array);
    if($die == true)
        die;
    echo "</pre>";
}

function setTableName($table) {
    $table = strtolower(strtoupper($table));
    if(substr($table, -1) != "s" ) {
        $table = $table . 's';
    }
    return $table;
}

function getClassName() {

}
?>