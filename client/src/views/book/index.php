<div class="container my-5">
    <h3 class="text-center mb-5"><?php echo $_GET['name_category'] ?></h3>
    <?php
    while ($data = $result->fetch()) :
    ?>
        <div class="container row pb-3">
            <a href="index.php?controller=book&action=bookdetail&id=<?php echo $data['masach']; ?>">
                <h5 class="titlebook"><?php echo $data['nhande']; ?></h5>
            </a>
            <div class="col-lg-2 col-md-6" style="border: 1px solid #333; padding: 0;">
                <img width="100%" src="<?php echo $data['anhbia']; ?>" />
            </div>
            <div class="col-lg-9 col-md-6">
                <p>Thông tin xuất bản: <span style="font-style: italic;"><?php echo $data['thongtinxb']; ?></span></p>
                <p>Tác giả: <span style="font-weight: bold;"><?php echo $data['tacgia']; ?></span></p>
                <p>Bộ sưu tập: <span style="font-weight: bold;"><?php echo $data['bosuutap']; ?></span></p>
                <p>Vị trí kệ sách: <span class="vitrikesach"><?php echo $data['vitri']; ?></span></p>
            </div>
        </div>
        <hr>

    <?php
    endwhile;
    ?>
</div>