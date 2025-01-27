<!-- Afficher le panier -->
<form method="POST" action="purchaseConfirmed">
    <div class=" container-fluid my-5 ">
        <div class="row justify-content-center ">
            <div class="col-xl-10">
                <div class="card shadow-lg ">
                    <div class="row p-2 mt-3 justify-content-between mx-sm-2">
                    </div>


                    <div class="row justify-content-around mt-5">
                        <div class="col-md-5">
                            <div class="card border-0">
                                <div class="card-header pb-0">
                                    <h2 class="card-title space ">Achat</h2>
                                    <p class="card-text text-muted mt-4  space"> Details de l'acheteur</p>
                                    <hr class="my-0">
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="NAME" class="small text-muted mb-1">Nom</label>
                                        <input type="text" class="form-control form-control-sm" name="firstName"
                                            id="NAME" aria-describedby="helpId" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="NAME" class="small text-muted mb-1">Prenom</label>
                                        <input type="text" class="form-control form-control-sm" name="lastName"
                                            id="NAME" aria-describedby="helpId" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="NAME" class="small text-muted mb-1">Adresse</label>
                                        <textarea name="address" class="form-control form-control-sm" id="address"
                                            cols="100" rows="6" required></textarea>
                                    </div>

                                    <!-- Pour l'instant il y a qu'un element par article dans le panier -->
                                    <input name="quantity" value="1" style="display:none" />


                                    <div class="row mb-md-5">
                                        <div class="col">
                                            <button type="button" name="" id="" class="btn  btn-lg btn-block ">Achat de
                                                <?php echo $cartPrice ?> $</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card border-0 ">
                                <div class="card-header card-2">
                                    <p class="card-text text-muted mt-md-4  mb-2 space">Votre commande</p>
                                    <hr class="my-2">
                                </div>
                                <div class="card-body pt-3">
                                <?php 
                                    foreach($products as $product){
                                ?>
                                    <div class="row  justify-content-between">
                                        <div class="col-auto col-md-7">
                                            <div class="media flex-column flex-sm-row">
                                                <img class=" img-fluid" src="<?php echo $product->imgUrl?>" width="62"
                                                    height="62">
                                                <div class="media-body  my-auto">
                                                    <div class="row ">
                                                        <div class="col-auto">
                                                            <p class="mb-0"><b><?php echo $product->name ?></b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" pl-0 flex-sm-col col-auto  my-auto">
                                            <p class="boxed-1">1</p>
                                        </div>
                                        <div class=" pl-0 flex-sm-col col-auto  my-auto ">
                                            <p><b><?php echo $product->price ?> $</b></p>
                                        </div>
                                        <div class=" pl-0 flex-sm-col col-auto  my-auto ">
                                        <a class="btn btn-primary btn-rounded" href="/boutique/product/deleteFromCart?id=<?php echo $product->id?>"
                                            role="button">Supprimer</a>                                        
                                        </div>
                                    </div>

                                <?php 
                                    }
                                ?>
                                    <hr class="my-2">

                                    <?php 
                                    if (sizeof($products) != 0) {
                                ?>
                                    <div class="row mb-3 mt-4 ">
                                        <div class="col-md-7 col-lg-6 mx-auto"><button type="submit"
                                                class="btn btn-block btn-outline-primary btn-lg">Acheter
                                                maintenant</button></div>
                                    </div>

                                    <?php 
                                    }
                                ?>
                                    <div class="row mb-5 mt-2 ">
                                        <div class="col-md-7 col-lg-6 mx-auto">
                                            <a class="btn btn-block btn-outline-primary btn-lg" href="/boutique/" role="button">Continuer d'acheter</a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>