<?php

class Session {

    public static function startSession()
    {
        ini_set('session.cookie_httponly', 1);
        ini_set('session.hash_function', 1);
        ini_set('session.gc_maxlifetime', 2419200);
        session_set_cookie_params(2419200, "/", $_SERVER["SERVER_NAME"]);
        session_start();
    }

    public static function sessionVerification() {

        if (!isset($_SESSION['id'])) {
            $message = urldecode('You are not logged in. Please log in.');
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login?message=" . $message);
            die;
        }
    }

    public static function destroySession() {

        if (isset($_SESSION['id'])){
            session_destroy();
        }
        session_unset();
    }
}
