<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=1280, maximum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <script type="text/javascript" src="/public/js/script.js" defer></script>
    <title>Tastia</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logooo@1x.png">
        </div>
        <div class="login-container">
            <form class="register" action="register" method="POST">
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
                <input name="confirmedPassword" type="password" placeholder="confirm password" required>
                <input name="name" type="text" placeholder="name" required>
                <input name="surname" type="text" placeholder="surname" required>
                <button type="submit">SIGN UP</button>
            </form>
        </div>
    </div>
</body>
