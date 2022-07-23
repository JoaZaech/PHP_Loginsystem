<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="backend/login_handling.php" method="POST">
        <input required type="email" name="login-email" placeholder="Email"><br>
        <input required type="password" name="login-pwd" placeholder="Password">
        <button type="submit" name="login-submit">Einloggen</button>
    </form>
</body>
</html>