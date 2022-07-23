<?php 
require_once 'error_handling.php';

if(isset($_POST['register-submit'])){
    $payload = toNormalizedArray($_POST);
    checkEmptyInput($payload, REGISTER_ERROR_URL);
    checkInputLength($payload, REGISTER_ERROR_URL);
}