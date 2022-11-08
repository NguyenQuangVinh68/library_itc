<div class="container mt-5">
    <h3 class="my-4 text-center">NHẬT KÍ SINH VIÊN MƯỢN SÁCH</h3>
    <table class="table table-bordered ">
        <thead class="table-success fw-bold">
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
                    <td><?php echo $set['ngaytra']; ?></td>
                    <td><?php echo $set['maadm']; ?></td>
                    <td><a class="btn btn-primary w-100" href="index.php?controller=history&action=confirmreturn&masach=<?php echo $set['masach'] ?>&masv=<?php echo $set['masv'] ?>">trả</a></td>
                    <!-- <td><a href="#"> <button class="btn btn-danger">Xoa</button> </a></td> -->
                    <?php echo "<td><a class='btn btn-danger w-100' onclick='confirmation2(" . '"' . $set['masach'] . '"' . ")'>mất</a></td>" ?>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
</div>