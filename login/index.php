<?php
    require('../vendor/autoload.php');
    include('login.php'); // Includes Login Script

    if(isset($_SESSION['login_user'])){
        header("location: profil.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="index.css" />
    <script src="main.js"></script>   
</head>
<body>
    <label>login</label>
    <form action="login.php" method="post">
        <label for="username">Username</label>
        <div>    
            <input type="text" name="username" placeholder="Username">
        </div>
        <label for="password">Password</label>
        <div>
            <input type="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

</body>
</html>