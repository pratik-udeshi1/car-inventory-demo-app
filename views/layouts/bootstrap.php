<?php

include 'header.php';
require_once '../vendor/autoload.php';

register_shutdown_function(function () {
    include 'footer.php';
});
