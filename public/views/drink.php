<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/recipes.css">
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
                <a href="#" class="selected">Drink</a>
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
                <form>
                    <input placeholder="search recipe">
                </form>
            </div>
            <div class="add-recipe">
                <i class="fas fa-plus"></i> Add a recipe
            </div>
        </header>
        <section class="allRecipes">
            <div id="recipe-1">
                <img src="public/img/image-30@1x.png">
                <div>
                    <h2>Lemoniade</h2>
                </div>
            </div>
            <div id="recipe-2">
                <img src="public/img/image-31@1x.png">
                <div>
                    <h2>Ice Tea</h2>
                </div>
            </div>
            <div id="recipe-3">
                <img src="public/img/image-32@1x.png">
                <div>
                    <h2>Cuba Libre</h2>
                </div>
            </div>
            <div id="recipe-4">
                <img src="public/img/image-33@1x.png">
                <div>
                    <h2>Coffe</h2>
                </div>
            </div>
            <div id="recipe-5">
                <img src="public/img/image-4@1x.png">
                <div>
                    <h2>Smoothie</h2>
                </div>
            </div>
            <div id="recipe-6">
                <img src="public/img/image-35@1x.png">
                <div>
                    <h2>Mint water</h2>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
