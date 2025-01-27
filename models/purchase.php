<?php

    class Purchase {

        public $id;
        public $firstName;
        public $lastName;
        public $address;
        public $quantity;
        public $product;

        public function __construct($id, $firstName, $lastName, $address, $quantity, $product){
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->address = $address;
            $this->quantity = $quantity;
            $this->product = $product;
        }

        //recuperer tt les achats;
        public static function getAllPurchases(){
            $db = DB::getInstance();
            $req = $db->query('select * from purchase order by id desc');

            $purchases = [];
            foreach($req->fetchAll() as $purchase){
                $product = Product::getProductById($purchase['productId']);
                $purchases[] = new Purchase($purchase['id'], $purchase['firstName'], $purchase['lastName'], $purchase['address'], $purchase['quantity'], $product);
            }
            return $purchases;
        }

        //ajouter un achat
        public static function addPurchase($data){
            $db = DB::getInstance();
            $sql = "INSERT INTO purchase (firstName, lastName, address, quantity, productId) VALUES(:firstName, :lastName, :address, :quantity, :productId)";
            $req = $db->prepare($sql);
            $req->execute($data);
        }

        //supprimer tt les achats d'un produit
        public static function deletePurchasesOfProduct($productId){
            $db = DB::getInstance();
            $sql = "DELETE from purchase where productId = :id";
            $req = $db->prepare($sql);
            $req->execute(array('id' => $productId));
        }
        
    }

?>