<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {

    public function getUser(string $email): ?User {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users u LEFT JOIN users_details ud 
            ON u.id_users_details = ud.id WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            throw new UnexpectedValueException("User with this email not exist");
        }

        return new User($user['email'], $user['password'], $user['name'], $user['surname'], $user['id']);
    }

    public function addUser(User $user) {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_details (name, surname)
            VALUES (?, ?)
        ');
        $stmt->execute([$user->getName(), $user->getSurname()]);
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, id_users_details)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([$user->getEmail(), $user->getPassword(), $this->getUserDetailsId($user)]);
    }

    public function getUserDetailsId(User $user): int {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_details WHERE name = :name AND surname = :surname
        ');

        $name = $user->getName();
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $surname = $user->getSurname();
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data['id'];
    }

    public function isEmailOccupied(string $email): bool{

        $stmt = $this->database->connect()->prepare('
        SELECT email FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return true;
        }
        return false;
    }
}
