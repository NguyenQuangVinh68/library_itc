<?php
$h = new BookModel();
$id = $_GET['id'];
$set = $h->getDetailInformation($id);

if ($set) :
?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-9  mb-5">
                <div class="row">
                    <div class="col-lg-3 col-md-3 mb-4 img_bookdetail">
                        <img class="w-100  shadow" src="<?php echo $set['anhbia']; ?>" />
                    </div>
                    <div class="col-lg-9 col-md-9 ">
                        <h5 class="titlebook"><?php echo $set['nhande']; ?></h5>
                        <div id="ave_start"></div>
                        <div class="bookdetail_information">
                            <p><b>Thông tin xuất bản: </b><span><?php echo $set['thongtinxb']; ?></span></p>
                            <p><b>Tác giả: </b><span><?php echo $set['tacgia']; ?></span></p>
                            <p><b>Bộ sưu tập: </b><span><?php echo $set['bosuutap']; ?></span></p>
                        </div>

                        <?php
                        if (isset($_SESSION['user'])) {
                            $c = new BookModel();
                            $res = $c->checkStatusOfThisUser($_SESSION['user'], $set['masach']);
                            if ($res) {
                                echo '<a href="index.php?controller=book&action=changestatus&masv=' . $_SESSION['user'] . '&masach=' . $set['masach'] . '" class="btn btn-warning"><i class="fa-solid fa-heart" style="color: red"></i></a>';
                            } else {
                                echo '<a href="index.php?controller=book&action=changestatus&masv=' . $_SESSION['user'] . '&masach=' . $set['masach'] . '" class="btn btn-second" style="border: 1px solid #333;"><i class="fa-regular fa-heart"></i></a>';
                            }
                        } else {
                            if (!isset($_SESSION['user'])) {
                                echo '<a href="index.php?controller=login" class="btn btn-second" style="border: 1px solid #333;"><i class="fa-regular fa-heart"></i></a>';
                            }
                        }
                        ?>


                    </div>
                </div>

            </div>
            <div class="col-lg-3 ">
                <div class="w-100 text-center text-white mb-3" style="background-color:#0e6598">
                    <h5 class="py-3">THÔNG TIN MƯỢN SÁCH</h5>
                </div>
                <ul>
                    <li>Số lượng trên kệ: <?php echo $set['soluong']; ?></li>
                    <li>Vị trí: Kệ <?php echo $set['vitri']; ?></li>
                    <li>Số lượt mượn: <?php echo $set['soluongmuon']; ?></li>
                    <li>Số người yêu thích: <?php
                                            $dem = new BookModel();
                                            $dem = $dem->getSumLike($set['masach']);
                                            echo $dem['sl'];
                                            ?></li>
                </ul>
                <div class="text-center">
                    <a href="" class="btn btn-danger" style="display: none">Đăng kí mượn</a>
                </div>
            </div>
        </div>
        <!-- comment -->
        <?php include "./src/views/include/comment.php" ?>
    </div>
<?php else : ?>
    <h1 class="mt-5 text-center">Not found</h1>
<?php endif; ?>

<style>
    .bookdetail_information b {
        font-weight: 900;
    }

    @media only screen and (max-width:390px) {
        .img_bookdetail {
            display: flex;
            justify-content: center;
        }

        .img_bookdetail img {
            width: 50% !important;
        }
    }
</style>