<?php

    class Category {

        public $id;
        public $name;

        public function __construct($id, $name){
            $this->id = $id;
            $this->name = $name;
        }

        //recuperer tt les categories
        public static function getAllCategories(){
            $db = DB::getInstance();
            $req = $db->query('select * from category');

            $categories = [];
            foreach($req->fetchAll() as $category){
                $categories[] = new Category($category['id'], $category['name']);
            }
            return $categories;
        }

        //recuperer une categorie par id
        public static function getCategoryById($id) {
            $db = DB::getInstance();
            $id = intval($id);
            $req = $db->prepare('SELECT * FROM category WHERE id = :id');
            $req->execute(array('id' => $id));
            $category = $req->fetch();
      
            return new Category($category['id'], $category['name']);
        }
    }

?>