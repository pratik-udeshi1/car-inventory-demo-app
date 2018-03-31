<?php

namespace app\controller;

use app\model\Database;

class Model
{
    private $conn;

    public function __construct()
    {
        // Getting database object
        $this->conn = (new Database())->getmyDB();
    }

    // Getting all Model details
    public function get($model_id = '')
    {
        $query = "SELECT
                   mo.id,
                   mfg.name as mfg_name,
                   GROUP_CONCAT(img.img_name) as model_img,
                   mo.name as model_name,
                   mo.reg_number,
                   mo.color,
                   mo.year,
                   mo.note,
                   mo.sold_status
            FROM models as mo
            INNER JOIN manufacturer as mfg ON mfg.id = mo.manufacturer_id
            LEFT JOIN images as img ON img.model_id = mo.id
            WHERE mo.sold_status != 1 ";

        // Handling retrieval of single model in the same query
        $query .= (!empty($model_id)) ? " AND mo.id = $model_id " : "";

        $query .= " GROUP BY mo.id ORDER BY mo.created_at DESC ";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    // Creating new model / storing images based on the inputs
    public function create($data)
    {
        $form_fields = $data['form_fields'];
        $images      = $data['images'];

        $stmt = $this->conn->prepare("INSERT INTO models
            (name,reg_number,manufacturer_id,color,year,note) VALUES
            (:name,:reg_number,:manufacturer_id,:color,:year,:note)");

        $upload_path = dirname(dirname(__DIR__)) . "/assets/images/uploads/";

        $stmt->execute([
            "name"            => $form_fields['name'],
            "reg_number"      => $form_fields['reg_number'],
            "manufacturer_id" => $form_fields['manufacturer_id'],
            "color"           => $form_fields['color'],
            "year"            => $form_fields['year'],
            "note"            => $form_fields['note'],
        ]);

        $model_id = $this->conn->lastInsertId();

        // Storing Images into a folder | referencing image path in DB
        foreach ($images as $key => $img) {

            $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
            $img_name  = time() . rand(111, 999) . "." . $extension;
            $img_path  = $upload_path . $img_name;
            move_uploaded_file($img['tmp_name'], $img_path);
            chmod($img_path, 0777);

            $stmt = $this->conn->prepare("INSERT INTO images
                    (img_name, model_id) VALUES
                    (:img_name, :model_id)");

            $stmt->execute([
                "img_name" => $img_name,
                "model_id" => $model_id, // last inserted car ID
            ]);
        }

        if ($this->conn->lastInsertId()) {
            die("1");
        } else {
            die("0");
        }
    }

    // Updating sold status in the db
    public function updateSoldStatus($model_id)
    {
        $query = "UPDATE models
                SET sold_status = 1
                WHERE id = :model_id";

        $stmt = $this->conn->prepare($query);

        $stmt->execute([
            "model_id" => $model_id,
        ]);

        return $stmt->rowCount();
    }

}
