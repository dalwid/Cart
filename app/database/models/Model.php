<?php

namespace app\database\models;

use app\database\Connect;

abstract class Model
{
    protected $connect;

    public function __construct()
    {
        $this->connect = Connect::connect();
    }
}