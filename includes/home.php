<?php
require('connect.php');


function buldingMenu($parent, $menuData)
{
    $html = '';
    if (isset($menuData['menu_parent_id'][$parent])) {
        $html .= "<ul id='navigation' class='submenu'>";
        foreach ($menuData['menu_parent_id'][$parent] as $value) {
            $html .= "<li>";
            $html .= "<a href='" . $menuData['items'][$value]['menu_link'] . "'> " . $menuData['items'][$value]['menu_title'] . "</a>";
            $html .= buldingMenu($value, $menuData);
            $html .= "</li>";
        }
        $html .= "</ul>";
    }
    return $html;
}
$sql = "SELECT * FROM `menu`";
$result = $conn->query($sql);

$menuData = [];
foreach ($result as $value) {
    $menuData['items'][$value['menu_id']] = $value;
    $menuData['menu_parent_id'][$value['menu_parent_id']][] = $value['menu_id'];
}
// echo "<pre>";
// var_dump( $menuData['items'][$value['menu_id']]);
// echo "</pre>";

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NEWS - TỔNG HỢP TIN TỨC </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/ticker-style.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-sm-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>     
                                    <li class="title"><span class="flaticon-energy"></span> trending-title</li>
                                    <li>Class property employ ancho red multi level mansion</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-date">
                                    <li><span class="flaticon-calendar"></span> +880166 253 232</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid gray-bg">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                            <div class="logo">
                                <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src="assets/img/gallery/header_card.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>                  
                                    <?php echo buldingMenu(0, $menuData) ?>
                                </nav>
                            </div>
                        </div>             
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="header-right f-right d-none d-lg-block">
                                <!-- Heder social -->
                                <ul class="header-social">    
                                    <li><a href="logout.php">Đăng xuất</a></li>
                                </ul>
                                <!-- Search Nav -->
                                <div class="nav-search search-switch">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Header End -->
    </header>
    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix pt-25 gray-bg">
            <div class="container">
                <div class="trending-main">
                    <div class="row" id="trending-area">
                        <div class="col-lg-8">
                            <!-- Single -->
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img" id="trending_area_single">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Right content -->
                        <div class="col-lg-4">
                            <!-- Trending Top -->
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6">
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img" id="trending_top_1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6">
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img" id="trending_top_2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->
        <<!-- Whats New Start -->
            <section class="whats-news-area pt-50 pb-20 gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="whats-news-wrapper">
                                <!-- Heading & Nav Button -->
                                <div class="row justify-content-between align-items-end mb-15">
                                    <div class="col-xl-4">
                                        <div class="section-tittle mb-30">
                                            <h3>Tin tức</h3>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-md-9">
                                        <div class="properties__button">
                                            <!--Nav Button  -->
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Thế giới</a>
                                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Thời sự</a>
                                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Kinh doanh</a>
                                                    <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Giải trí</a>
                                                    <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Thể thao</a>
                                                </div>
                                            </nav>
                                            <!--End Nav Button  -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Tab content -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Nav Card -->
                                        <div class="tab-content" id="nav-tabContent">
                                            <!-- card one -->
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <div class="row">
                                                    <!-- Left Details Caption -->
                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="whats-news-single mb-40 mb-40" id="left_details_caption_0">
                                                            
                                                        </div>
                                                    </div>
                                                    <!-- Right single caption -->
                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="row">
                                                            <!-- single -->
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_0_1">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_0_2">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_0_3">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_0_4">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card two -->
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <div class="row">
                                                    <!-- Left Details Caption -->
                                                    <div class="col-xl-6">
                                                        <div class="whats-news-single mb-40" id="left_details_caption_1">
                                                            
                                                        </div>
                                                    </div>
                                                    <!-- Right single caption -->
                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="row">
                                                            <!-- single -->
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_1_1">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_1_2">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_1_3">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_1_4">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card three -->
                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                <div class="row">
                                                    <!-- Left Details Caption -->
                                                    <div class="col-xl-6">
                                                        <div class="whats-news-single mb-40" id="left_details_caption_2">
                                                            
                                                        </div>
                                                    </div>
                                                    <!-- Right single caption -->
                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="row">
                                                            <!-- single -->
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_2_1">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_2_2">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_2_3">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_2_4">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card fure -->
                                            <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                                <div class="row">
                                                    <!-- Left Details Caption -->
                                                    <div class="col-xl-6">
                                                        <div class="whats-news-single mb-40" id="left_details_caption_3">
                                                            
                                                        </div>
                                                    </div>
                                                    <!-- Right single caption -->
                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="row">
                                                            <!-- single -->
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_3_1">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_3_2">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_3_3">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_3_4">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card Five -->
                                            <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                                                <div class="row">
                                                    <!-- Left Details Caption -->
                                                    <div class="col-xl-6">
                                                        <div class="whats-news-single mb-40" id="left_details_caption_4">
                                                            
                                                        </div>
                                                    </div>
                                                    <!-- Right single caption -->
                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="row">
                                                            <!-- single -->
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_4_1">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_4_2">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_4_3">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20" id="right_single_caption_4_4">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Nav Card -->
                                    </div>
                                </div>
                            </div>
                            <!-- Banner -->
                            <div class="banner-one mt-20 mb-30">
                                <img src="assets/img/gallery/body_card1.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Flow Socail -->
                            <div class="single-follow mb-45">
                                <div class="single-box">
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Most Recent Area -->
                            <div class="most-recent-area">
                                <!-- Section Tittle -->
                                <div class="small-tittle mb-20">
                                    <h4>Tin sức khỏe</h4>
                                </div>
                                <!-- Details -->
                                <div class="most-recent mb-40">
                                    <div class="most-recent-img" id="most_recent_area">
                                        
                                    </div>
                                </div>
                                <!-- Single -->
                                <div class="most-recent-single" id="most_recent_single_1">
                                    
                                </div>
                                <!-- Single -->
                                <div class="most-recent-single" id="most_recent_single_2">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Whats New End -->
            <!--   Weekly2-News start -->
            <div class="weekly2-news-area pt-50 pb-30 gray-bg">
                <div class="container">
                    <div class="weekly2-wrapper">
                        <div class="row">
                            <!-- Banner -->
                            <div class="col-lg-3">
                                <div class="home-banner2 d-none d-lg-block">
                                    <img src="assets/img/gallery/body_card2.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="slider-wrapper">
                                    <!-- section Tittle -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="small-tittle mb-30">
                                                <h4>Tin du lịch</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Slider -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="weekly2-news-active d-flex">
                                                <!-- Single -->
                                                <div class="weekly2-single" id="most_popular_single_0">
                                                    
                                                </div>
                                                <!-- Single -->
                                                <div class="weekly2-single" id="most_popular_single_1">
                                                    
                                                </div>
                                                <!-- Single -->
                                                <div class="weekly2-single" id="most_popular_single_2">
                                                    
                                                </div>
                                                <!-- Single -->
                                                <div class="weekly2-single" id="most_popular_single_3">
                                                    
                                                </div>
                                                <!-- Single -->
                                                <div class="weekly2-single" id="most_popular_single_4">
                                                    
                                                </div>
                                                <!-- Single -->
                                                <div class="weekly2-single" id="most_popular_single_5">
                                                    
                                                </div>
                                                <!-- Single -->
                                                <div class="weekly2-single" id="most_popular_single_6">
                                                    
                                                </div>
                                                <!-- Single -->
                                                <div class="weekly2-single" id="most_popular_single_7">
                                                    
                                                </div>
                                                <!-- Single -->
                                                <div class="weekly2-single" id="most_popular_single_8">
                                                    
                                                </div>
                                                <!-- Single -->
                                                <div class="weekly2-single" id="most_popular_single_9">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Weekly-News -->
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-main footer-bg">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo">
                                        <a href="index.php"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                        <p class="info1">Trường Đại học Vinh</p>
                                        <p class="info2">Viện Kỹ thuật và Công nghệ, Tầng 1 Nhà A0</p>
                                        <p class="info2">Phone: 0238 3855 452</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Popular post</h4>
                                </div>
                                <!-- Popular post -->
                                <div class="whats-right-single mb-20">
                                    <div class="whats-right-img">
                                        <img src="assets/img/gallery/footer_post1.png" alt="">
                                    </div>
                                    <div class="whats-right-cap">
                                        <h4><a href="latest_news.php">Scarlett’s disappointment at latest accolade</a></h4>
                                        <p>Jhon | 2 hours ago</p>
                                    </div>
                                </div>
                                <!-- Popular post -->
                                <div class="whats-right-single mb-20">
                                    <div class="whats-right-img">
                                        <img src="assets/img/gallery/footer_post2.png" alt="">
                                    </div>
                                    <div class="whats-right-cap">
                                        <h4><a href="latest_news.php">Scarlett’s disappointment at latest accolade</a></h4>
                                        <p>Jhon | 2 hours ago</p>
                                    </div>
                                </div>
                                <!-- Popular post -->
                                <div class="whats-right-single mb-20">
                                    <div class="whats-right-img">
                                        <img src="assets/img/gallery/footer_post3.png" alt="">
                                    </div>
                                    <div class="whats-right-cap">
                                        <h4><a href="latest_news.php">Scarlett’s disappointment at latest accolade</a></h4>
                                        <p>Jhon | 2 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="banner">
                                    <img src="assets/img/gallery/body_card4.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom aera -->
            <div class="footer-bottom-area footer-bg">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy;<script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Search model Begin -->
    <div class="search-model-box">
        <div class="d-flex align-items-center h-100 justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/rss.js"></script>

</body>

</html>