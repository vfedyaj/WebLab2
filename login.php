<?php
session_start();
?>

<!DOCTYPE html>
    <head>
<html>
        <meta charset="UTF-8">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
            <link rel="stylesheet" href="assets/css/style1.css">
    </head>
<body>
<div class="container">
<form action="auth.php" method="post">
 <div class="input-field"> <input placeholder="Email"  type="text" name="login" > </div>
 <div class="input-field"> <input placeholder="Password"  type="password" name="password"> </div> 
 <input type="submit" class="btn" value="Send">
 <input type="reset" class="btn" value="Clear">
    <p class="register">
        Don't have an account?  - <a href="/Lab2/registration.php">Register</a> 
    </p>   
</form>
</div>

<?php 
        if (isset($_GET["submit"])) {
            echo 'adfa';
            header('Location: main.php');
            exit;
        }
    ?>
</body>
</html>
