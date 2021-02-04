<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=1280, maximum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <script type="text/javascript" src="/public/js/login.js" defer></script>
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
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <button type="submit">SIGN IN</button>
            </form>
            <button id="sign-up-button">SIGN UP</button>
        </div>
</body>