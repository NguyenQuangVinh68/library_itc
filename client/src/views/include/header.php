<?php
    function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);  
    if($currect_page == $url){
        echo 'active'; //class name in css 
    } 
    }
?>

<header class="container-fluid p-0 ">
    <div class=" bg-white text-dark">
        <div class="row  py-3 px-5 w-100">
            <div class="col-lg-5 col-md-5 col-5 brand">
                <img src="./src/assets/images/logo_brand.png" alt="">
                <div class="text-dark">ITC Library</div>
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
                        <?php echo '<a class="nav-link text-white fw-bold" href=""><span class="text-dark">Xin chào</span> '.$_SESSION['tenuser'].'</a>';?>
                        <i class="fas fa-caret-down"></i>
                        <ul class="user-action-list">
                            <li class="user-action-item">
                                <a href="index.php?controller=password&action=changepassword">Đổi mật khẩu</a>
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
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link menu-nav-link <?php active('') || active('index.php');?>" aria-current="page" href="">Trang
                            Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-nav-link <?php active('index.php?controller=book');?>" href="index.php?controller=book">Tìm Sách</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-nav-link" href="#">BXH</a>
                    </li>
                    <?php
                        if(isset($_SESSION['user'])):
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-nav-link" href="">Yêu Thích</a>
                    </li>
                    <?php
                        endif; 
                    ?>
                </ul>
            </div>
        </div>
    </div>
</header>


<style>
@import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600;700;800&display=swap');
.brand {
    font-family: 'JetBrains Mono', monospace;
    display: flex;
    align-items: center;
}

.brand img {
    margin-right: 10px;
    width: 50px;
    height: 50px;
    border: 1px solid #333;
    border-radius: 50%;
}

.brand .text-dark {
    display: flex;
    align-items: center;
    font-size: 2rem;
}

.nav-item .nav-link.menu-nav-link {
    display: block;
    padding: 10px 20px;
    color: #fff;
    border-left: 1px solid transparent;
    border-right: 1px solid transparent;
}

.nav-item .nav-link.menu-nav-link:hover {
    border-left: 1px solid #fff;
    border-right: 1px solid #fff;
}


.nav-item .nav-link.menu-nav-link.active,
.nav-item .nav-link.menu-nav-link:hover {
    background: #45a9d4;
    color: #333;
}

.nav-item.user {
    background-color: #49b2df;
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
    background-color: #49b2df;
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
    background-color: #0c4673;
    color: #fff;
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