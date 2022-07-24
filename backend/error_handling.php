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
// Überprüft die Datenart
function checkDataTypes($plz, $hn){
    if(!is_numeric($plz) || !is_numeric($hn)){
        header("Location: ".REGISTER_ERROR_URL."error=".returnErrorMessage(6));
        exit();
    }
}

// Überprüft ob Passwort richtiges Format hat
function validPasswords($pwd1, $pwd2){
    if(strcmp($pwd1,$pwd2) != 0){
        header("Location: ".REGISTER_ERROR_URL."error=".returnErrorMessage(3));
        exit();
    }
}

function validEmail($email,$url){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ".$url."error=".returnErrorMessage(5));
        exit();
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
        case 5: 
            return "Falsches Email Format!";
        case 6: 
            return "Bitte entsprechende Felder mit Zahlen füllen!";
        case 7: 
            return "SQL Error bitte Admin kontaktieren";
        case 8: 
            return "Benutzer existiert bereits!";
        case 9: 
            return "Passwort oder Email falsch!";
    }
}
