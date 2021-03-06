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
            <i class="fas fa-bars"></i>
            <img src="public/img/log.png">
            <ul>
                <li class="selected">
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
                <li>
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
            <header>
                <div class="search-bar">
                        <input placeholder="search recipe">
                </div>
                <div class="add-recipe">
                    <a href="addRecipe" class="add-recipe-button"><i class="fas fa-plus"></i> Add recipe</a>
                </div>
            </header>
            <section class="allRecipes">
                <?php foreach ($recipes as $recipe): ?>
                        <div id="recipe-1">
                            <img src="public/uploads/<?= $recipe->getImage() ?>">
                            <form method="post" action="recipe">
                                <button type="submit" name="recipe-id" value="<?= $recipe->getId() ?>" class="recipe-id-button">
                                    <div>
                                        <h2><?= $recipe->getTitle() ?></h2>
                                    </div>
                                </button>
                            </form>
                        </div>
                <?php endforeach; ?>
            </section>
        </main>
    </div>
</body>

<template id="recipe-template">
    <div id="recipe-1">
        <img src="">
        <form method="post" action="recipe">
            <button type="submit" name="recipe-id" value="" class="recipe-id-button">
                <div>
                    <h2>title</h2>
                </div>
            </button>
        </form>
    </div>
</template>
