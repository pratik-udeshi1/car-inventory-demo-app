<?php

require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use app\controller\Manufacturer as mfg;
use app\helper\Helper;

// Validating input
$data = Helper::isEmpty($_POST['manufacturer']);

return (new mfg())->create($data);
