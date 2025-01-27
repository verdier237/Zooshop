<?php require('top.php');

?>
<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">products</th>
                                    <th class="product-name">name of products</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($_SESSION['cart'] as $key => $val) {
                                    $productArray = get_product($con, '', '',  '', $key);
                                    $pname = $productArray[0]['nom'];
                                    $pmrp = $productArray[0]['mrp'];
                                    $pprix = $productArray[0]['prix'];
                                    $image = $productArray[0]['image'];
                                    $qty = $val['qty'];
                                    $total = $pprix * $qty;
                                ?>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img
                                                src="<?php echo PRODUCT_IMAGE_SITE_PATH . $image ?>"
                                                alt="product img" /></a></td>
                                    <td class="product-name"><a href="#"><?php echo $pname ?></a>
                                        <ul class="pro__prize">
                                            <li class="old__prize">$<?php echo $pmrp ?></li>
                                            <li>$<?php echo $pprix ?></li>
                                        </ul>
                                    </td>
                                    <td class="product-price"><span class="amount">$<?php echo $pprix ?></span></td>
                                    <td class="product-quantity"><input type="number" value="<?php echo $qty ?>"
                                            id="<?php echo $key ?>qty" /><br>
                                        <a href="javascript:void(0)"
                                            onclick="manage_cart('<?php echo  $key ?>','update')"> Update</a>
                                    </td>
                                    <td class="product-subtotal">$<?php echo $pprix * $qty ?></td>
                                    <td class="product-remove"><a href="javascript:void(0)"
                                            onclick="manage_cart('<?php echo  $key ?>','remove')"><i
                                                class="icon-trash icons"></i></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="index.php">Continue Shopping</a>
                                </div>
                                <div class="buttons-cart checkout--btn">
                                    <a href="#">update</a>
                                    <a href="#">checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function manage_cart(id, type) {
    if (type == "update") {
        var qty = jQuery("#" + id + "qty").val();
    } else {
        var qty = jQuery("#qty").val();
    }
    jQuery.ajax({
        url: 'manage_cart.php',
        type: 'post',
        data: 'id=' + id + "&qty=" + qty + "&type=" + type,
        success: function(result) {
            if (type == "update" || type == "remove") {
                window.location.href = 'cart.php';
            }
            jQuery('.htc__qua').html(result);
        }
    })
}
</script>
<?php require('footer.php'); ?>