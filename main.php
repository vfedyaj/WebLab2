<!doctype html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <style>
.raz {
  text-align: center;
}
    </style>
    </head>

    <body>
    <div class="header">
        <tr>
        <th><a href="main.php"><img src="assets\img\log.png" height="100" width="100"></a></th>

            <div class="raz">
                    <?php if(isset($_SESSION['username'])): ?>
                        <a href="profile.php?id=<?php echo $_SESSION["id"]; ?>"><?php echo $_SESSION['username']; ?></a>
                    <?php else: ?>
                        <button type="button" class="btn" data-toggle="modal" data-target="#modal">Sign in</button>
                        <span> | </span>
                        <button type="button" class="btn btn-primary" onClick="location.href='signout.php'">Sign out</button>
                        <span> | </span>
                        <button type="button" class="btn" onClick="location.href='registration.php'">Sign up</button>
                    <?php endif; ?>
            </div>

            <div>
            </tr>
        <?php  require "db.php"; 
        ?>
        
                <div class="container">
                    <table class="iksweb">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <?php $result = $mysqli->query("SELECT user.id, user.first_name, user.last_name, user.email, role.title AS title FROM users user JOIN roles role ON user.role_id = role.id"); 
                        if ($result->num_rows > 0) 
                        while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><a href="profile.php?id=<?php echo $row["id"]; ?>"><?php echo $row["id"]; ?></a></td>
                                <td><?php echo $row["first_name"]; ?></td>
                                <td><?php echo $row["last_name"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["title"];?></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-auto">
                    <?php if(isset($_SESSION['role'])): ?>
                        <?php if($_SESSION['role'] == 1): ?>
                            <button type="button" class="btn btn-primary" onClick="location.href='registration.php'">Add User</button>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="labelModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="labelModal">Sign In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form action="process.php" method="POST">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword" name="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" name="password">
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="signin">Sign in</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>