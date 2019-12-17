<?php


namespace project_app\brain;
use project_app\brain\DateBase;

abstract class Model
{
    public $db;
    function __construct()
    {
        $this->db = new DateBase();
    }
}