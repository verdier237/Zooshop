<?php

    class User {

        public $id;
        public $firstName;
        public $lastName;
        public $login;
        public $password;

        public function __construct($id, $firstName, $lastName, $login, $password){
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->login = $login;
            $this->password = $password;
        }

        //verifier si c'est le bon login & mdp d'un utilisateur
        public static function authenticate($login, $password){

            $db = DB::getInstance();
            $req = $db->prepare('SELECT count(*) FROM app_user WHERE login = :login and password = :password');
            $req->execute(array('login' => $login, 'password' => $password));
            $user = $req->fetch();
            if ($user[0] == 1){
                return true;
            }else{
                return false;
            }
        }
    }

?>