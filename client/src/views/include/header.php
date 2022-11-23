<?php
function active($currect_page)
{
    $url_array =  explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if ($currect_page == $url) {
        echo 'active'; //class name in css 
    }
}
?>


<header>
    <div class="row px-5 py-3 header__top w-100">
        <div class="col-lg-8 col-md-8 col-8">
            <div class="d-flex justify-content-start align-items-center gap-3 ">
                <div style="width:75px; height:75px" class="d-flex align-items-center">
                    <img src="./src/assets/images/logo_brand.png" alt="" class="w-100">
                </div>
                <div class="text__logo">ITC Library</div>
            </div>
        </div>
        <div class="col-lg-4 col-mg-4 col-4 d-flex justify-content-end align-items-center">
            <?php
            if (!isset($_SESSION['user'])) :
            ?>
                <a class="btn btn-outline-dark" href="index.php?controller=login">Signin</a>
            <?php else : ?>
                <div style="width:40px; height:40px; ">
                    <button class=" border-0 bg-white p-0 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <img src="./src/assets/images/face/2.jpg" alt="" class="w-100 rounded-pill" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php echo $_SESSION['tenuser'] ?>">
                    </button>
                </div>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">Your Profile</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <p class="text-center bg-info  p-3">Xin chào <?php echo $_SESSION['tenuser'] ?></p>
                        <a class="btn btn-primary w-100 mt-4" href="index.php?controller=password&action=changepassword">Đổi mật khẩu</a>
                        <a class="btn btn-primary w-100 mt-4" href="index.php?controller=password&action=changepassword">Đăng xuất</a>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>

    <!-- menu -->

    <nav class="navbar navbar-expand-sm p-0" style="background: linear-gradient(206.57deg, #0f5b97c4 0%, #0C4470 100%);border-bottom: 2px solid #fff;">
        <div class="container-fluid">
            <button class=" navbar-toggler " id="btn__menu" type="button" data-bs-toggle="collapse" data-bs-target="#header__menu">
                <i class="fa-solid fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="header__menu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php active('') || active('index.php'); ?>" aria-current="page" href="index.php">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php active('index.php?controller=book&action=top5'); ?>" href="index.php?controller=book&action=top5">bxh</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Danh Mục</a>
                        <ul class="dropdown-menu ">
                            <?php
                            $categoryModel = new CategoryModel();
                            $resultCategory = $categoryModel->getCategory();
                            if (isset($resultCategory)) :
                                while ($category = $resultCategory->fetch()) :
                            ?>
                                    <li><a class="dropdown-item " href="index.php?controller=book&name_category=<?php echo $category['tentheloai'] ?>"><?php echo $category['tentheloai'] ?></a></li>
                            <?php
                                endwhile;
                            endif;
                            ?>
                        </ul>
                    </li>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <li class="nav-item ">
                            <a class="nav-link <?php active('index.php?controller=book&action=mylikebook'); ?>" href="index.php?controller=book&action=mylikebook">Yêu Thích</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<style>
    @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600;700;800&display=swap');

    .text__logo {
        font-size: 40px !important;
        font-family: 'JetBrains Mono', monospace;
    }

    .btn__menu {
        display: flex;
        margin-left: auto;
    }

    #btn__menu:focus {
        box-shadow: none;
    }

    #header__menu li {
        margin: 5px 10px;
    }

    #header__menu .nav-link {
        font-family: 'JetBrains Mono', monospace;
        font-size: 15px;
        font-weight: 500;
        color: #d9e0ff !important;
        text-transform: capitalize;
    }

    #header__menu .nav-link.active,
    #header__menu .nav-link:hover {
        border-bottom: 2px solid #acb2ca;
    }

    @media only screen and (max-width: 390px) {
        .header__top {
            padding: 10px 20px !important;
        }

        #title_search {
            font-size: 18px;
        }

        .text__logo {
            font-size: 10px !important;
        }
    }
</style>

<script>
    window.addEventListener("resize", () => {
        var nav__toogle = document.getElementById("btn__menu");
        var __width = 390;
        if (__width <= 390) {
            nav__toogle.classList.add("btn__menu")
        } else {
            nav__toogle.classList.remove("btn__menu")
        }
    })
</script>