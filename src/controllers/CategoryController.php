<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Recipe.php';
require_once __DIR__.'/../repository/RecipeRepository.php';

class CategoryController extends AppController {

    private RecipeRepository $recipeRepository;

    public function __construct() {

        parent::__construct();
        $this->recipeRepository = new RecipeRepository();
    }

    public function breakfast() {

        $category = 'breakfast';
        $breakfast = $this->recipeRepository->getRecipeByCategory($category);
        return $this->render('breakfast', ['breakfast' => $breakfast]);
    }

    public function lunch() {

        $category = 'lunch';
        $lunch = $this->recipeRepository->getRecipeByCategory($category);
        return $this->render('lunch', ['lunch' => $lunch]);
    }

    public function dinner() {

        $category = 'dinner';
        $dinner = $this->recipeRepository->getRecipeByCategory($category);
        return $this->render('dinner', ['dinner' => $dinner]);
    }

    public function dessert() {

        $category = 'dessert';
        $dessert = $this->recipeRepository->getRecipeByCategory($category);
        return $this->render('dessert', ['dessert' => $dessert]);
    }

    public function drink() {

        $category = 'drink';
        $drink = $this->recipeRepository->getRecipeByCategory($category);
        return $this->render('drink', ['drink' => $drink]);
    }
}
