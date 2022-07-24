<?php session_start(); ?>
<?php if(isset($_SESSION['uid'])): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1>You are logged in!</h1>
    <?php else: ?>
        <?php echo "<h1>Please login to access this page!</h1>" ?>
    <?php endif; ?>    
</body>
</html>
