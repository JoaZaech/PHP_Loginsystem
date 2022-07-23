<?php 
require_once 'error_handling.php';
if(isset($_POST['login-submit'])){
    checkEmptyInput($_POST, LOGIN_ERROR_URL);
}