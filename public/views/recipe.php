<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/recipes.css">
    <link rel="stylesheet" type="text/css" href="public/css/add.css">
    <link rel="stylesheet" type="text/css" href="public/css/recipe.css">
    <script src="https://kit.fontawesome.com/28fe1185ec.js" crossorigin="anonymous"></script>
    <title>Tastia</title>
</head>

<body>
    <div class="base-container">
        <? include("include/nav-buttons-for-recipe-views.php") ?>
        <main>
            <div class="addRecipe">
                <header>
                    <div class="title"><?= $recipe->getTitle() ?></div>
                    <form method="post" action="recipes" class="delete-form">
                        <button type="submit" name="delete-recipe" value="<?= $recipe->getId() ?>" class="delete-recipe-button" id="delete-button"><i class="fas fa-trash"></i> Delete recipe</button>
                    </form>
                    <form method="post" action="modifyRecipe" class="modify-form">
                        <button type="submit" name="update-recipe" value="<?= $recipe->getId(); ?>" class="modify-recipe-button" id="modify-button"><i class="fas fa-edit"></i> Modify recipe</button>
                    </form>
                </header>
                <div class="display-recipe">
                    <div class="top-container">
                        <div class="photo">
                            <img class="recipe-img" src="public/uploads/<?= $recipe->getImage() ?>">
                        </div>
                        <div class="details">
                            <div><?= $recipe->getCategory() ?></div>
                            <div><?= $recipe->getPreparationTime() ?></div>
                            <div><?= $recipe->getServings() ?></div>
                            <div><?= $recipe->getDifficulty() ?></div>
                        </div>
                    </div>
                    <section class="grid-container">
                        <div class="instructions">
                            <h1>Instructions</h1>
                            <div class="tarea"><?= $recipe->getInstructions() ?></div>
                        </div>
                        <div class="ingredients">
                            <h1>Ingredients</h1>
                            <div class="tarea"><?= $recipe->getIngredients() ?></div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>
</body>
