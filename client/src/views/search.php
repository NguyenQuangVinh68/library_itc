<div class="container" style="margin-top:100px;">
    <h1 class="text-center">Tra cứu</h1>
    <div class="contain-form container-fluid">
        <form class="input-group form-timkiem" action="index.php?controller=book&action=onsearch" method="post">
            <input type="text" name="txtSearch" id="ContentSearch" class="form-control" placeholder="Bạn đang cần tìm?" autocomplete="off" required>
            <button id="ContentButSearch" class="btn btn-danger wrn-btn float-right" type="submit">TÌM KIẾM</button>
        </form>
    </div>
</div>
<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'onsearch') {
        $keyword = $_SESSION['search'];
        $ac = 0;
    } elseif ($_GET['action'] == 'filtercategory1') {
        $ac = 1;
    } elseif ($_GET['action'] == 'filtercategory2') {
        $ac = 2;
    } elseif ($_GET['action'] == 'filtercategory3') {
        $ac = 3;
    }elseif ($_GET['action'] == 'filtercategory4') {
        $ac = 4;
    }elseif ($_GET['action'] == 'filtercategory5') {
        $ac = 5;
    }elseif ($_GET['action'] == 'filtercategory6') {
        $ac = 6;
    }
}
?>

<?php
$s = new BookModel();
if (isset($_GET['action'])) {
    if ($ac == 0) {
        $result = $s->onSearch($keyword);
    } elseif ($ac == 1) {
        $result = $s->getListITBook();
    } elseif ($ac == 2) {
        $result = $s->getListECBook();
    } elseif ($ac == 3) {
        $result = $s->getListReferenceBook();
    }elseif ($ac == 4) {
        $result = $s->getListThesisBook();
    }elseif ($ac == 5) {
        $result = $s->getListCurriculumBook();
    }elseif ($ac == 6) {
        $result = $s->getListMagazine();
    }

?>
    <h3 class="text-center pt-3">
        <?php
        if ($ac == 0) {
            echo "KẾT QUẢ TÌM KIẾM CHO '${keyword}'";
        } elseif ($ac == 1) {
            echo "SÁCH KHOA CÔNG NGHỆ THÔNG TIN";
        } elseif ($ac == 2) {
            echo "SÁCH KHOA KINH TẾ";
        } elseif ($ac == 3) {
            echo "SÁCH THAM KHẢO";
        }elseif ($ac == 4) {
            echo "ĐỒ ÁN TỐT NGHIỆP";
        }elseif ($ac == 5) {
            echo "SÁCH GIÁO TRÌNH";
        }elseif ($ac == 6) {
            echo "SÁCH BÁO - TẠP CHÍ";
        }
        ?>
    </h3>
    <?php
    while ($set = $result->fetch()) :

    ?>
        <div class="container">
            <div class="container row pb-3">
                <a href="index.php?controller=book&action=bookdetail&id=<?php echo $set['masach'];?>">
                    <h5 class="titlebook"><?php echo $set['nhande']; ?></h5>
                </a>
                <div class="col-lg-2 col-md-6" style="border: 1px solid #333; padding: 0;">
                    <img width="100%" src="<?php echo $set['anhbia']; ?>" />
                </div>
                <div class="col-lg-9 col-md-6">
                    <p>Thông tin xuất bản: <span style="font-style: italic;"><?php echo $set['thongtinxb']; ?></span></p>
                    <p>Tác giả: <span style="font-weight: bold;"><?php echo $set['tacgia']; ?></span></p>
                    <p>Bộ sưu tập: <span style="font-weight: bold;"><?php echo $set['bosuutap']; ?></span></p>
                    <p>Vị trí kệ sách: <span class="vitrikesach"><?php echo $set['vitri']; ?></span></p>
                </div>
            </div>
            <hr>
        </div>

<?php
    endwhile;
} else {
    include './src/views/include/danhmuc.php';
    include './src/views/include/danhmucnganh.php';
}

?>