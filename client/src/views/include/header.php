<header class="container-fluid p-0  text-white">
    <div class="bg-white">
        <div class="row  py-3 px-5 ">
            <div class="col-lg-5 col-md-5 col-5">
                <h3 class="text-dark">ITC Library</h3>
            </div>
            <div class="col-lg-2 col-md-2 col-2"></div>
            <div class="col-lg-5 col-md-5 col-5">
                <ul class="nav justify-content-end">
                    <li class="nav-item"><a class="nav-link text-dark fw-bold" href="">Create Account</a></li>
                    <li class="nav-item"><a class="nav-link text-dark fw-bold" href="">Sign In</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main">
        <div class=" bg-info w-100 banner">
            <div class=" container-fluid px-5 " style="background: linear-gradient(206.57deg, #0f5b97c4 0%, #0C4470 100%);border-bottom: 2px solid #fff;">
                <ul class="nav py-2">
                    <li class="nav-item pe-5 ">
                        <a class="nav-link p-0 fs-5 text-white active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item pe-5 ">
                        <a class="nav-link p-0 fs-5 text-white" href="#">Features</a>
                    </li>
                    <li class="nav-item pe-5 ">
                        <a class="nav-link p-0 fs-5 text-white" href="#">Pricing</a>
                    </li>
                    <li class="nav-item pe-5 ">
                        <a class="nav-link p-0 fs-5 text-white disabled">Disabled</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center justify-content-center" style="height: 450px;">
                <div>
                    <h1 id="title_search">Find items in libraries near you</h1>
                    <div>
                        <form action="">
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                <input type="text" class=" form-control border-bottom border-0 p-2 w-75 " placeholder="Search anything" required autofocus>
                                <i class="fa-solid fa-magnifying-glass fs-3  rounded p-2 " style="background-color: #2075ba;"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    .banner {
        background: linear-gradient(206.57deg, #2f93e2a3 0%, #0c4470 100%), url(" https://www.datocms-assets.com/29926/1617727156-header-nocolor-bg.png") center center/cover;
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