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
    <link rel="stylesheet" href="src/assets/css/bootstrap.css">

    <link rel="stylesheet" href="src/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="src/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="src/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="src/assets/css/app.css">
    <link rel="shortcut icon" href="src/assets/images/favicon.svg" type="image/x-icon">
    <title>Admin Library</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['admin'])) :
    ?>
        <?php
        include "./src/views/login/login.php";

        $ctrl = 'dashboard';
        if (isset($_GET['controller'])) {
            $ctrl = $_GET['controller'];
        }
        include "./src/controllers/" . $ctrl . ".php";

    else :
        ?>


        <div id="app" class="w-100">
            <!-- Header left -->
            <?php include_once("./src/views/include/header.php"); ?>


            <!-- Main -->
            <div id="main">
                <!-- Header top -->
                <?php include_once("./src/views/include/header-top.php"); ?>

                <?php
                $ctrl = 'dashboard';
                if (isset($_GET['controller'])) {
                    $ctrl = $_GET['controller'];
                }
                include "./src/controllers/" . $ctrl . ".php";
                ?>


            </div>
            <!-- Footer -->
            <?php include_once("./src/views/include/footer.php"); ?>


        </div>

    <?php endif; ?>


    <script src="src/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="src/assets/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.7/sweetalert2.all.min.js"></script>
    <script src="src/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="src/assets/js/pages/dashboard.js"></script>

    <script src="src/assets/js/main.js"></script>
    <script>
        function confirmation(masach) {
            Swal.fire({
                title: 'Bạn có chắc chưa?',
                text: "Bạn không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK, Xóa đi',
                cancelButtonText: "Giữ lại"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `index.php?controller=book&action=deletebook&id=${masach}`;
                }
            })
        }
        function confirmation2(masach,mamuon) {
            Swal.fire({
                title: 'Cuốn sâch này đã mất?',
                text: "Bạn không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK, Đã mất đi',
                cancelButtonText: "Hủy lệnh"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `index.php?controller=history&action=losebook&masach=${masach}&mamuon=${mamuon}`;
                }
            })
        }
    </script>
</body>

</body>

</html>