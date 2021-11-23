<header>
        <!-- Header Top Start Here -->
        <div class="header-top-area">
            <div class="container">
                <!-- Header Top Start -->
                <div class="header-top">
                    <ul>
                        <li><a href="#"><i class='bx bx-buildings' style="font-size:18px; margin: 3px"></i>ĐỊA ĐIỂM</a></li>
                        <li><a href="#"><i class='bx bx-mail-send' style="font-size:18px; margin: 3px"></i>GỬI EMAIL</a></li>
                        <li><a><i class='bx bx-time' style="font-size:18px; margin: 3px"></i>07:00 - 22:30</a></li>
                        <li><a><i class='bx bx-phone' style="font-size:18px; margin: 3px"></i>+84 962 035 588</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Hello <?php echo $data['username']?><i class='bx bxs-user-check'  style="font-size:20px; margin: 5px"></i></a>
                            <ul class="ht-dropdown">
                                <li><a href="#">Thay đổi thông tin</a></li>
                                <li><a href="#">Thay đổi mật khẩu</a></li>
                                <li><a href="/web211/LoginController/logout">Đăng xuất</a></li>
                            </ul>
                            <!-- Dropdown End -->
                        </li>
                    </ul>
                </div>
                <!-- Header Top End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Header Top End Here -->
        <!-- Header Middle Start Here -->
        <div class="header-middle ptb-15">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col-lg-3 col-md-12">
                        <div class="logo mb-all-30">
                            <a href="#"><img src="<?php echo SCRIPT_ROOT.'/public/assets/img/logo/logo1.png';?>" alt=""></a>
                        </div>
                    </div>
                    <!-- Categorie Search Box Start Here -->
                    <div class="col-lg-5 col-md-8 ml-auto mr-auto col-10">
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="cart-box mt-all-30">
                            <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                                <li><a href="/web211/CartController/index"><i class='bx bx-cart-alt'></i><span
                                            class="my-cart"><span>Giỏ</span><span>hàng</span></span></a></li>
                                <?php
                                    if(!isset($_SESSION['username']))
                                    echo 
                                    "
                                    <li><a href='/web211/LoginController/index'><i class='bx bx-log-in'></i><span
                                    class='my-cart'><span>Đăng</span><span>nhập</span></span></a></li>
                                    <li><a href='/web211/LoginController/register'><i class='bx bx-registered' ></i><span
                                    class='my-cart'><span>Đăng</span><span>kí</span></span></a></li>
                                    ";
                                    
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                    <!-- Cart Box End Here -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Header Middle End Here -->
        <!-- Header Bottom Start Here -->
        <div class="header-bottom  header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-lg-8 col-md-12 ">
                        <nav class="d-none d-lg-block">
                            <ul class="header-bottom-list d-flex">
                                <li class="active"><a href="/web211/HomeController/index">GIỚI THIỆU CHUNG<i
                                            class="fa fa-angle-down"></i></a>
                                    <!-- Home Version Dropdown Start -->
                                    <ul class="ht-dropdown">
                                        <li><a href="#">Về The Moshav Farm</a></li>
                                        <li><a href="#">Thành Viên Sáng Lập</a></li>
                                        <li><a href="#">Thông Điệp Từ Người Sáng Lập</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">LĨNH VỰC KINH DOANH</a></li>
                                <li><a href="/web211/HomeController/products">SẢN PHẨM</a></li>
                                <li><a href="#">TIN TỨC<i class="fa fa-angle-down"></i></a>
                                    <!-- Home Version Dropdown Start -->
                                    <ul class="ht-dropdown dropdown-style-two">
                                        <li><a href="#">Moshav & Xã Hội</a></li>
                                        <li><a href="#">Con Người Moshav Farm</a></li>
                                        <li><a href="#">Thông Tin Sản Phẩm</a></li>
                                        <li><a href="#">Chương Trình Khuyến Mãi</a></li>
                                    </ul>

                                </li>
                                <li><a href="/web211/HomeController/hiring">TUYỂN DỤNG</a></li>

                            </ul>
                        </nav>

                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>

    </header>