<?php
require('connexion.php');
require('functions.inc.php');
$conex = new Connexion();
$con = $conex->conn;
$nom = get_sefe_value($con, $_POST['name']);
$email = get_sefe_value($con, $_POST['email']);
$mobile = get_sefe_value($con, $_POST['mobile']);
$password = get_sefe_value($con, $_POST['password']);
$heure = date("Y-m-d h:i:s");
$check_query = mysqli_num_rows(mysqli_query($con, "select * from users where email='$email'"));
if ($check_query > 0) {
    echo "present";
} else {
    echo "insert";
    mysqli_query($con, "insert into users (name,email,mobile,password,added_on) values('$nom','$email','$mobile','$password','$heure')");
}
