<!-- Page pour afficher les produits -->
<div class="container my-auto">
    <h2 style="text-align:center" class="my-5">Produits</h2>
    <div class="w-100 d-flex  flex-row-reverse">
        <a class="btn btn-block btn-outline-primary mb-2" href="/boutique/admin/addOrEditProduct" type="button">
            Ajouter un nouveau produit
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Categorie</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                          foreach($products as $product){
                    ?>
                                <tr>
                                    <th scope="row"><img class=" img-fluid" src="<?php echo $product->imgUrl?>"
                                            width="300px" height="300px"></th>
                                    <th scope="row"><?php echo $product->name ?></th>
                                    <td><?php echo $product->category->name ?></td>
                                    <td><?php echo $product->quantity ?></td>
                                    <td><?php echo $product->price ?>$</td>
                                    <td><?php echo $product->description ?></td>
                                    <td class="d-flex flex-column">

                                        <a class="btn btn-block btn-outline-primary mb-2" type="button"
                                            href="/boutique/admin/addOrEditProduct?id=<?php echo $product->id ?>">
                                            Modifier
                                        </a>
                                        <a class="btn btn-block btn-outline-danger " type="button"
                                            href="/boutique/admin/deleteProduct?id=<?php echo $product->id ?>">
                                            Supprimer
                                        </a>
                                    </td>
                                </tr>

                                <?php 
                        }
                    ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>