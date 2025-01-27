<?php

function pr($arr)
{
    echo '<pre>';
    print_r($arr);
}

function prx($arr)
{
    echo '<pre>';
    print_r($arr);
    die();
}

function get_product($con, $type = '', $limit = '', $cat_id = '', $product_id = '')
{

    $sql = "Select produits.*, categories.categories from produits,categories where categories.statuts=1";
    if ($cat_id != '') {
        $sql .= " and produits.categories_id=$cat_id ";
    }
    if ($product_id != '') {
        $sql .= " and produits.id=$product_id ";
    }
    $sql .= " and produits.categories_id=categories.id ";
    if ($type == 'latest') {
        $sql .= " order by produits.id desc";
    }
    if ($limit != '') {
        $sql .= " limit $limit";
    }
    $res = mysqli_query($con, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    return $data;
}
function get_sefe_value($con, $str)
{
    if ($str != '') {
        $str = trim($str);
        return  mysqli_real_escape_string($con, $str);
    }
}
