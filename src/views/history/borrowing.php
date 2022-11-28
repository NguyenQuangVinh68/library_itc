<?php if (isset($_SESSION["masv"])) : ?>
    <div class="container mt-5">
        <h3 class="my-4 text-center">NHẬT KÍ SINH VIÊN <?php echo $_SESSION['tensv'] ?> MƯỢN SÁCH</h3>
        <table class="table table-bordered ">
            <thead class="table-success fw-bold">
                <tr>
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
                $result = $lb->getBorrowListByID($_SESSION['masv']);
                while ($set = $result->fetch()) :
                ?>
                    <tr>
                        <td><?php echo $set['masach']; ?></td>
                        <td><?php echo $set['nhande']; ?></td>
                        <td><?php echo $set['ngaymuon']; ?></td>
                        <td><?php echo $set['ngaytra']; ?></td>
                        <td><?php echo $set['maadm']; ?></td>
                        <td><a class="btn btn-primary w-100" href="index.php?controller=history&action=returnaction&masach=<?php echo $set['masach'] ?>&mamuon=<?php echo $set['mamuon'] ?>">Trả</a></td>
                        <?php echo "<td><a class='btn btn-danger w-100' onclick='confirmation2(" . '"' . $set['masach'] . '","' . $set['mamuon'] . '"' . ")'>Mất</a></td>" ?>
                    </tr>
                <?php
                endwhile;
                ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <div class="my-5 w-75 mx-auto  text-center ">
        <h3 class="alert-danger py-4">Không tìm thấy sinh viên theo mã số đã cung cấp</h3>
        <a class="btn btn-primary" href="index.php?controller=history">Trở lại tìm kiếm sinh viên</a>
    </div>
<?php endif ?>