<!DOCTYPE html>
<html>
<head>
    <title><?= $appName ?></title>
    <style>
        body {
            font-family: Arial;
            background: #f5f6fa;
            text-align: center;
            padding-top: 100px;
        }

        .box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 400px;
            margin: auto;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        h1 {
            color: #2f3640;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #40739e;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        a:hover {
            background: #273c75;
        }
    </style>
</head>

<body>

<div class="box">
    <h1><?= $appName ?></h1>
    <p>Welcome to 🏥 EXO Clinic Appointment System</p>
    <a href="/appointments">View Appointments</a>
</div>

</body>
</html>