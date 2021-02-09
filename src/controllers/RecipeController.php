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

        Session::sessionVerification();
        if (isset($_POST['delete-recipe'])) {
            $this->deleteRecipe();
        }
        $recipes = $this->recipeRepository->getRecipes();
        return $this->render('recipes', ['recipes' => $recipes]);
    }

    public function addRecipe() {

        Session::sessionVerification();
        if ($this->isPost()) {
            if (is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
                $this->moveUploadedFile();
                $this->addNewRecipe($_FILES['file']['name']);
            }
            else {
                $image = $this->recipeRepository->getDefaultImage(13);
                $this->addNewRecipe($image);
            }
            return $this->render('recipes', ['recipes' => $this->recipeRepository->getRecipes(), 'messages' => $this->message]);
        }
        return $this->render('add-recipe', ['messages' => $this->message]);
    }

    private function moveUploadedFile() {

        move_uploaded_file(
            $_FILES['file']['tmp_name'],
            dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
        );
    }

    private function addNewRecipe($image) {

        $recipe = new Recipe($_POST['title'], $_POST['instructions'], $_POST['ingredients'],
            $_POST['category'], $_POST['preparation_time'], $_POST['servings'],
            $_POST['difficulty'], $image, $_POST['id_users']);
        $this->recipeRepository->addRecipe($recipe);
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

    public function recipe() {

        Session::sessionVerification();
        if (isset($_POST['update-button'])) {
            return $this->recipeAfterChanges();
        }
        if (isset($_POST['recipe-id'])) {

            try {
                $recipe = $this->recipeRepository->getRecipeById(intval($_POST['recipe-id']));

            } catch (UnexpectedValueException $e) {

                $this->render('recipes', ['recipes' => $this->recipeRepository->getRecipes()]);
            }

            return $this->render('recipe', ['recipe' => $recipe]);
        }
    }

    public function modifyRecipe() {

        Session::sessionVerification();
        if (isset($_POST['update-recipe'])) {
            $recipe = $this->recipeRepository->getRecipeById($_POST['update-recipe']);
            return $this->render('modify-recipe', ['recipe' => $recipe]);
        }
    }

    private function recipeAfterChanges() {

        $id = $_POST['update-button'];

        if (is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            $this->moveUploadedFile();
            $this->updateRecipe($_FILES['file']['name']);
        }
        else {
            $this->updateRecipe();
        }
        return $this->render('recipe', ['recipe' => $this->recipeRepository->getRecipeById($id)]);
    }

    private function updateRecipe($image = null) {

        $this->recipeRepository->modifyRecipe($_POST['title'], $_POST['instructions'], $_POST['ingredients'],
            $_POST['category'], $_POST['preparation_time'], $_POST['servings'],
            $_POST['difficulty'], $_POST['update-button'], $image);
    }

    public function deleteRecipe() {
        $this->recipeRepository->deleteRecipeById($_POST["delete-recipe"]);
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
