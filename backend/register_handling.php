<?php 
require_once 'error_handling.php';

if(isset($_POST['register-submit'])){
    $payload = toNormalizedArray($_POST);
    checkEmptyInput($payload, REGISTER_ERROR_URL);
    checkInputLength($payload, REGISTER_ERROR_URL);
    
    validEmail($_POST['register-email'],REGISTER_ERROR_URL);
    validPasswords($_POST['register-password1'],$_POST['register-password2']);
    checkDataTypes($_POST['adresse-plz'], $_POST['adresse-hausnummer']);
    
    if(!BenutzerExistiert($_POST[BE_DATENNAME])){
        neuerBenutzer(
            $_POST['vorname'], $_POST['nachname'], $_POST['adresse-strasse'],
            $_POST['adresse-hausnummer'], $_POST['adresse-stadt'], $_POST['adresse-plz'],
            $_POST['register-email'], password_hash($_POST['register-password1'], PASSWORD_DEFAULT)     
    );
    }

}

function BenutzerExistiert($email){
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "SELECT * FROM benutzer WHERE ".BE_ROWNAME." = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ".REGISTER_ERROR_URL."error=".returnErrorMessage(7));
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_fetch_assoc($result)){
        mysqli_close($conn);
        header("Location: ".REGISTER_ERROR_URL."error=".returnErrorMessage(8));
        exit();
    }else{
        return false;
    }
}

function neuerBenutzer($vorname, $nachname, $strasse, $hn, $stadt, $plz, $email, $pwd){
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "INSERT INTO benutzer(Vorname, Nachname, Strasse, Hausnummer, Stadt, PLZ, Email, Passwort)
    VALUES (?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ".REGISTER_ERROR_URL."error=".returnErrorMessage(7));
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssss", $vorname, $nachname, $strasse, $hn, $stadt, $plz, $email, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_close($conn);
}