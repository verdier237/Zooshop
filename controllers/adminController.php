<?php 

    class AdminController {

        //afficher la page des achats
        public function orders() {
            $this->isAuthenticated();

            $orders = Purchase::getAllPurchases();

            require_once('views/admin/orders.php');
        }

        //afficher la page des produits
        public function products() {
            $this->isAuthenticated();

            $products = Product::getAllProducts();

            require_once('views/admin/products.php');
        }

        //afficher la page pour ajouter ou supprimer un produit
        public function addOrEditProduct(){
            $this->isAuthenticated();
            
            $categories = Category::getAllCategories();

            $product = null;
            //recuperer le produit dans le cas de modification ou créer un nouveau vide

            if (isset($_GET['id'])){
                //modifier le produit
                $product = Product::getProductById($_GET['id']);
            }else{
                //ajouter un nouveau produit
                $product = new Product(null, null, null, null, null, null, null);
            }

            require_once('views/admin/add-edit-product.php');
        }


        //afficher la page de confirmation apres avoir créer ou modifier le produit
        public function addOrEditProductConfirmation(){
            $this->isAuthenticated();

            $data = [
                'quantity' => $_POST["quantity"],
                'price' => $_POST["price"],
                'imgUrl' => $_POST["imgUrl"],
                'categoryId' => $_POST["categoryId"],
                'name' => $_POST["name"],
                'description' => $_POST["description"]
            ];

            if (!isset($_POST['id'])){
                //ajouter un nouveau produit
                Product::addProduct($data);

            }else{
                //modifier le produit
                Product::editProduct($data, $_POST['id']);
            }

            require_once('views/admin/add-edit-product-confirmation.php');
        }

        
        //afficher la page de confirmation de la suppression de produit apres avoir supprimer le produit
        public function deleteProduct(){
            $this->isAuthenticated();
            
            $categories = Category::getAllCategories();

            $product = null;
            if (isset($_GET['id'])){
                //supprimer le produit
                $product = Product::deleteProduct(intval($_GET['id']));

            }

            require_once('views/admin/delete-product-confirmation.php');
        }


        //verifier si l'utilisateur c'est authentifié ou pas 
        public function isAuthenticated(){
            if(session_id() == '' || !isset($_SESSION)){session_start();}

            //sinon on le redirige vers la page d'authentification
            if(!isset($_SESSION["login"])){
                header("location:/boutique/login/login");
            }
        }
    }

?>