<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maintenance Mode</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .maintenance-box {
            padding: 40px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .maintenance-box img {
            width: 100px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="maintenance-box">
        <img src="https://cdn-icons-png.flaticon.com/512/565/565547.png" alt="Maintenance Icon">
        <h1 class="display-4 text-danger">We're Under Maintenance</h1>
        <p class="lead">Our website is currently undergoing scheduled maintenance.<br>
        Please check back soon. We appreciate your patience!</p>
        <hr>
        <p class="text-muted">— {{ $setting->author }} —</p>
    </div>
</body>
</html>
