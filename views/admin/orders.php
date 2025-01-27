<!-- Page pour afficher les achats -->
<div class="container my-auto">
    <h2 style="text-align:center" class="my-5">Achats</h2>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Produit</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Adresse</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                        //while($obj = $resultOrders->fetch_object()) {
                          foreach($orders as $order){
                    ?>
                                <tr>
                                    <th scope="row"><img class=" img-fluid" src="<?php echo $order->product->imgUrl?>"
                                            width="60px" height="60px"></th>
                                    <th scope="row"><?php echo $order->product->name ?></th>
                                    <td><?php echo $order->firstName ?></td>
                                    <td><?php echo $order->lastName ?></td>
                                    <td><?php echo $order->quantity ?></td>
                                    <td><?php echo $order->product->price ?> $</td>
                                    <td><?php echo $order->address ?></td>
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