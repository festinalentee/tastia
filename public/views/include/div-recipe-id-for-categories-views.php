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