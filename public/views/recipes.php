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
            <img src="public/img/logooo@1x.png">
            <ul>
                <li>
                    <i class="fas fa-home"></i>
                    <a href="#" class="selected">All recipes</a>
                </li>
                <li>
                    <i class="fas fa-coffee"></i>
                    <a href="#" class="button">Breakfast</a>
                </li>
                <li>
                    <i class="fas fa-apple-alt"></i>
                    <a href="#" class="button">Lunch</a>
                </li>
                <li>
                    <i class="fas fa-fish"></i>
                    <a href="#" class="button">Dinner</a>
                </li>
                <li>
                    <i class="fas fa-ice-cream"></i>
                    <a href="#" class="button">Dessert</a>
                </li>
                <li>
                    <i class="fas fa-glass-martini-alt"></i>
                    <a href="#" class="button">Drink</a>
                </li>
                <li>
                    <i class="fas fa-sign-out-alt"></i>
                    <a href="#" class="button">Logout</a>
                </li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="search-bar">
                        <input placeholder="search recipe">
                </div>
                <div class="add-recipe">
                    <a href="#" class="add-recipe-button"><i class="fas fa-plus"></i> Add recipe</a>
                </div>
            </header>
            <section class="allRecipes">
                <?php foreach ($recipes as $recipe): ?>
                    <div id="recipe-1">
                        <img src="public/uploads/<?= $recipe->getImage() ?>">
                        <div>
                            <h2><?= $recipe->getTitle() ?></h2>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        </main>
    </div>
</body>

<template id="recipe-template">
    <div id="recipe-1">
        <img src="">
        <div>
            <h2>title</h2>
        </div>
    </div>
</template>
