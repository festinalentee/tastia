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
    <nav>
        <img src="public/img/logooo@1x.png">
        <ul>
            <li>
                <i class="fas fa-home"></i>
                <a href="#" class="button">All recipes</a>
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
            <div class="title">
                <form action="addRecipe" method="POST" enctype="multipart/form-data">
                    <input name="title" type="text" placeholder="Title">
                </form>
            </div>
            <div class="save">
                <form action="addRecipe" method="POST" enctype="multipart/form-data">
                    <button type="submit"><i class="fas fa-save"></i> Save recipe</button>
                </form>
            </div>
        </header>
        <section class="grid-container">

            <div class="instructions">
                <form action="addRecipe" method="POST" enctype="multipart/form-data">
                    <h1>Instructions</h1>
                    <textarea name="instructions" rows=23 placeholder="Write instructions..."></textarea>
                </form>
            </div>

            <div class="photo">
                <form action="addRecipe" method="POST" enctype="multipart/form-data">
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
                    <input type="file" name="file"/><br/>
                </form>
            </div>
            <div class="details">
                <form action="addRecipe" method="POST" enctype="multipart/form-data">
                    <input name="category" type="text" placeholder="category">
                    <input name="time" type="text" placeholder="time">
                    <input name="servings" type="text" placeholder="servings">
                    <input name="difficulty" type="text" placeholder="difficulty">
                </form>
            </div>
            <div class="ingredients">
                <form action="addRecipe" method="POST" enctype="multipart/form-data">
                    <h1>Ingredients</h1>
                    <textarea name="ingredients" rows=14 placeholder="Write ingredients..."></textarea>
                </form>
            </div>
        </section>
    </main>
</div>
</body>
