<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<div class="container mt-5">
    <h3>TẤT CẢ SÁCH TRONG THƯ VIỆN</h3>
    <table class="table table-borderless table-hover">
        <thead class="table-success">
            <tr>
                <td>Mã sách</td>
                <td>Nhan đề</td>
                <td>Tác giả</td>
                <td>Thể loại</td>
                <td>Bộ sưu tập</td>
                <td>Chuyên ngành</td>
                <td>Ảnh bìa</td>
                <td>NXB</td>
                <td>Vị trí</td>
                <td>Số lượng</td>
                <td>Giá tiền</td>
                <td colspan="2"></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $lb = new BookModel();
            $result = $lb->getAllBook();
            while ($set = $result->fetch()) :
            ?>
                <tr>
                    <td><?php echo $set['masach']; ?></td>
                    <td><?php echo $set['nhande']; ?></td>
                    <td><?php echo $set['tacgia']; ?></td>
                    <td><?php echo $set['theloai']; ?></td>
                    <td><?php echo $set['bosuutap']; ?></td>
                    <td><?php echo $set['chuyennganh']; ?></td>
                    <td><?php echo $set['thongtinxb']; ?></td>
                    <td><img src="<?php echo $set['anhbia']; ?>" alt=""></td>
                    <td><?php echo $set['vitri']; ?></td>
                    <td><?php echo $set['soluong']; ?></td>
                    <td><?php echo $set['gia']; ?></td>
                    <td><a href="index.php?controller=book&action=editbookform&id=<?php echo $set['masach']; ?>"> <button class="btn btn-primary">Sửa</button> </a></td>
                    <!-- <td><a href="#"> <button class="btn btn-danger">Xoa</button> </a></td> -->
                    <?php echo "<td><a class='btn btn-danger' onclick='confirmation(".'"'.$set['masach'].'"'.")'>Xóa</a></td>"?>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
</div>