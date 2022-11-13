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
                    <img width="100%" src="<?php echo $set['anhbia']; ?>" style="box-shadow: -2px -3px 7px #333"/>
                </div>
                <div class="col-9">
                    <h5 class="titlebook"><?php echo $set['nhande']; ?></h5>
                    <p>Thông tin xuất bản: <span style="font-style: italic;"><?php echo $set['thongtinxb']; ?></span></p>
                    <p>Tác giả: <span style="font-weight: bold;"><?php echo $set['tacgia']; ?></span></p>
                    <p>Bộ sưu tập: <span style="font-weight: bold;"><?php echo $set['bosuutap']; ?></span></p>

                    <?php
                    if(isset($_SESSION['user'])){
                        $c = new BookModel();
                        $res = $c->checkStatusOfThisUser($_SESSION['user'], $set['masach']);
                        if($res){
                            echo '<a href="index.php?controller=book&action=changestatus&masv='.$_SESSION['user'].'&masach='.$set['masach'].'" class="btn btn-warning"><i class="fa-solid fa-heart" style="color: red"></i></a>';
                        }else{
                            echo '<a href="index.php?controller=book&action=changestatus&masv='.$_SESSION['user'].'&masach='.$set['masach'].'" class="btn btn-second" style="border: 1px solid #333;"><i class="fa-regular fa-heart"></i></a>';
                        }
                    }else{
                        if(!isset($_SESSION['user'])){
                            echo '<a href="index.php?controller=login" class="btn btn-second" style="border: 1px solid #333;"><i class="fa-regular fa-heart"></i></a>';
                        }
                    }
                    ?>
                    
                    
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
                <a href="" class="btn btn-danger" style="display: none">Đăng kí mượn</a>
            </div>
        </div>
    </div>
</div>