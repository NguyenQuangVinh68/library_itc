<header class="container-fluid p-0 ">
    <div class=" bg-white text-dark">
        <div class="row  py-3 px-5 w-100">
            <div class="col-lg-5 col-md-5 col-5">
                <h3 class="text-dark">ITC Library</h3>
            </div>
            <div class="col-lg-2 col-md-2 col-2"></div>
            <div class="col-lg-5 col-md-5 col-5">
                <ul class="nav justify-content-end">
                    <?php 
                        if (!isset($_SESSION['user'])) :
                    ?>
                    <li class="nav-item"><a class="nav-link text-dark fw-bold" href="index.php?controller=login">Sign
                            In</a></li>
                    <?php 
                        else :
                    ?>
                    <li class="nav-item user">
                        <?php echo '<a class="nav-link text-dark fw-bold" href=""><span class="text-primary">Xin chào</span> '.$_SESSION['tenuser'].'</a>';?>
                        <i class="fas fa-caret-down"></i>
                        <ul class="user-action-list">
                            <li class="user-action-item">
                                <a href="index.php?controller=login&action=logout">Đổi mật khẩu</a>
                            </li>
                            <li class="user-action-item">
                                <a href="index.php?controller=login&action=logout">Đăng xuất</a>
                            </li>
                        </ul>

                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="main text-white">
        <div class=" bg-info ">
            <div class=" container-fluid px-5 "
                style="background: linear-gradient(206.57deg, #0f5b97c4 0%, #0C4470 100%);border-bottom: 2px solid #fff;">
                <ul class="nav py-2">
                    <li class="nav-item pe-5 ">
                        <a class="nav-link p-0 fs-5 text-white active" aria-current="page" href="index.php">Trang
                            Chủ</a>
                    </li>
                    <li class="nav-item pe-5 ">
                        <a class="nav-link p-0 fs-5 text-white" href="index.php?controller=book">Tìm Sách</a>
                    </li>
                    <li class="nav-item pe-5 ">
                        <a class="nav-link p-0 fs-5 text-white" href="#">Sách Chuyên Ngành</a>
                    </li>
                    <li class="nav-item pe-5 ">
                        <a class="nav-link p-0 fs-5 text-white" href="">Yêu Thích</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>


<style>
.nav-item.user {
    background-color: #fff;
    filter: brightness(95%);
    border-radius: 20px;
    padding-right: 10px;
    position: relative;
    transition: all linear 0.3s;
}

.nav-item.user i {
    content: '';
    display: block;

    position: absolute;
    right: 10px;
    top: 50%;
    transform: translate(0, -50%);
}

.user-action-list {
    position: absolute;
    top: 100%;

    width: 100%;
    height: auto;
    background-color: #fff;
    list-style: none;
    box-shadow: 0 5px 5px #333;
    display: none;
    transition: display linear 1s;
    padding-left: 0;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    overflow: hidden;
}

.user-action-list .user-action-item a {
    padding: 10px;
    display: block;
}

.user-action-list .user-action-item:hover a {
    background-color: #ffa500;
    color: #Fff;
    border-radius: 5px;
}

.nav-item.user:hover {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

.nav-item.user:hover .user-action-list {
    display: block;
    transition: display linear 1s;
}

@media only screen and (max-width: 390px) {
    #title_search {
        font-size: 18px;
    }

    .fs-5 {
        font-size: 16px !important;
    }
}
</style>