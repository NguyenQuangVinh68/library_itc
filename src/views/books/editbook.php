<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<div>
    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'editbookform') {
            $ac = 1;
        } else {
            $ac = 2;
        }
    }

    ?>
    <?php
    if ($ac == 1) {
        echo '<div class="row col-md-8 col-md-offset-4" ><h3>CẬP NHẬT THÔNG TIN SÁCH</h3></div>';
    } else {
        echo '<div class="row col-md-8 col-md-offset-4" ><h3>THÊM SÁCH MỚI</h3></div>';
    }

    ?>
    <div class="row col-lg-10 col-md-offset-4">
        <?php
        if (isset($_GET['id'])) {
            $masach = $_GET['id'];
            $hh = new BookModel();
            $result = $hh->getBookID($masach);
            $masach = $result['masach'];
            $nhande = $result['nhande'];
            $tacgia = $result['tacgia'];
            $theloai = $result['theloai'];
            $bosuutap = $result['bosuutap'];
            $chuyennganh = $result['chuyennganh'];
            $anhbia = $result['anhbia'];
            $thongtinxb = $result['thongtinxb'];
            $vitri = $result['vitri'];
            $soluong = $result['soluong'];
            $gia = $result['gia'];
        }
        ?>
        <?php
        if ($ac == 1) {
            echo '
      <form action="index.php?controller=book&action=updatebook_action&id=<?php echo $masach; ?>" method="post" enctype="multipart/form-data">';
        } else {
            echo '
      <form action="index.php?controller=book&action=importbook_action" method="post" enctype="multipart/form-data">';
        }
        ?>
        <table class="table" style="border: 0px;">

            <tr>
                <td>Mã sách</td>
                <td> <input type="text" class="form-control" name="masach" readonly value="<?php if (isset($masach)) echo $masach; ?>" /></td>
            </tr>
            <tr>
                <td>Nhan đề</td>
                <td> <input type="text" class="form-control" name="nhande" value="<?php if (isset($masach)) echo $nhande; ?>" /></td>
            </tr>
            <tr>
                <td>Tác giả</td>
                <td> <input type="text" class="form-control" name="tacgia" value="<?php if (isset($masach)) echo $tacgia; ?>" /></td>
            </tr>
            <tr>
                <td>Thể loại</td>
                <td> <input type="text" class="form-control" name="theloai" value="<?php if (isset($masach)) echo $theloai; ?>" /></td>
            </tr>
            <tr>
                <td>Bộ sưu tập</td>
                <td> <input type="text" class="form-control" name="bosuutap" value="<?php if (isset($masach)) echo $bosuutap; ?>" /></td>
            </tr>
            <tr>
                <td>Chuyên ngành</td>
                <td> <input type="text" class="form-control" name="chuyennganh" value="<?php if (isset($masach)) echo $chuyennganh; ?>" /></td>
            </tr>
            <tr>
                <td>Ảnh bìa (link ảnh)</td>
                <td> <input type="text" class="form-control" name="anhbia" value="<?php if (isset($masach)) echo $anhbia; ?>" /></td>
            </tr>
            <tr>
                <td>Thông tin xuất bản</td>
                <td> <input type="text" class="form-control" name="thongtinxb" value="<?php if (isset($masach)) echo $thongtinxb; ?>" /></td>
            </tr>
            <tr>
                <td>Vị trí</td>
                <td> <input type="text" class="form-control" name="vitri" value="<?php if (isset($masach)) echo $vitri; ?>" /></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td> <input type="text" class="form-control" name="soluong" value="<?php if (isset($masach)) echo $soluong; ?>" /></td>
            </tr>
            <tr>
                <td>Giá</td>
                <td> <input type="text" class="form-control" name="gia" value="<?php if (isset($masach)) echo $gia; ?>" /></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <?php
                    if ($ac == 1) {
                        echo '<input class="btn btn-primary" type="submit" value="Cập nhật">';
                    } else {
                        echo '<input class="btn btn-success" type="submit" value="Thêm sách">';
                    }
                    ?>

                </td>
            </tr>
        </table>
    </div>
</div>