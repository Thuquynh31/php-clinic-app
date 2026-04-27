<?php

namespace App\Controllers;

use App\Support\Response;

class AppointmentController {

    public function index() {
        $data = require __DIR__ . '/../Data/appointments.php';

        Response::json([
            "message" => "Appointment list",
            "data" => $data
        ], 200);
    }
    public function view() {
    $appointments = require __DIR__ . '/../Data/appointments.php';
    require __DIR__ . '/../../views/appointments.php';
    }

    public function register() {

        if ($_SERVER['CONTENT_TYPE'] !== 'application/json') {
            Response::json(["error" => "Unsupported Media Type"], 415);
        }

        $input = json_decode(file_get_contents("php://input"), true);

        if (!$input) {
            Response::json(["error" => "Invalid JSON"], 422);
        }

        if (empty($input['patient_name'])) {
            Response::json(["error" => "Missing patient name"], 422);
        }

        if (empty($input['appointment_id'])) {
            Response::json(["error" => "Missing appointment id"], 422);
        }

        $appointments = require __DIR__ . '/../Data/appointments.php';

        $found = null;
        foreach ($appointments as $a) {
            if ($a['id'] == $input['appointment_id']) {
                $found = $a;
            }
        }

        if (!$found) {
            Response::json(["error" => "Appointment not found"], 422);
        }

        if ($found['slots'] <= 0) {
            Response::json(["error" => "No slots available"], 422);
        }

        Response::json([
            "message" => "Registration successful",
            "data" => $input
        ], 201);
    }
}