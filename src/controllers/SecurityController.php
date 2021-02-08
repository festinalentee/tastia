<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__ . '/../../Session.php';

class SecurityController extends AppController {

    private UserRepository $userRepository;

    public function __construct() {

        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login() {

        if (!$this->isPost()) {
            return $this->render('login');
        }
        try {
            $user = $this->userRepository->getUser($_POST['email']);
        } catch (UnexpectedValueException $e) {
            return $this->render('login', ['messages' => [$e->getMessage()]]);
        }
        $this->validateLogin($user);

        $_SESSION['id'] = $user->getId();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/recipes");
    }

    private function validateLogin($user) {

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }
        if ($user->getEmail() !== $_POST['email']) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }
        if ($user->getPassword() !== sha1($_POST['password'])) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
    }

    public function register() {

        if (!$this->isPost()) {
            return $this->render('register');
        }
        if($this->validateRegister()) {

            $user = new User($_POST['email'], sha1($_POST['password']), $_POST['name'], $_POST['surname'], $_POST['id']);
            $this->userRepository->addUser($user);
            $_SESSION['id'] = $user->getId();

            return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
        }
    }

    private function validateRegister(): bool {

        if ($this->userRepository->isEmailOccupied($_POST['email'])) {
            $this->render('register', ['messages' => ['User with this email already exists!']]);
            return false;
        }
        elseif (!preg_match('/\S+@\S+\.\S+/', $_POST['email'])) {
            $this->render('register', ['messages' => ['Please provide proper email!']]);
            return false;
        }
        elseif (!$this->validatePasswordStrength()){
            return false;
        }
        elseif ($_POST['password'] !== $_POST['confirmedPassword']) {
            $this->render('register', ['messages' => ['Please provide the same password!']]);
            return false;
        }
        return true;
    }

    private function validatePasswordStrength(): bool{

        $upper_letter = preg_match('@[A-Z]@', $_POST['password']);
        $lower_letters = preg_match('@[a-z]@', $_POST['password']);
        $number = preg_match('@[0-9]@', $_POST['password']);
        $special_character = preg_match('@[^\w]@', $_POST['password']);

        if(!$upper_letter || !$lower_letters || !$number || !$special_character || strlen($_POST['password']) < 8) {
            $this->render('register', ['messages' => ['Your password needs to be at least 8 characters, 
                include both lower and upper case letters, number and special character.']]);
            return false;
        }
        return true;
    }

    public function logout() {

        session_unset();
        return $this->render('login');
    }
}
