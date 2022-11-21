<?php
set_include_path(get_include_path() . PATH_SEPARATOR . './src/models/');
spl_autoload_extensions('.php');
spl_autoload_register();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="./src/assets/images/favicon.ico" />
    <link rel="stylesheet" href="./src/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- style for search.php -->
    <link rel="stylesheet" href="./src/assets/css/style-search.css" />
    <!-- style for comment.php -->
    <link rel="stylesheet" href="./src/assets/css/style-comment.css">
    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/00ab326edb.js" crossorigin="anonymous"></script>
    <title>Library</title>
</head>

<body>
    <div id="app">
        <?php
        include_once "./src/views/include/header.php";
        $controller = 'home';
        if (isset($_GET['controller'])) {
            $controller = $_GET['controller'];
        }
        include "./src/controllers/" . $controller . ".php";
        include_once "./src/views/include/footer.php";
        ?>
    </div>

    <script src="./src/assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>

</html>