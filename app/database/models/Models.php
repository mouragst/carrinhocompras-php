<?php

namespace app\database\models;
use app\database\Connect;

abstract class Models {

    protected $connect;

    public function __construct() {
        $this->connect = Connect::connect();
    }

}
