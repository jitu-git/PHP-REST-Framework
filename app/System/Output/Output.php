<?php
/**
 * Created by PhpStorm.
 * User: Jitendra
 * Date: 12/20/16
 * Time: 3:03 PM
 */

namespace App\System\Output;


class Output {

    private $output = array(), $status = 200;

    public function __construct($output, $status) {
        $this->output = $output;
        $this->status = $status;
        $this->setOutput();
    }

    private function setOutput() {
        http_response_code($this->status);
        echo json_encode($this->output);
    }
} 