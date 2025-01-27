<?php
require('connexion.php');
require('add_to_cart.php');
require('functions.inc.php');
session_start();
$conex = new Connexion();
$con = $conex->conn;
$id = get_sefe_value($con, $_POST['id']);
$qty = get_sefe_value($con, $_POST['qty']);
$type = get_sefe_value($con, $_POST['type']);

$obj = new Add_to_cart();
if ($type == "add") {
    $obj->add_product($id, $qty);
}
if ($type == "remove") {
    $obj->remove_product($id);
}
if ($type == "update") {
    $obj->update_product($id, $qty);
}

echo $obj->total_product();
