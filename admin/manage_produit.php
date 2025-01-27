<?php
require('top.inc.php');
$msg = '';
$categories_id = '';
$nom = '';
$mrp = '';
$prix = '';
$quantite = '';
$image = '';
$petiteDescription = '';
$description = '';
$metaTitre = '';
$metaDescription = '';
$metaKeyword = '';
$image_required = "required";


if (isset($_GET['id']) && $_GET['id'] != '') {
    $image_required = "";
    $id = get_sefe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from produits where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $categories_id = $row['categories_id'];
        $nom = $row['nom'];
        $mrp = $row['mrp'];
        $prix = $row['prix'];
        $quantite = $row['quantite'];
        $petiteDescription = $row['petiteDescription'];
        $description = $row['description'];
        $metaTitre = $row['metaTitre'];
        $metaDescription = $row['metaDescription'];
        $metaKeyword = $row['metaKeyword'];
    } else {
        header('location:produit.php');
        die();
    }
}
if (isset($_POST['submit'])) {
    $categories_id = get_sefe_value($con, trim($_POST['categories_id']));
    $nom = get_sefe_value($con, trim($_POST['nom']));
    $mrp = get_sefe_value($con, trim($_POST['mrp']));
    $prix = get_sefe_value($con, trim($_POST['prix']));
    $quantite = get_sefe_value($con, trim($_POST['quantite']));

    $petiteDescription = get_sefe_value($con, trim($_POST['petiteDescription']));
    $description = get_sefe_value($con, trim($_POST['description']));
    $metaTitre = get_sefe_value($con, trim($_POST['metaTitre']));
    $metaDescription = get_sefe_value($con, trim($_POST['metaDescription']));
    $metaKeyword = get_sefe_value($con, trim($_POST['metaKeyword']));







    $res = mysqli_query($con, "select * from produits where nom='$nom'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "Le produit que vous avez saisie existe déja!";
            }
        } else {
            $msg = "Le produit que vous avez saisie existe déja!";
        }
    }

    //if ($_FILES['image']['type'] != '' && ($_FILES['image']['type'] != 'image/png' || $_FILES['image']['type'] != 'image/jpg'
    //  || $_FILES['image']['type'] != 'image/jpeg')) {
    //$msg = "Merci de choisir que les images avec format 'png/jpg/jpeg'";
    // }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $id = get_sefe_value($con, $_GET['id']);
            if ($_FILES['image']['name'] != '') {
                $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
                $dossier = PRODUCT_IMAGE_SERVER_PATH;
                $cheminPhoto = $dossier . $image;
                move_uploaded_file($_FILES['image']['tmp_name'], $cheminPhoto);
                $updateSql = "update produits set categories_id=$categories_id,nom='$nom',mrp=$mrp
                ,prix=$prix,quantite=$quantite,petiteDescription='$petiteDescription',description='$description'
                ,metaTitre='$metaTitre',metaDescription='$metaDescription',metaKeyword='$metaKeyword',image='$image'

                where id=$id";
            } else {
                $updateSql = "update produits set categories_id=$categories_id,nom='$nom',mrp=$mrp
                ,prix=$prix,quantite=$quantite,petiteDescription='$petiteDescription',description='$description'
                ,metaTitre='$metaTitre',metaDescription='$metaDescription',metaKeyword='$metaKeyword' where id=$id";
            }

            mysqli_query($con, $updateSql);
        } else {
            $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
            $dossier = PRODUCT_IMAGE_SERVER_PATH;
            $cheminPhoto = $dossier . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], $cheminPhoto);

            mysqli_query($con, "insert into produits(categories_id,nom,mrp,prix,quantite,petiteDescription,description,metaTitre,metaDescription,metaKeyword,statuts,image) 
            values($categories_id,'$nom',$mrp,$prix,$quantite,'$petiteDescription','$description','$metaTitre','$metaDescription','$metaKeyword',1,'$image')");
        }

        header('location:produit.php');
        die();
    }
}


?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Produits</strong><small> Form</small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Categories</label>
                                <select class="form-control" name="categories_id">
                                    <option>Select Categories</option>
                                    <?php
                                    $res = mysqli_query($con, "select id,categories from categories order by categories asc");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        if ($categories_id == $row['id']) {
                                            echo "<option selected value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                        } else {
                                            echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                        }
                                    }

                                    ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="nom" class=" form-control-label">Nom du produit</label>
                                <input type="text" required name="nom" placeholder="Saisie le nom du produit"
                                    class="form-control" value='<?php echo $nom; ?>'>
                            </div>
                            <div class="form-group">
                                <label for="mrp" class=" form-control-label">Mrp du produit</label>
                                <input type="text" required name="mrp" placeholder="Saisie le mrp du produit"
                                    class="form-control" value='<?php echo $mrp; ?>'>
                            </div>
                            <div class="form-group">
                                <label for="prix" class=" form-control-label">Prix du produit</label>
                                <input type="number" required name="prix" placeholder="Saisie le prix du produit"
                                    class="form-control" value='<?php echo $nom; ?>'>
                            </div>
                            <div class="form-group">
                                <label for="quantite" class=" form-control-label">Quantité du produit</label>
                                <input type="number" required name="quantite"
                                    placeholder="Saisie la quantité du produit" class="form-control"
                                    value='<?php echo $quantite; ?>'>
                            </div>
                            <div class="form-group">
                                <label for="image" class=" form-control-label">Image du produit</label>
                                <input type="file" <?php echo $image_required; ?> name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="petiteDescription" class=" form-control-label">Petite déscription du
                                    produit</label>
                                <input type="text" required name="petiteDescription"
                                    placeholder="Saisie la petite description" class="form-control"
                                    value='<?php echo $petiteDescription; ?>'>
                            </div>
                            <div class="form-group">
                                <label for="description" class=" form-control-label">Déscription</label>
                                <textarea rows=5 required name="description"
                                    placeholder="Saisie la déscriptio du produit"
                                    class="form-control"><?php echo $description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="metaTitre" class=" form-control-label">Meta titre du produit</label>
                                <input type="text" required name="metaTitre"
                                    placeholder="Saisie le meta titre du produit" class="form-control"
                                    value='<?php echo $metaTitre; ?>'>
                            </div>
                            <div class="form-group">
                                <label for="metaDescription" class=" form-control-label">Meta Description
                                    produit</label>
                                <input type="text" required name="metaDescription"
                                    placeholder="Saisie le meta description du produit" class="form-control"
                                    value='<?php echo $metaDescription; ?>'>
                            </div>
                            <div class="form-group">
                                <label for="metaKeyword" class=" form-control-label">Meta Keyword
                                    produit</label>
                                <input type="text" required name="metaKeyword"
                                    placeholder="Saisie le meta keyword du produit" class="form-control"
                                    value='<?php echo $metaKeyword; ?>'>
                            </div>
                            <button id="payment-button" style="background-color:#c43b68" name="submit" type="submit"
                                class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount" name="submit">Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg ?> </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php require('footer.inc.php'); ?>