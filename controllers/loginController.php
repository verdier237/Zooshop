<?php 

    class LoginController {

        //Afficher la page d'authentification
        public function login() {
           
            if(isset($_SESSION["login"])){
                header("location:/boutique/admin/orders");
            }

            require_once('views/login/login.php');
        }

        //authentifier l'utilisateur
        public function authenticate() {
            if (!empty($_POST['login'])){
                
                $isAuthenticated = User::authenticate($_POST['login'], $_POST['password']);
                //si l'utilisateur est bien authentifié on le redirige vers la page des achats, sinon on le redirige vers la page de login
                if($isAuthenticated == true)
                {
                    session_start();
                    $_SESSION["login"]=$_POST['login'];
                    header("location:/boutique/admin/orders");
                }
                else
                {
                    header("location:/boutiaue/login/login");
                }
            }
        }
    }

?>