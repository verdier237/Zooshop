<?php require('top.php');
$product_id = mysqli_real_escape_string($con, $_GET['id']);

if (is_numeric($product_id)) {
    $get_product = get_product($con, '', '', '', $product_id);
} else {
?><script>
window.location.href = 'index.php';
</script> <?php
                die();
            }



                ?>
<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(images/bg/4.png) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Accueil</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <a class="breadcrumb-item"
                                href="categories.php?id=<?php echo $get_product['0']['categories_id']  ?>"><?php echo $get_product['0']['categories']  ?></a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active"><?php echo $get_product['0']['nom']  ?></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="htc__product__details bg__white ptb--100">

    <div class="htc__product__details__top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">

                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $get_product['0']['image'] ?>"
                                        alt="full-image">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="ht__product__dtl">
                        <h2><?php echo $get_product['0']['nom']  ?></h2>
                        <ul class="pro__prize">
                            <li class="old__prize"><?php echo "$" . $get_product['0']['mrp']  ?></li>
                            <li><?php echo "$" . $get_product['0']['prix']  ?></li>
                        </ul>
                        <p class="pro__info"><?php echo  $get_product['0']['petiteDescription']  ?></p>
                        <div class="ht__pro__desc">
                            <div class="sin__desc">
                                <p><span>Availability:</span> In Stock</p>
                            </div>
                            <div class="sin__desc align--left">
                                <p><span>Categories:</span></p>
                                <ul class="pro__cat__list">
                                    <li><a href="#"><?php echo $get_product['0']['categories']  ?></a></li>
                                </ul>
                            </div>
                            <div class="sin__desc">
                                <p><span>Quantité:</span></p>
                                <select id="qty" style="width:40px;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>

                                </select>
                            </div>
                            <div class="sin__desc align--left">
                                <div class="cr__btn">
                                    <a href="javascript:void(0)"
                                        onclick="manage_cart('<?php echo  $get_product['0']['id']  ?>','add')">Ajouter
                                        dans le
                                        panier</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
<section class="htc__produc__decription bg__white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <ul class="pro__details__tab" role="tablist">
                    <li role="presentation" class="description active"><a href="#description" role="tab"
                            data-toggle="tab">description</a></li>
                </ul>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="ht__pro__details__content">

                    <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                        <div class="pro__tab__content__inner">
                            <p><?php echo  $get_product['0']['petiteDescription']  ?></p>
                            <h4 class="ht__pro__title">Description</h4>
                            <p><?php echo  $get_product['0']['description']  ?></p>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<script>
function manage_cart(id, type) {
    var qty = jQuery("#qty").val();
    jQuery.ajax({
        url: 'manage_cart.php',
        type: 'post',
        data: 'id=' + id + "&qty=" + qty + "&type=" + type,
        success: function(result) {
            jQuery('.htc__qua').html(result);
        }
    })
}
</script>
<?php require('footer.php'); ?>