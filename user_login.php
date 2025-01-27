<?php
require('connexion.php');
require('functions.inc.php');
session_start();
$conex = new Connexion();
$con = $conex->conn;
$email = get_sefe_value($con, $_POST['email']);
$password = get_sefe_value($con, $_POST['password']);
$res = mysqli_query($con, "select * from users where email='$email' and password='$password'");
$check_query = mysqli_num_rows($res);
if ($check_query > 0) {
    $row = mysqli_fetch_assoc($res);
    $_SESSION['USER_LOGIN'] = 'yes';
    $_SESSION['USER_ID'] = $row['id'];
    $_SESSION['USER_NAME'] = $row['name'];

    echo "valid";
} else {
    echo "erreur";
}
