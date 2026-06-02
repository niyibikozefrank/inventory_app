<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background: #f8fafc;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
            height: 100vh;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 64px;
            margin-bottom: 30px;
            color: #636b6f;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="flex-center">
        <div class="content">
            <div class="title">Welcome</div>
            <div class="links">
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            </div>
        </div>
    </div>
</body>
</html>
