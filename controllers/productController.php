<?php 

    class ProductController {

        
        public function index() {
            $products = Product::getAllProducts();
            require_once('views/products/index.php');
        }


     
        public function show() {
            $productId = $_GET['id'];
            $product = Product::getProductById($productId);
            require_once('views/products/show.php');
        }

    
        public function purchase() {
            session_start();
            if (isset($_GET['id'])){
                
             
                $product = Product::getProductById($_GET['id']);

               
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array(); 
                }
    
             
                $item_index = -1;
                foreach ($_SESSION['cart'] as $index => $cart_item) {
                    if ($cart_item->id == $_GET['id']) {
                        $item_index = $index;
                        break;
                    }
                }

      
                if ($item_index == -1) {
                    array_push($_SESSION['cart'], $product);
                }
            }

            header("location:/boutique/product/showCart");
        }

        
        public function purchaseConfirmed(){
            session_start();
            $products = $_SESSION['cart'];
            foreach($products as $p){
                $data = [
                    'firstName' => $_POST["firstName"],
                    'lastName' => $_POST["lastName"],
                    'quantity' => $_POST["quantity"],
                    'address' => $_POST["address"],
                    'productId' => $p->id
                ];
                Purchase::addPurchase($data);    
            }
           
            unset($_SESSION['cart']);
            require_once('views/products/purchase-confirmation.php');
        }

        
        public function showCart(){
            session_start();
            $products = [];
            $cartPrice = 0;
            if (isset($_SESSION['cart'])){
                
                $products = $_SESSION['cart'];
                foreach($products as $p){
                    $cartPrice = $cartPrice + $p->price;
                }
            }
            require_once('views/products/purchase.php');
            
        }

 
        public function deleteFromCart(){
            session_start();
            if (isset($_GET['id'])){
                $cart = $_SESSION['cart'];
                
                foreach ($cart as $index => $cart_item) {
                    if ($_GET['id'] == $cart_item->id) {
                        unset($_SESSION['cart'][$index]);
                    }
                }
            }
            header("location:/boutique/product/showCart");
        }
    }