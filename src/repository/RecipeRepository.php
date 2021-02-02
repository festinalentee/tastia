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
            return null;
        }

        return new Recipe(
            $recipe ['title'],
            $recipe ['instructions'],
            $recipe ['ingredients'],
            $recipe ['image'],
            $recipe ['category'],
            $recipe ['preparation_time'],
            $recipe ['servings'],
            $recipe ['difficulty'],
        );
    }

    public function addRecipe(Recipe $recipe): void {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO recipes (title, instructions, ingredients, category, preparation_time, servings, difficulty, image)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        //$id_users = 1;

        $stmt->execute([
            $recipe->getTitle(),
            $recipe->getInstructions(),
            $recipe->getIngredients(),
            $recipe->getCategory(),
            $recipe->getPreparationTime(),
            $recipe->getServings(),
            $recipe->getDifficulty(),
            $recipe->getImage(),
        ]);
    }

    public function getRecipes(): array {

        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes;
        ');
        $stmt->execute();
        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recipes as $recipe) {
            $result[] = new Recipe(
                $recipe ['title'],
                $recipe ['instructions'],
                $recipe ['ingredients'],
                $recipe ['category'],
                $recipe ['preparation_time'],
                $recipe ['servings'],
                $recipe ['difficulty'],
                $recipe ['image'],
            );
        }

        return $result;
    }

    public function getRecipeByTitle(string $searchString) {

        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes WHERE LOWER(title) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
