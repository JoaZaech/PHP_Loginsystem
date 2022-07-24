<?php 
require_once 'error_handling.php';
if(isset($_POST['login-submit'])){
    $payload = toNormalizedArray($_POST);
    checkEmptyInput($payload, LOGIN_ERROR_URL);
    validEmail($_POST['login-email'], LOGIN_ERROR_URL);
}