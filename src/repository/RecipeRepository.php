<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Recipe.php';

class RecipeRepository extends Repository {

    public function getRecipe(int $id): ?Recipe {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.recipes WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($recipe == false) {
            throw new UnexpectedValueException('Recipe not found');
        }

        return new Recipe($recipe ['title'], $recipe ['instructions'], $recipe ['ingredients'],
            $recipe ['category'], $recipe ['preparation_time'], $recipe ['servings'],
            $recipe ['difficulty'], $recipe ['image'], $recipe ['id_users'] );
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

    public function getRecipes(): array {

        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes WHERE id_users = :id_users;
        ');
        $stmt->bindParam(':id_users', $_SESSION['id'],PDO::PARAM_INT);
        $stmt->execute();
        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recipes as $recipe) {
            $result[] = new Recipe($recipe ['title'], $recipe ['instructions'], $recipe ['ingredients'],
                $recipe ['category'], $recipe ['preparation_time'], $recipe ['servings'],
                $recipe ['difficulty'], $recipe ['image'], $recipe ['id_users']);
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
        $breakfasts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($breakfasts as $breakfast) {
            $result[] = new Recipe($breakfast ['title'], $breakfast ['instructions'], $breakfast ['ingredients'],
                $breakfast ['category'], $breakfast ['preparation_time'], $breakfast ['servings'],
                $breakfast ['difficulty'], $breakfast ['image'], $breakfast ['id_users']);
        }
        return $result;
    }
}
