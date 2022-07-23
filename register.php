<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="backend/register_handling.php" method="POST">
 <!---Namen: --->
        <input <?php if(ED_VORNAME) echo "required maxlength=".ML_VORNAME; ?> 
        type="text" name="vorname" placeholder="Vorname"><br>

        <input <?php if(ED_NACHNAME) echo "required maxlength=".ML_NACHNAME; ?> 
        type="text" name="nachname" placeholder="Nachname"><br>
<!---Adresse: --->
        <input <?php if(ED_STRASSE) echo "required maxlength=".ML_STRASSE; ?> 
        type="text" name="adresse-strasse" placeholder="Straße"><br>

        <input <?php if(ED_HAUSNUMMER) echo "required maxlength=".ML_HAUSNUMMER; ?> 
        type="number" name="adresse-hausnummer" placeholder="Hausnummer"><br>

        <input <?php if(ED_STADT) echo "required maxlength=".ML_STADT; ?> 
        type="text" name="adresse-stadt" placeholder="Stadt"><br>

        <input <?php if(ED_PLZ) echo "required maxlength=".ML_PLZ; ?> 
        type="number" name="adresse-plz" placeholder="PLZ"><br>
<!---E-mail: --->
        <input <?php if(ED_EMAIL) echo "required maxlength=".ML_EMAIL; ?> 
        type="email" name="register-email" placeholder="Email"><br>
    
<!---Passwörter: --->
        <input required <?php echo "minlength=".ml_PWD; ?> type="password" name="register-password1" placeholder="Passwort1"><br>
        <input required <?php echo "minlength=".ml_PWD; ?> type="password" name="register-password2" placeholder="Passwort1.1"><br>
        <button type="submit" name="register-submit">Registrieren</button>
    </form>
</body>
</html>