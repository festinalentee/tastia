<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/add.css">
    <script src="https://kit.fontawesome.com/28fe1185ec.js" crossorigin="anonymous"></script>
    <title>Tastia</title>
</head>

<body>
<div class="base-container">
    <? include("include/nav-buttons-for-recipe-views.php") ?>
    <main>
        <form action="recipe" method="POST" enctype="multipart/form-data">
            <header>
                <div class="title inputs">
                    <input name="title" type="text" value="<?= $recipe->getTitle() ?>">
                </div>
                <div class="save">
                    <button type="submit" name="update-button" class="save-button" value="<?= $recipe->getId() ?>"><i class="fas fa-save"></i> Save recipe</button>
                </div>
            </header>
            <section class="grid-container">
                <div class="instructions inputs">
                    <h1>Instructions</h1>

                    <textarea name="instructions" rows=23><?= $recipe->getInstructions() ?></textarea>
                </div>
                <div class="photo">
                    <div class="messages">
                        <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <i class="fas fa-camera"></i>
                    <input type="file" name="file"/>
                </div>
                <div class="details inputs">
                    <select id="category" class="category-selectbox" name="category">
                        <option value="" disabled selected><?= $recipe->getCategory() ?></option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                        <option value="Dessert">Dessert</option>
                        <option value="Drink">Drink</option>
                    </select>
                    <input name="preparation_time" type="text" value="<?= $recipe->getPreparationTime() ?>">
                    <input name="servings" type="text" value="<?= $recipe->getServings() ?>">
                    <input name="difficulty" type="text" value="<?= $recipe->getDifficulty() ?>">
                </div>
                <div class="ingredients inputs">
                    <h1>Ingredients</h1>
                    <textarea name="ingredients" rows=14"><?= $recipe->getIngredients() ?></textarea>
                </div>
            </section>
        </form>
    </main>
</div>
</body>
