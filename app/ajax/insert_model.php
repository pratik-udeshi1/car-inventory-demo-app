<?php

require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use app\controller\Model;
use app\helper\Helper;

// Only getting selected fields
$required_fields = [
    'name'            => $_POST['name'],
    'reg_number'      => $_POST['reg_number'],
    'color'           => $_POST['color'],
    'note'            => $_POST['note'],
    'manufacturer_id' => $_POST['manufacturer_id'],
    'year'            => $_POST['year'],
];

// Unsetting default image variable,
// as we are already getting it in the array
unset($_FILES['images']);

if (count($_FILES) <= 0) {
    echo "Please upload images!";
    die;
}

// Allowing only 2 images upload
if (count($_FILES) > 2) {
    echo "Cannot upload more than 2 files!";
    die;
}

Helper::isEmpty($required_fields);
Helper::validateImage($_FILES);

$data['form_fields'] = $required_fields;
$data['images']      = $_FILES;

return (new Model())->create($data);
