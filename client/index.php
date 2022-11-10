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
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="./src/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- Slick slider -->
    <link href=".src/assets/css/slick.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="./src/assets/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="./style.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Open Sans for body font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
    <!-- Lato for Title -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Library</title>
</head>

<body>
    <div id="app">
        <div class="header_style">
            <?php
            include "./src/views/header.php";
            ?>
        </div>
        <div>
            <?php
            
            include "./src/views/danhmuc.php";
            
            
            ?>
        </div>
        <div class="container mt-5">
            <?php
            $ctrl = 'home';
            if (isset($_GET['act'])) {
                $ctrl = $_GET['act'];
            }
            include "./src/controllers/" . $ctrl . ".php";
            ?>
        </div>
        <?php
        include_once("./src/views/footer.php");
        ?>
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    <script src="./src/assets/js/bootstrap.min.js"></script>
    <!-- Slick slider -->
    <!-- <script type="text/javascript" src="./src/assets/js/slick.min.js"></script> -->
    <!-- Counter js -->
    <script type="text/javascript" src="./src/assets/js/counter.js"></script>
    <!-- Ajax contact form  -->
    <!-- <script type="text/javascript" src="./src/assets/js/app.js"></script> -->
    <!-- Custom js -->
    <script type="text/javascript" src="./src/assets/js/custom.js"></script>
</body>

</body>

</html>