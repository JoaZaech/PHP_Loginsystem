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
        if(empty($input[$i])){  
            header("Location: ".$url."error=".returnErrorMessage(1));
            exit();
        }
    }
}

// Überprüft die richtige länge der Eingabe
function checkInputLength($input, $url){
     for($i = 0; $i < count(FORM_LEN); $i++){
        if(strlen($input[$i]) > FORM_LEN[$i]){
            header("Location: ".$url."error=".returnErrorMessage(2));
            exit();
        }
    }
}

// Error Nachrichten
function returnErrorMessage($error_code){
    switch($error_code){
        case 1: 
            return "Alle Felder ausfüllen!";
        case 2: 
            return "Eingabe zu lang für das Feld!";
    }
}