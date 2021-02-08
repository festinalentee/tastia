<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/recipes.css">
    <script src="https://kit.fontawesome.com/28fe1185ec.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/search.js" defer></script>
    <title>Tastia</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <img src="public/img/log.png">
            <ul>
                <li>
                    <i class="fas fa-home"></i>
                    <a href="recipes" class="button">Recipes</a>
                </li>
                <li>
                    <i class="fas fa-coffee"></i>
                    <a href="breakfast" class="button">Breakfast</a>
                </li>
                <li>
                    <i class="fas fa-bread-slice"></i>
                    <a href="lunch" class="button">Lunch</a>
                </li>
                <li  class="selected">
                    <i class="fas fa-fish"></i>
                    <a href="dinner" class="button">Dinner</a>
                </li>
                <li>
                    <i class="fas fa-cookie"></i>
                    <a href="dessert" class="button">Dessert</a>
                </li>
                <li>
                    <i class="fas fa-glass-martini-alt"></i>
                    <a href="drink" class="button">Drink</a>
                </li>
                <li>
                    <i class="fas fa-sign-out-alt"></i>
                    <a href="login" class="button">Logout</a>
                </li>
            </ul>
        </nav>
        <main>
            <? include("include/header-for-categories-views.php") ?>
            <section class="allRecipes">
                <?php foreach ($dinner as $recipe): ?>
                    <? include("include/div-recipe-id-for-categories-views.php") ?>
                <?php endforeach; ?>
            </section>
        </main>
    </div>
</body>

<? include("include/template-for-categories-views.php") ?>
