<!DOCTYPE html>
<html>
<head>
    <title>Clinic App</title>
    <style>
        body {
            font-family: Arial;
            background: #f1f2f6;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .open {
            color: green;
            font-weight: bold;
        }

        .full {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

<h1>🏥 EXO Clinic Appointment</h1>

<div class="container">

<?php foreach ($appointments as $a): ?>
    <?php
        $status = $a['slots'] > 0 ? "Open" : "Full";
        $class = $a['slots'] > 0 ? "open" : "full";
    ?>

    <div class="card">
        <h3><?= $a['doctor'] ?></h3>
        <p>📅 Date: <?= $a['date'] ?></p>
        <p>👥 Slots: <?= $a['slots'] ?></p>
        <p class="<?= $class ?>">Status: <?= $status ?></p>
    </div>

<?php endforeach; ?>

</div>

</body>
</html>