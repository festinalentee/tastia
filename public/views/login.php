<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=1280, maximum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Tastia</title>
</head>

<body>
    <div class="container">
        <img class="logo" src="public/img/logooo@1x.png">
            <form class="login" action="login" method="POST">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="email" type="email" placeholder="email@email.com" required>
                <input name="password" type="password" placeholder="password" required>
                <button type="submit">LOGIN</button>
            </form>
        </div>
</body>