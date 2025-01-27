<?php require('top.inc.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_sefe_value($con, $_GET['type']);
    if ($type == 'status') {
        $operation = get_sefe_value($con, $_GET['operation']);
        $id = get_sefe_value($con, $_GET['id']);
        if ($operation == "active") {
            $status = '1';
        } else {
            $status = '0';
        }
        $update_status = "update produits set statuts='$status' where id='$id'";
        mysqli_query($con, $update_status);
    }

    if ($type == 'delete') {

        $id = get_sefe_value($con, $_GET['id']);

        $delete_sql = "delete from  produits where id='$id'";
        mysqli_query($con, $delete_sql);
    }
}
$sql = 'select produits.*,categories.categories  from produits,categories where produits.categories_id=categories.id order by produits.id desc';
$res = mysqli_query($con, $sql);

?>

<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Produits </h4>
                        <h4 class="box-link"><a href="manage_produit.php">Nouveau Produit </a></h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>ID</th>
                                        <th>Categories</th>
                                        <th>Nom</th>
                                        <th>Image</th>
                                        <th>Mrp</th>
                                        <th>Prix</th>
                                        <th>Quantite</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <td class="serial"><?php echo $i ?></td>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['categories'] ?></td>
                                            <td><?php echo $row['nom'] ?></td>
                                            <td><img src=" <?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" /></td>
                                            <td><?php echo $row['mrp'] ?></td>
                                            <td><?php echo $row['prix'] ?></td>
                                            <td><?php echo $row['quantite'] ?></td>
                                            <td><?php

                                                if ($row["statuts"]  == 1) {
                                                    echo "<span class='badge badge-complete'> <a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a></span>&nbsp;";
                                                } else {
                                                    echo "<span class='badge badge-pending'> <a href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a></span>&nbsp;";
                                                }
                                                echo "<span class='badge badge-edit'> <a href='manage_produit.php?id=" . $row['id'] . "'>Edit</a></span>&nbsp;";
                                                echo "<span class='badge badge-delete'> <a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>";
                                                //  echo "<a href='?type=delete&id=".$row['id']."'>Edit</a>";

                                            }

                                                ?></td>

                                        </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require('footer.inc.php'); ?>