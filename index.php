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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/assets/css/bootstrap.css">

    <link rel="stylesheet" href="./src/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="./src/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="./src/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="./src/assets/css/app.css">
    <link rel="shortcut icon" href="./src/assets/images/favicon.svg" type="image/x-icon">
    <title>Library</title>
</head>

<body>
    <div id="app">
        <?php

        include_once("./src/views/include/header.php");
        ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <?php
            $ctrl = 'dashboard';
            if (isset($_GET['controller'])) {
                $ctrl = $_GET['controller'];
            }
            include "./src/controllers/" . $ctrl . ".php";
            include_once("./src/views/include/footer.php");
            ?>
        </div>
    </div>


    <script src="./src/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="./src/assets/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="./src/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="./src/assets/js/pages/dashboard.js"></script>

    <script src="src/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="src/assets/js/pages/dashboard.js"></script>

    <script src="src/assets/js/main.js"></script>
    <script>
        function confirmation(masach) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `index.php?controller=book&action=deletebook&id=${masach}`;
                }
            })
        }
    </script>
</body>
</body>

</html>