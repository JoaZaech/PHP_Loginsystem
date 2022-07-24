<?php 
require_once 'error_handling.php';
if(isset($_POST['login-submit'])){
    $payload = toNormalizedArray($_POST);
    checkEmptyInput($payload, LOGIN_ERROR_URL);
    validEmail($_POST['login-email'], LOGIN_ERROR_URL);
    BenutzerEinloggen($_POST['login-email'], $_POST['login-pwd']);
}

function BenutzerEinloggen($email, $pwd){
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "SELECT Passwort, PKBenutzer FROM benutzer WHERE Email = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ".LOGIN_ERROR_URL."error=".returnErrorMessage(7));
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $hashedpwd = "";
    $uid = "";
    if($row = mysqli_fetch_assoc($result)){
        $hashedpwd = $row['Passwort'];
        $uid = $row['PKBenutzer'];
    }else{
        header("Location: ".LOGIN_ERROR_URL."error=".returnErrorMessage(8));
        exit();
    }
    mysqli_close($conn);

    if(password_verify($pwd,$hashedpwd)){
        session_start();
        $_SESSION['uid'] = $uid;
        header("Location: ../web_content/index.php");
        exit();
    }else{
        header("Location: ".LOGIN_ERROR_URL."error=".returnErrorMessage(9));
        exit();
    }

}