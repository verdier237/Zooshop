<?php
require('top.inc.php');
$msg = '';
$categories = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_sefe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from categories where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $categories = $row['categories'];
    } else {
        header('location:categories.php');
        die();
    }
}
if (isset($_POST['submit'])) {
    $categories = get_sefe_value($con, trim($_POST['categories']));
    $res = mysqli_query($con, "select * from categories where categories='$categories'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "La categorie que vous avez saisie existe déja dans la base de données!";
            }
        } else {
            $msg = "La categorie que vous avez saisie existe déja dans la base de données!";
        }
    }
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $id = get_sefe_value($con, $_GET['id']);
            mysqli_query($con, "update categories set categories='$categories' where id='$id'");
        } else {
            mysqli_query($con, "insert into categories(categories,statuts) values('$categories','1')");
        }
        header('location:categories.php');
        die();
    }
}


?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                    <form method="post">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Categorie</label>
                                <input type="text" name="categories" placeholder="Saisie le nom de la categorie" class="form-control" value='<?php echo $categories; ?>'>
                            </div>

                            <button id="payment-button" style="background-color:#c43b68" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount" name="submit">Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg ?> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('footer.inc.php'); ?>