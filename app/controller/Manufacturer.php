<?php

namespace app\controller;

use app\model\Database;

class Manufacturer
{
    private $conn;

    public function __construct()
    {
        // Getting database object
        $this->conn = (new Database())->getmyDB();
    }

    // Getting all Manufacturer details
    public function get()
    {
        $stmt = $this->conn->prepare("SELECT id, name FROM manufacturer order by created_at DESC");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    // Creating new Manufacturer
    public function create($name)
    {
        $stmt = $this->conn->prepare("INSERT INTO manufacturer(name) VALUES(:name)");

        $stmt->execute(["name" => $name]);

        if ($this->conn->lastInsertId()) {
            die("1");
        } else {
            die("0");
        }
    }
}
