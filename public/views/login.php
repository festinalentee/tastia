<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=1280, maximum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <title>Tastia</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logooo@1x.png">
        </div>
        <div class="login-container">
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
                    <input name="email" type="text" placeholder="email@email.com" required>
                    <input name="password" type="password" placeholder="password" required>
                    <button type="submit">LOGIN</button>
                </form>
        </div>
</body>