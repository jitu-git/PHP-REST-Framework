<?php
/**
 * Created by PhpStorm.
 * User: Jitendra
 * Date: 12/18/16
 * Time: 5:20 PM
 */

namespace App\System\Results;


interface Result {

    public static function index_get();

    public function index_post();

    public function id_get();

    public function id_post();

    public function id_delete();

    public function id_put();
}