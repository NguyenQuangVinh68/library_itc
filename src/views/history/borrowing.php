<div class="container mt-5">
    <h3>NHẬT KÍ SINH VIÊN MƯỢN SÁCH</h3>
    <table class="table table-bordered ">
        <thead class="table-success">
            <tr>
                <td>Mã sv</td>
                <td>Mã sách</td>
                <td>Nhan đề</td>
                <td>Ngày mượn</td>
                <td>Hẹn trả</td>
                <td>Mã thủ thư</td>
                <td colspan="2"></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $lb = new HistoryModel();
            $result = $lb->getBorrowList();
            while ($set = $result->fetch()) :
            ?>
                <tr>
                    <td><?php echo $set['masv']; ?></td>
                    <td><?php echo $set['masach']; ?></td>
                    <td><?php echo $set['nhande']; ?></td>
                    <td><?php echo $set['ngaymuon']; ?></td>
                    <td><?php echo $set['hentra']; ?></td>
                    <td><?php echo $set['maadm']; ?></td>
                    <td><a href="index.php?controller=history&action=confirmreturn&masach=<?php echo $set['masach'] ?>&masv=<?php echo $set['masv'] ?>"> <button class="btn btn-primary">Trả</button> </a></td>
                    <!-- <td><a href="#"> <button class="btn btn-danger">Xoa</button> </a></td> -->
                    <?php echo "<td><a class='btn btn-danger' onclick='confirmation2(".'"'.$set['masach'].'"'.")'>Báo Mất</a></td>"?>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
</div>