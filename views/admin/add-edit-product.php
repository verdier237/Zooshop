<!-- Page pour ajouter ou modifier un produit -->
<form method="POST" action="addOrEditProductConfirmation">
    <div class=" container-fluid my-5 ">
        <div class="row justify-content-center ">
            <div class="col-xl-10">
                <div class="card shadow-lg ">
                    <div class="row p-2 mt-3 justify-content-between mx-sm-2">
                    </div>


                    <div class="row justify-content-around mt-5">
                        <div class="col-md-10">
                            <div class="card border-0">
                                <div class="card-header pb-0">
                                    <h2 class="card-title space ">

                                        <?php 
                                                if (empty($product->id)){
                                                    echo "Nouveau produit";
                                                }else{
                                                    echo "Modifier un produit";
                                                }
                                            ?>
                                    </h2>
                                    <p class="card-text text-muted mt-4  space"> Details du produit</p>
                                    <hr class="my-0">
                                </div>
                                <div class="card-body row mb-5">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="NAME" class="small text-muted mb-1">Nom</label>
                                            <input type="text" value="<?php echo $product->name ?>"
                                                class="form-control form-control-sm" name="name" id="NAME" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="NAME" class="small text-muted mb-1">Prix</label>
                                            <input type="number" value="<?php echo $product->price ?>"
                                                class="form-control form-control-sm" name="price" id="NAME" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="NAME" class="small text-muted mb-1">Quantité</label>
                                            <input type="number" value="<?php echo $product->quantity ?>"
                                                class="form-control form-control-sm" name="quantity" id="NAME" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="NAME" class="small text-muted mb-1">Categorie</label>
                                            <select class="form-select" placeholder="Sectionner une categorie"
                                                name="categoryId"
                                                value="<?php if(!empty($product->category)) echo $product->category->id ?>"
                                                required>
                                                <?php 
                                                        //while($obj = $result->fetch_object()) {
                                                        foreach($categories as $category){
                                                    ?>
                                                <option value="<?php echo $category->id ?>">
                                                    <?php echo $category->name ?></option>
                                                <?php
                                                        }
                                                    ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="NAME" class="small text-muted mb-1">Url de l'image</label>
                                            <input type="text" value="<?php echo $product->imgUrl ?>"
                                                class="form-control form-control-sm" name="imgUrl" id="NAME" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="description" class="small text-muted mb-1">Description</label>
                                            <textarea name="description" class="form-control form-control-sm"
                                                id="description" cols="100" rows="6"
                                                required><?php echo $product->description?></textarea>
                                        </div>

                                        <?php 
                                                if (!empty($product->id)){
                                            ?>
                                        <input name="id" value="<?php echo $product->id ?>" style="display:none" />

                                        <?php 
                                                 }
                                            ?>


                                        <div class="row mb-5 mt-4">
                                            <div class="col-md-7 col-lg-6 mx-auto"><button type="submit"
                                                    class="btn btn-block btn-outline-primary btn-lg">Enregistrer</button>
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
    </div>
</form>