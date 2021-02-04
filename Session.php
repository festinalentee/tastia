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
}
