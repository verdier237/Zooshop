<?php
require('connexion.inc.php');
require('connexion.php');
$conex = new Connexion();
$con = $conex->conn;
require('functions.inc.php');
$msg = '';

if (isset($_POST['submit'])) {
    $username = get_sefe_value($con, $_POST['username']);
    $password = get_sefe_value($con, $_POST['password']);
    $sql = "select * from admin_users where username='$username' and password='$password'";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    if ($count > 0) {

        $_SESSION['ADMIN_LOGIN'] = 'yes';

        $_SESSION['ADMIN_USERNAME'] = $username;

        header('location: categories.php')
            or
            die('Impossible de rediriger vers la page categories.php');
    } else {
        $msg = 'Utilisateur ou Mot de passe incorrect';
    }
}
?>
<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<header id="header" class="header">

    <body class="bg-dark">
        <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="login-content">
                    <div class="login-form mt-150">
                        <form method="POST">
                            <div class="form-group">
                                <a href="categories.php"><img src="images/logo.png" alt="Logo"></a>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="username" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30"
                                style="background-color:#c43b68">Sign
                                in</button>
                        </form>
                        <div class="field_error"><?php echo $msg ?> </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="assets/js/popper.min.js" type="text/javascript"></script>
        <script src="assets/js/plugins.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
    </body>

</html>