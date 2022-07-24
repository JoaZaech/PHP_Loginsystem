<?php 

require_once 'const.inc.php';
require_once '../config/config.php';

function toNormalizedArray($POST){
    $payload = array();
    foreach ($POST as $p){
        array_push($payload,$p);
    }
    return $payload;
}

// Überprüft ob alle Felder gefüllt sind
function checkEmptyInput($input, $url){
    for($i = 0; $i < count($input)-1; $i++){
        if(empty($input[$i]) && FORM_EDP[$i]){  
            header("Location: ".$url."error=".returnErrorMessage(1));
            exit();
        }
    }
}

// Überprüft die richtige länge der Eingabe
function checkInputLength($input){
     for($i = 0; $i < count(FORM_LEN); $i++){
        if(strlen($input[$i]) > FORM_LEN[$i]){
            header("Location: ".REGISTER_ERROR_URL."error=".returnErrorMessage(2));
            exit();
        }
    }
}

function validPasswords($pwd1, $pwd2){
    if(strcmp($pwd1,$pwd2) != 0){
        header("Location: ".REGISTER_ERROR_URL."error=".returnErrorMessage(3));
        exit();
    }
    if(!is_valid_password($pwd1)){
        header("Location: ".REGISTER_ERROR_URL."error=".returnErrorMessage(4));
        exit();
    }
}

function is_valid_password($password) {
    $uppercase = preg_match('/@[A-Z]@/', $password);
    $lowercase = preg_match('/@[a-z]@/', $password);
    $number    = preg_match('/@[0-9]@/', $password);
    $specialChars = preg_match('/@[^\w]@/', $password);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
        return true;
    }else{
        return false;
    }
}

// Error Nachrichten
function returnErrorMessage($error_code){
    switch($error_code){
        case 1: 
            return "Alle Felder ausfüllen!";
        case 2: 
            return "Eingabe zu lang für das Feld!";
        case 3: 
            return "Ungleiche Passwörter eingegeben";
        case 4: 
            return "Nicht sicheres Passwort!";
    }
}
