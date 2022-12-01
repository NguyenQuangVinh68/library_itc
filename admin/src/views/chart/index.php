<div class="container">
    <div class="mb-5">
        <h1 class="my-5 text-center text-capitalize">thống kê</h1>

        <div class="mb-5">
            <form action="">
                <div class="d-flex justify-content-between gap-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </form>
        </div>
        <table class="table table-bordered ">
            <thead class="table-success">
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Mã sách</th>
                    <th>Nhan đề</th>
                    <th>Ngày mượn</th>
                    <th>Hẹn trả</th>
                    <th>Mã Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $BookModel = new HistoryModel();
                $month = date('m');
                $result = $BookModel->getBorrowList();

                while ($item = $result->fetch()) :
                ?>
                    <tr>
                        <td><?php echo $item['masv'] ?></td>
                        <td><?php echo $item['masach'] ?></td>
                        <td class="w-50"><?php echo $item['nhande'] ?></td>
                        <td><?php echo $item['ngaymuon'] ?></td>
                        <td><?php echo $item['ngaytra'] ?></td>
                        <td><?php echo $item['maadm'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6 " class="text-end"><a href="index.php?controller=history&action=getallborrowing">Xem chi tiết</a></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>