<?php
require('connexion.php');
require('functions.inc.php');
$conex = new Connexion();
$con = $conex->conn;
$nom = get_sefe_value($con, $_POST['name']);
$email = get_sefe_value($con, $_POST['email']);
$mobile = get_sefe_value($con, $_POST['mobile']);
$comment = get_sefe_value($con, $_POST['message']);
$heure = date("Y-m-d h:i:s");
mysqli_query($con, "insert into contact_us (name,email,mobile,comment,added_on) values('$nom','$email','$mobile','$comment','$heure')");
