<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AppointmentController;
use App\Support\Response;

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// HOME
if ($uri == "/") {
    $config = require __DIR__ . '/../config/app.php';

    $appName = $config['name'];
    require __DIR__ . '/../views/home.php';
    exit;
}

// GET
if ($uri == "/appointments") {
    if ($method != "GET") {
        Response::json(["error" => "Method Not Allowed"], 405);
    }
    (new AppointmentController())->index();
}

// POST
if ($uri == "/registrations") {
    if ($method != "POST") {
        Response::json(["error" => "Method Not Allowed"], 405);
    }
    (new AppointmentController())->register();
}

// 404
Response::json(["error" => "Not Found"], 404);