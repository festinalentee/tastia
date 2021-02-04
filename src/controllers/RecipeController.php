<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Recipe.php';
require_once __DIR__.'/../repository/RecipeRepository.php';
require_once __DIR__ . '/../../Session.php';

class RecipeController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private array $message = [];
    private RecipeRepository $recipeRepository;

    public function __construct() {

        parent::__construct();
        $this->recipeRepository = new RecipeRepository();
    }

    public function recipes() {

        $recipes = $this->recipeRepository->getRecipes();
        return $this->render('recipes', ['recipes' => $recipes]);
    }

    public function addRecipe() {

        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $recipe = new Recipe($_POST['title'], $_POST['instructions'], $_POST['ingredients'],
                $_POST['category'], $_POST['preparation_time'], $_POST['servings'],
                $_POST['difficulty'], $_FILES['file']['name'], $_POST['id_users']);

            $this->recipeRepository->addRecipe($recipe);

            return $this->render('recipes', ['recipes' => $this->recipeRepository->getRecipes(), 'message' => $this->message]);
        }
        return $this->render('add-recipe', ['message' => $this->message]);
    }

    public function search() {

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->recipeRepository->getRecipeByTitle($decoded['search']));
        }
    }

    private function validate(array $file): bool {

        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}
