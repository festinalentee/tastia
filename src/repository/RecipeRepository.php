<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Recipe.php';

class RecipeRepository extends Repository {

    public function getRecipeById(int $id): Recipe {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($recipe == false) {
            throw new UnexpectedValueException('Recipe not found');
        }

        $result = new Recipe($recipe ['title'], $recipe ['instructions'], $recipe ['ingredients'],
            $recipe ['category'], $recipe ['preparation_time'], $recipe ['servings'],
            $recipe ['difficulty'], $recipe ['image'], $recipe ['id_users']);
        $result->setId($recipe['id']);

        return $result;
    }

    public function addRecipe(Recipe $recipe): void {

        $id_users = $_SESSION['id'];

        $stmt = $this->database->connect()->prepare('
            INSERT INTO recipes (title, instructions, ingredients, category, preparation_time, servings, difficulty, image, id_users)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([$recipe->getTitle(), $recipe->getInstructions(), $recipe->getIngredients(),
            $recipe->getCategory(), $recipe->getPreparationTime(), $recipe->getServings(),
            $recipe->getDifficulty(), $recipe->getImage(), $id_users]);
    }

    public function getDefaultImage(int $id): string {

        $stmt = $this->database->connect()->prepare('
        SELECT image FROM recipes WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $image = $stmt->fetch(PDO::PARAM_STR);
        return $image['image'];
    }

    public function getRecipes(): array {

        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes WHERE id_users = :id_users;
        ');
        $stmt->bindParam(':id_users', $_SESSION['id'],PDO::PARAM_INT);
        $stmt->execute();
        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recipes as $recipe) {
            $get_recipe = new Recipe($recipe ['title'], $recipe ['instructions'], $recipe ['ingredients'],
                $recipe ['category'], $recipe ['preparation_time'], $recipe ['servings'],
                $recipe ['difficulty'], $recipe ['image'], $recipe ['id_users']);
            $get_recipe->setId($recipe['id']);
            $result[] = $get_recipe;
        }
        return $result;
    }

    public function getRecipeByTitle(string $searchString) {

        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes WHERE id_users = :id_users AND LOWER(title) LIKE :search
        ');
        $stmt->bindParam(':id_users', $_SESSION['id'],PDO::PARAM_INT);
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRecipeByCategory(string $category): array {

        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes WHERE id_users = :id_users AND LOWER(category) LIKE :category
        ');
        $stmt->bindParam(':id_users', $_SESSION['id'],PDO::PARAM_INT);
        $stmt->bindParam(':category', $category,PDO::PARAM_INT);
        $stmt->execute();
        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recipes as $recipe) {
            $get_recipe = new Recipe($recipe ['title'], $recipe ['instructions'], $recipe ['ingredients'],
                $recipe ['category'], $recipe ['preparation_time'], $recipe ['servings'],
                $recipe ['difficulty'], $recipe ['image'], $recipe ['id_users']);
            $get_recipe->setId($recipe['id']);
            $result[] = $get_recipe;
        }
        return $result;
    }

    public function modifyRecipe($title, $instructions, $ingredients, $category, $preparation_time, $servings, $difficulty, $id, $image = null): void {

        if($image != null){
            $stmt = $this->database->connect()->prepare('
                UPDATE recipes SET title = :title, instructions = :instructions, ingredients = :ingredients, category = :category, 
                    preparation_time = :preparation_time, servings = :servings, difficulty = :difficulty, image = :image WHERE id = :id ');
            $stmt->bindParam(':image', $image);
        }
        else {
            $stmt = $this->database->connect()->prepare('
                UPDATE recipes SET title = :title, instructions = :instructions, ingredients = :ingredients, category = :category, 
                preparation_time = :preparation_time, servings = :servings, difficulty = :difficulty WHERE id = :id ');
        }
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':instructions', $instructions);
        $stmt->bindParam(':ingredients', $ingredients);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':preparation_time', $preparation_time);
        $stmt->bindParam(':servings', $servings);
        $stmt->bindParam(':difficulty', $difficulty);

        $stmt->execute();
    }

    public function deleteRecipeById($id): void {

        $stmt = $this->database->connect()->prepare('
        DELETE FROM recipes WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
