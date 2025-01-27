<?php

    class Product {

        public $id;
        public $name;
        public $quantity;
        public $price;
        public $category;
        public $description;
        public $imgUrl;

        public function __construct($id, $name, $quantity, $price, $category, $description, $imgUrl){
            $this->id = $id;
            $this->name = $name;
            $this->quantity = $quantity;
            $this->price = $price;
            $this->category = $category;
            $this->description = $description;
            $this->imgUrl = $imgUrl;
        }

        //recuperer tt les produits
        public static function getAllProducts(){
            $db = DB::getInstance();
            $req = $db->query('select * from product order by id desc');

            $products = [];
            foreach($req->fetchAll() as $product){
                $category = Category::getCategoryById($product['categoryId']);
                $products[] = new Product($product['id'], $product['name'], $product['quantity'], $product['price'], $category, $product['description'], $product['imgUrl']);
            }
            return $products;
        }

        //recuperer un produit par id
        public static function getProductById($id) {
            $db = DB::getInstance();
            $id = intval($id);
            $req = $db->prepare('SELECT * FROM product WHERE id = :id');
            $req->execute(array('id' => $id));
            $product = $req->fetch();
      
            $category = Category::getCategoryById($product['categoryId']);
            return new Product($product['id'], $product['name'], $product['quantity'],  $product['price'], $category, $product['description'], $product['imgUrl']);
        }

        //ajouter un nouveau produit
        public static function addProduct($data){
            $db = DB::getInstance();
            $sql = "INSERT INTO product (name, quantity, price, imgUrl, categoryId, description) VALUES(:name, :quantity, :price, :imgUrl, :categoryId, :description)";
            $req = $db->prepare($sql);
            $req->execute($data);
        }

        //modifier un produit
        public static function editProduct($data, $productId){
            $db = DB::getInstance();
            $sql = "UPDATE product set name = :name, quantity = :quantity, price = :price, imgUrl = :imgUrl, categoryId = :categoryId, description = :description where id = :id";
            $req = $db->prepare($sql);
            $data['id'] = $productId;
            $req->execute($data);
        }

        //supprimer un produit
        public static function deleteProduct($productId){
            $db = DB::getInstance();
            $sql = "DELETE from product where id = :id";
            $req = $db->prepare($sql);

            //supprimer les achats de ce produit
            Purchase::deletePurchasesOfProduct($productId);

            $req->execute(array('id' => $productId));
        }
    }

?>