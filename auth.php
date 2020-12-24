<?php
    require "db.php";
    $id = 0;
    $first_name = ''; $last_name = ''; $role = ''; $email = ''; $password = ''; $photo = '';
    $update = false;
    
    if(isset($_POST['login'])) {
        $result = $mysqli->query("SELECT id, first_name, email, password, role_id FROM users") or die(mysqli_error($mysqli));
        while ($row = $result->fetch_assoc()) {
            if ($row['email'] == $_POST['email'] && $row['password'] == $_POST['password']) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['first_name'];
                $_SESSION['role'] = $row['role_id'];
            }
        }
        header("Location: main.php");
    }
?>
