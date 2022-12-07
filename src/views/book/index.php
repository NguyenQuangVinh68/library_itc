<div class="container my-5">
    <?php
    if (isset($_GET['name_category'])) :
    ?>
        <h3 class="text-center mb-5 text-capitalize"><?php echo $_GET['name_category'] ?></h3>
    <?php
    else :
    ?>
        <h3 class="text-center mb-5">Kết quả tìm kiếm</h3>
    <?php endif; ?>
    <?php
    while ($data = $result->fetch()) :
    ?>
        <div class="row pb-3">
            <div class="col-lg-12">
                <div class="row w-100 m-0">
                    <div class="col-lg-12 col-md-12 col-12 p-0 mb-3 fs-5">
                        <a class="fw-bold" href="index.php?controller=book&action=bookdetail&id=<?php echo $data['masach']; ?>" target="_blank">
                            <?php echo $data['nhande']; ?>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-4 d-flex align-items-center p-0">
                        <img class="w-100 border" src="<?php echo $data['anhbia']; ?>" />
                    </div>
                    <div class="col-lg-10 col-md-6 col-8 book_information">
                        <p><b>Thông tin xuất bản: </b> <span><?php echo $data['thongtinxb']; ?></span></p>
                        <p><b>Tác giả: </b><span><?php echo $data['tacgia']; ?></span></p>
                        <p><b>Bộ sưu tập: </b><span><?php echo $data['bosuutap']; ?></span></p>
                        <p><b>Vị trí kệ sách: </b><span class="vitrikesach"><?php echo $data['vitri']; ?></span></p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    <?php
    endwhile;
    ?>

    <?php ?>
</div>

<style>
    .book_information b {
        font-weight: 900;
    }
</style>