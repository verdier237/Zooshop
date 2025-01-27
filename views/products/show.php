<!-- Afficher la page du produit -->
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><?php echo $product->name ?></h3>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center mt-5"><img src="<?php echo $product->imgUrl?>"
                            style="max-width:100%"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5">Description du produit</h4>
                    <p><?php echo $product->description ?></p>
                    <div class="d-flex">
                        <h2 class="mt-5">
                            <?php echo $product->price ?> $
                        </h2>
                        <h6 class="mt-auto mb-2" style="margin-left:0.5rem">
                            (<?php echo $product->quantity ?> en stock)
                        </h6>
                    </div>

                    <a class="btn btn-primary btn-rounded" href="/boutique/product/purchase?id=<?php echo $product->id?>"
                        role="button">Ajouter au panier</a>
                    <h3 class="box-title mt-5">Avantages :</h3>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success"></i>Livraison gratuite</li>
                        <li><i class="fa fa-check text-success"></i>Service client 7/7</li>
                        <li><i class="fa fa-check text-success"></i>Trés bonne qualité</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>