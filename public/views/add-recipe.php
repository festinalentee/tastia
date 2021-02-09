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
        <form action="addRecipe" method="POST" enctype="multipart/form-data">
            <header>
                <div class="title inputs">
                    <input name="title" type="text" placeholder="Title">
                </div>
                <div class="save">
                    <button type="submit" class="save-button"><i class="fas fa-save"></i> Save recipe</button>
                </div>
            </header>
            <section class="grid-container">
                <div class="photo">
                    <i class="fas fa-camera"></i>
                    <input type="file" name="file"/><br>
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <div class="details inputs">
                    <select id="category" class="category-selectbox" name="category">
                        <option value="" disabled selected>category</option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                        <option value="Dessert">Dessert</option>
                        <option value="Drink">Drink</option>
                    </select>
                    <input name="preparation_time" type="text" placeholder="preparation_time">
                    <input name="servings" type="text" placeholder="servings">
                    <input name="difficulty" type="text" placeholder="difficulty">
                </div>
                <div class="instructions inputs">
                    <h1>Instructions</h1>
                    <textarea name="instructions" rows=30 placeholder="Write instructions..."></textarea>
                </div>
                <div class="ingredients inputs">
                    <h1>Ingredients</h1>
                    <textarea name="ingredients" rows=30 placeholder="Write ingredients..."></textarea>
                </div>
            </section>
        </form>
    </main>
</div>
</body>
