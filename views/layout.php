<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta charset="ISO-8859-1">
    <title>Boutique</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/boutique/assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/boutique/css/styles.css" rel="stylesheet" />
</head>

<body style="position: relative; min-height: 100vh">

    <!-- Injecter le header (menu) de la page -->
    <?php 
        // verifier si c'est une url du backoffice (/admin) ou du frontoffice
        if (isset($_GET['url'])){
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            if ($url[0] == 'admin'){
                include('views/header-backoffice.php'); 
            }else{
                include('views/header-frontoffice.php'); 
            }
        }else{
            include('views/header-frontoffice.php');
        }
    ?>

    <!-- Injecter le contenu de la page selon l'url demandé -->
    <div style="padding-bottom: 2.5rem;">
        <?php require_once('routes.php'); ?>
    </div>


    <!-- Injecter le footer -->
    <?php include('views/footer.php'); ?>

</body>

</html>