<?php

namespace App\Core;

// Session Class

class Session {
    
    // for session start
    public static function start(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    // data set into the session
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    // data get from the session
    public static function get($key, $default = null){
        return $_SESSION[$key] ?? $default;
    }

    // check for the key is exist or not
    public static function has($key){
        return isset($_SESSION[$key]);
    }

    // remove the specific value form the session
    public static function remove($key){
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }

    // set the flash message for one time
    public static function flash($key, $message){
        $_SESSION['flash'][$key] = $message;
    }

    // get the flash message
    public static function getFlash($key){
        if(isset($_SESSION['flash'][$key])){
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $message;
        }
        return null;
    }

    // complete session destroy
    public static function destroy(){
        session_unset();
        session_destroy();
    }

    // get the current userid
    public static function getUserId(){
        return self::get('user_id');
    }

    // check user is logged in
    public static function isLoggedIn(){
        return self::has('user_id');
    }
}