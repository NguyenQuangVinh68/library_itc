<?php if (isset($result)) : ?>
    <div class="container py-5">
        <h1 class="text-center mb-5">Danh sách sinh viên mượn sách</h1>
        <h5 class="mb-5">tìm kiếm</h5>
        <table class="table table-bordered ">
            <thead class="table-danger">
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Tổng mượn</th>
                    <th>Mã admin</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = $result->fetch()) :
                ?>
                    <tr>
                        <td><?php echo $data['masv'] ?></td>
                        <td><?php echo $data['tensv'] ?></td>
                        <td><?php echo $data['tongmuon'] ?></td>
                        <td><?php echo $data['maadm'] ?></td>
                        <td>
                            <a href="index.php?controller=history&action=borrowingbookbycode&masv=<?php echo $data['masv'] ?>">xem chi tiết</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>

        </table>
    </div>
<?php else : ?>
    <div class="text-center alert-danger p-4 ">
        <h3 class="text-white">Không có sinh viên đang mượn</h3>
    </div>
<?php endif; ?>