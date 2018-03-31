<?php

namespace app\model;

use PDO;

class Database
{
    // Connection information
    private $conn;
    private $dsn      = 'mysql:dbname=car_inventory;host=localhost';
    private $user     = 'root';
    private $password = 'root@123';

    /* Creates database connection */
    public function __construct()
    {
        try
        {
            $this->conn = new PDO($this->dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "";
            die();
        }

        return $this->conn;
    }

    /* Getting PDO Object */
    public function getmyDB()
    {
        if ($this->conn instanceof PDO) {
            return $this->conn;
        }
    }
}
