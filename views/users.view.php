<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SimplePHP</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <style>
            body {
                margin: 0;
                padding: 0;
                background-color: #d8d8d8;
            }

            hr {
                width: 30%;
                border: none;
                border-bottom: 1px solid grey;
            }

            a {
                text-decoration: none;
                color: grey;
            }

            .title-container {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 500px
                text-align: center;
                font-size: 20px;
                font-family: 'Roboto', sans-serif;
                color: grey;
            }
        </style>
    </head>
    <body>
        <div class="title-container">
        <?php foreach ($users as $user): ?>
                <pre>
                id : <?= $user['id'] ?>
                name : <?= $user['name'] ?>
                </pre>
        <?php endforeach; ?>
        <hr>
        </div>
    </body>
</html>
