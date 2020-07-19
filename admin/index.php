<?php
    require 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery.min.js"></script>
    <title>Admin</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4 admin-login card">
                <center>
                    <div class="card-header">
                        <h3>Wabe Cars Admin</h3>
                    </div>
                </center>
                <div class="card-body">
                    <strong><h5>Login</h5><strong>
                    <?php
                        if(isset($_SESSION['error'])){
                            echo '<h6 class="login-error">'.$_SESSION['error'].'</h6>';
                            $_SESSION['error'] = NULL;
                        }
                        if (isset($_SESSION['logged_in'])) {
                            header('Location: homepage.php');
                        }
                    ?>
                    <form class="form-group" action="login.php" method="POST">
                        <label for="username">username:</label>
                        <input type="text" placeholder="username" name="username" class="form-control" required>
                        <label for="password">password:</label>
                        <input type="password" placeholder="password" name="password" class="form-control" required><br>
                        <input type="submit" class="btn btn-primary" value="login">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>