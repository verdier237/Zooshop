<?php require('top.php');
$cat_id = mysqli_real_escape_string($con, $_GET['id']);
if (is_numeric($cat_id)) {
    $get_product = get_product($con, '', '', $cat_id);
} else {
?><script>
        window.location.href = 'index.php';
    </script> <?php
                die();
            }
                ?>
<div class="body__overlay"></div>


<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.png) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Accueil</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Produits</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  col-md-12  col-sm-9 col-xs-9">
                <div class="htc__product__rightidebar">


                    <div class="row">
                        <?php if (count($get_product) > 0) {
                        ?>
                            <div class="shop__grid__view__wrap">
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                    <?php

                                    foreach ($get_product as $list) { ?>
                                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="produit.php?id=<?php echo $list['id']; ?>">
                                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images">
                                                    </a>
                                                </div>


                                                <div class="fr__product__inner">
                                                    <h4><a href="product-details.html"><?php echo $list['nom']; ?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li class="old__prize"><?php echo "$ " . $list['mrp']; ?></li>
                                                        <li><?php echo "$ " . $list['prix']; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>

                    </div>
                <?php } else {
                            echo "<br><center><h2>Aucun produit n'est disponible dans le stock</h2></center>";
                        }
                ?>
                </div>

            </div>

        </div>
    </div>
</section>

<?php require('footer.php'); ?>