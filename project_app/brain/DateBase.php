<?php


namespace project_app\brain;

use PDO;
use PDOException;

class DateBase
{
    public $db;

    function __construct()
    {
        $settings = require 'project_app/config/settings.php';
        try {
            $this->db = new PDO('mysql:host=' . $settings['host'] . ';
        dbname=' . $settings['db'],
                $settings['user'], $settings['password']);
        } catch (PDOException $e) {
            print_r($e);
            //  exit();
        }
    }

    function query($sql, $papams = null)
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($papams)) {
            foreach ($papams as $key => $val) {
                $stmt->bindValue(':' . $key, $val);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll();
       // return $stmt               а так почему то не работает
    }
 //   function column($sql,$params = null){
   //     $result = $this->query($sql,$params);
     //   $result->fetchColumn();
      //  return $result;
    //}
}