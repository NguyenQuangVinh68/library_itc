<div class="container my-5 w-50">
    <?php
    if ($result) :
    ?>
        <h3 class="text-center">Form mượn sách</h3>

        <form action="index.php?controller=book&action=borrow_action" method="post">
            <div class="my-3">
                <label class="form-label fw-bold">Mã số sinh viên</label>
                <input class="form-control" type="text" name="masv" id="masv" placeholder="Nhập mã số sinh viên" value="<?php echo $result[0] ?>">
            </div>

            <div class="my-3">
                <label class="form-label fw-bold">Họ tên sinh viên</label>
                <input class="form-control" type="text" name="tensv" id="tensv" placeholder="Nhập họ tên sinh viên" value="<?php echo $result[1] ?>">
            </div>
            <div class="my-3">
                <label class="form-label fw-bold">Mã sách</label>
                <input class="form-control" type="text" name="masach" id="masach" placeholder="Nhập mã sách">
            </div>
            <div class="my-3">
                <label class="form-label fw-bold">Nhan đề</label>
                <input class="form-control" type="text" name="nhande" id="nhande" placeholder="Nhập nhan đề">
            </div>
            <div class="my-3">
                <label class="form-label fw-bold">Tác giả</label>
                <input class="form-control" type="text" name="tacgia" id="tacgia" placeholder="Nhập tác giả">
            </div>
            <div class="my-3">
                <div class="row">
                    <div class="col-6 col-lg-6 col-md-6">
                        <label class="form-label fw-bold">Ngày mượn</label>
                        <input class="form-control" type="date" name="ngaymuon" id="ngaymuon" placeholder="Nhập ngày mượn">
                    </div>
                    <div class="col-6 col-lg-6 col-md-6">
                        <label class="form-label fw-bold">Ngày trả</label>
                        <input class="form-control" type="date" name="ngaytra" id="ngaytra" placeholder="Nhập ngày mượn">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>

        <!-- không tìm thấy mã số sinh viên -->
    <?php
    else :
    ?>
        <div class="text-center">
            <h3 class=" alert-danger py-3">Mã số sinh viên không tồn tại</h3>
            <a class="btn btn-primary" href="index.php?controller=book&action=findstudent">Trở lại tìm kiếm mã số sinh viên</a>
        </div>
    <?php endif;
    ?>
</div>