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
    <link rel="stylesheet" href="http://localhost:8080/PHP2/library/client/src/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <title>Library</title>
</head>

<body>
    <div id="app">
        <?php
        include_once "./src/views/include/header.php";
        ?>
    </div>


    <script src="./src/assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>

</body>

</html>