<?php
$h = new BookModel();
$id = $_GET['id'];
$set = $h->getDetailInformation($id);
?>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-3">
                    <img width="100%" src="<?php echo $set['anhbia']; ?>" style="box-shadow: -2px -3px 7px #333" />
                </div>
                <div class="col-9">
                    <h5 class="titlebook"><?php echo $set['nhande']; ?></h5>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <!-- <h5>Đánh Giá: </h5> -->
                        <?php
                        $_STARS = new StarsModel();
                        $average = $_STARS->avg(); // là mảng $average['20'=>3.00,'21'=>3.00,'24'=>3.00]
                        $uid = "8";
                        // tiến hành lấy điểm mà người đó cho sản phẩm
                        $rating = $_STARS->getRating($uid, $id); // số 3
                        if (isset($_POST['pid']) && isset($_POST['stars'])) {
                            // update vào database
                            $pid = $_POST['pid']; //24
                            $star = $_POST['stars']; //4
                            $_STARS->update($pid, $uid, $star); //24,8,4
                        }
                        ?>
                        <div class="rating">
                            <!-- data attribute trong html, giúp lưu thông tin vào thẻ html, giúp lấy đc thông tin nhanh chóng bằng js -->
                            <!-- https://kipalog.com/posts/Su-dung-Data-attribute-trong-HTML -->
                            <div class="pstar" data-pid="<?= $id ?>" style="color:black; font-size:20px">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    $img = $i <= $rating ? "star" : "star-blank";
                                    echo "<img src='src/assets/images/$img.png' 
                                                style='width:25px;cursor:pointer;' data-set='$i'>";
                                }
                                ?>
                            </div>
                            <p style="color:gray;">Điểm đánh giá: <?= $average[$id] ?></p>
                        </div>
                    <?php
                    endif;
                    ?>
                    <p>Thông tin xuất bản: <span style="font-style: italic;"><?php echo $set['thongtinxb']; ?></span></p>
                    <p>Tác giả: <span style="font-weight: bold;"><?php echo $set['tacgia']; ?></span></p>
                    <p>Bộ sưu tập: <span style="font-weight: bold;"><?php echo $set['bosuutap']; ?></span></p>

                    <button class="btn btn-second" style="border: 1px solid #333;"><i class="fa-regular fa-heart"></i></button>
                    <button class="btn btn-warning"><i class="fa-solid fa-heart" style="color: red"></i></button>
                </div>
            </div>

        </div>
        <div class="col-4 " style="box-shadow: -1px -1px 7px #333">
            <div class="w-100 text-center " style="background-color:rgb(14, 101, 152); height: 35px; color: #fff; margin-top: 10px">
                <h5 style="line-height: 35px;">THÔNG TIN MƯỢN SÁCH</h5>
            </div>
            <ul>
                <li>Số lượng trên kệ: <?php echo $set['soluong']; ?></li>
                <li>Vị trí: Kệ <?php echo $set['vitri']; ?></li>
                <li>Số lượt mượn: <?php echo $set['soluongmuon']; ?></li>
            </ul>
            <div class="text-center">
                <a href=""><button class="btn btn-danger">Đăng kí mượn</button></a>
            </div>
        </div>
    </div>
    <div class="hidden_form">
        <form id="ninForm_2" name="ninForm_2" action="" method="post" target="_self">
            <input type="hidden" name="pid" id="ninPid">
            <input type="hidden" name="stars" id="ninStar">
        </form>
    </div>
</div>
<script>
    var stars = {
        init: function() {
            for (let docket of document.getElementsByClassName("pstar")) {
                for (let star of docket.getElementsByTagName("img")) {
                    star.addEventListener("click", stars.click);
                }
            }
            

        },
        click: function() {
            let all = this.parentElement.getElementsByTagName("img"),
                set = this.dataset.set,
                i = 1;
            console.log(set);
            for (let star of all) {
                star.src = i <= set ? "star.png" : "star-blank.png";
                i++;
            }
            // đỗ dữ liệu vào trong 2 thẻ input của form hidden
            document.getElementById("ninPid").value = this.parentElement.dataset.pid;
            document.getElementById("ninStar").value = this.dataset.set;
            document.getElementById("ninForm_2").submit();


        }
    }
    // addEventListener là một phương thức được tích hợp sẵn vào các đối tượng HTML thông qua cơ chế DOM. Khi sử dụng addEventListener thì bạn có thể bổ sung rất nhiều hành động vào sự kiện tại nhiều thời điểm khác nhau.
    // https://freetuts.net/ham-addeventlistener-trong-javascript-374.html
    window.addEventListener("DOMContentLoaded", stars.init);
    window.location.onload();
</script>