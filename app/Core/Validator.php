<?php
namespace App\Core;

// For Validation Class

class Validator {

    private $error = [];

    // Validation required fields
    public function required($field, $value){
        if(empty($value)){
            $this->$error[$field] = ucfirst($field) . " field is required";
        }
        return $this;
    }

    // Validate email
    public function email($field, $value){
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
            $this->$error[$field] = 'Invalid email format';
        }
        return $this;
    }

    // Validate min length
    public function min($field, $value, $min){
        if(strlen($value) < $min){
            $this->$error[$field] = ucfirst($field) . " must be at least {$min} characters";
        }
        return $this;
    }

    // Validate max length
    public function max($field, $value, $max){
        if(strlen($value) > $max){
            $this->$error[$field] = ucfirst($field) . " must be at least {$max} characters";
        }
        return $this;
    }

    // validate match password
    public function match($field, $value1, $value2){
        if($value1 !== $value2){
            $this->$error[$field] = ucfirst($field) . " does not match";
        }
        return $this;
    }

    // Check if validation passed
    public function passes(){
        return empty($this->error);
    }

    // Check if validation failed.
    public function fails(){
        return !$this->passes();
    }

    // get all errors
    public function getErrors(){
        return $this->error;
    }

    // get first error message
    public function getFirstError(){
        return !empty($this->error) ? reset($this->error) : null;
    }

    // Sanitize input (XSS protection)
    public static function sanitiaze($data){
        return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
    } 
}