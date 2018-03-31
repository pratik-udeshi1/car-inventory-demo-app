<?php

require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use app\controller\Model;

// Updating sold status for the model
if (!empty($_POST['sold_status'])) {

    $m_id        = $_POST['sold_status'];
    $sold_status = (new Model())->updateSoldStatus($m_id);
    echo json_encode($sold_status);
    die;
}

// Getting individual model id details for modal popup
if (!empty($_POST['model_id'])) {

    $m_id     = $_POST['model_id'];
    $listings = (new Model())->get($m_id);
    echo json_encode($listings);
    die;
}
