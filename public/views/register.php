<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=1280, maximum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <script src="https://kit.fontawesome.com/28fe1185ec.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/script.js" defer></script>
    <title>Tastia</title>
</head>

<body>
    <div class="container">
        <div class="food-grid">
            <img src="public/img/Podstawowa-odmiana-sushi-Nigiri.jpg">
            <img src="public/img/DSF8138.jpg">
            <img src="public/img/aperol-spritz_9f79beedd915739c8224868e886be1d8bdc0ab83.jpg">
            <img src="public/img/your-easy-500-calorie-meal-plan-30-days-of-healthy-dinners-104143-2.jpeg">
        </div>
        <div class="login-container">
            <div class="logo">
                <img src="public/img/log.png">
            </div>
            <div class="register-background">
                <form class="register" action="register" method="POST">
                    <i class="far fa-user-circle"></i>
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
    </div>
</body>
