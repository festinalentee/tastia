<?php


class Recipe {

    private $title;
    private $instructions;
    private $ingredients;
    private $category;
    private $preparation_time;
    private $servings;
    private $difficulty;
    private $image;
    private $id_users;


    public function __construct($title, $instructions, $ingredients, $category, $preparation_time, $servings, $difficulty, $image, $id_users)
    {
        $this->title = $title;
        $this->instructions = $instructions;
        $this->ingredients = $ingredients;
        $this->category = $category;
        $this->preparation_time = $preparation_time;
        $this->servings = $servings;
        $this->difficulty = $difficulty;
        $this->image = $image;
        $this->id_users = $id_users;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getInstructions(): string
    {
        return $this->instructions;
    }

    public function setInstructions(string $instructions)
    {
        $this->instructions = $instructions;
    }

    public function getIngredients(): string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients)
    {
        $this->ingredients = $ingredients;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getPreparationTime()
    {
        return $this->preparation_time;
    }

    public function setPreparationTime($preparation_time): void
    {
        $this->preparation_time = $preparation_time;
    }

    public function getServings()
    {
        return $this->servings;
    }

    public function setServings($servings)
    {
        $this->servings = $servings;
    }

    public function getDifficulty()
    {
        return $this->difficulty;
    }

    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }

    public function getIdUsers()
    {
        return $this->id_users;
    }

    public function setIdUsers($id_users): void
    {
        $this->id_users = $id_users;
    }
}
