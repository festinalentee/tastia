<?php


class Recipe{
    private $title;
    private $instructions;
    private $ingredients;
    private $image;
    private $category;
    private $time;
    private $servings;
    private $difficulty;

    public function __construct($title, $instructions, $ingredients, $image, $category, $time, $servings, $difficulty)
    {
        $this->title = $title;
        $this->instructions = $instructions;
        $this->ingredients = $ingredients;
        $this->image = $image;
        $this->category = $category;
        $this->time = $time;
        $this->servings = $servings;
        $this->difficulty = $difficulty;
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

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;
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
}
