<?php
namespace App\Core;

// Base Controller Class

class Controller {
    

    // view rendering
    protected function view($view, $data = []){
        extract($data);

        $viewFile = dirname(__DIR__, 2) . '/views/' . $view . '.php';

        if(file_exists($viewFile)){
            require_once($viewFile);
        } else {
            die("View not found, {$view}");
        }
    }

    // JSON reponse (for ajax request)
    protected function json($data, $statusCode = 200){
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    // Redirect
    protected function redirect($path){
        $baseUrl = "https://localhost/PHP-OOP-CRUD/public/";
        header("Location: {$baseURL}/{$path}");
        exit;
    }

    // Check - if user is logged in or not
    protected function isAuthenticated(){
        return isset($_SESSION['user_id']);
    }

    // If user is not authenticate then redirect on login page
    protected function requrieAuth(){
        if(!$this->isAuthenticated()){
            $this->redirect('login.php');
        }
    }

}