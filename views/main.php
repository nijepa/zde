<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Site Metas -->
<title>ZD Elektronik</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="Nikola Pavicevic">

<!-- Site Icons -->
<link rel="shortcut icon" href="<?php echo ROOT_PATH; ?>assets/images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo ROOT_PATH; ?>assets/images/logo.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.min.css">
<!-- Site CSS -->
<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/style.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/responsive.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/custom.css">
<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/sweetalert2.min.css">
<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/demo.css">

<noscript>
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/css/nojs.css" />
</noscript>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="app_version" data-spy="scroll" data-target="#navbarApp" data-offset="98">

<!-- LOADER -->
<div id="preloader">
    <img class="preloader" src="<?php echo ROOT_PATH; ?>assets/images/loaders/ajax-loader.gif" alt="">
</div><!-- end loader -->
<!-- END LOADER -->
<header class="header header_style_01">
    <nav class="navbar header-nav navbar-expand-lg" style="padding: 0;">
        <div class="container">
            <a class="navbar-brand" href="<?php echo ROOT_PATH; ?>">
                <img src="<?php echo ROOT_PATH; ?>assets/images/logos/logo.png" alt="image">
            </a>
            <?php if(isset($_SESSION['is_logged_in'])) : ?>
                <h1 style="font-size: 30px;margin-top: 20px" class="text-uppercase">ZDE &zigrarr; ADMIN</h1>
            <?php else : ?>
                <h1 style="font-size: 60px;margin-top: 20px" class="text-uppercase">ZDE</h1>
                <div style="font-size: 20px;margin-right: 10px; margin-left: 10px">SERVISNI CENTAR
                    <br />
                    <p style="font-size: 12px;margin-right: 20px; margin-left: 20px">za Laptop, Tablet i Desktop računare</p>
                </div>
            <?php endif; ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarApp" aria-controls="navbarApp" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarApp">
                <ul class="navbar-nav">
                    <?php if(isset($_SESSION['is_logged_in'])) : ?>
                        <li><a class="nav-link active" href="<?php echo ROOT_URL; ?>shared">Admin</a></li>
                        <li><a class="nav-link" href="<?php echo ROOT_URL; ?>news">Vesti</a></li>
                        <li><a class="nav-link" href="<?php echo ROOT_URL; ?>services">Usluge</a></li>
                        <li><a class="nav-link" href="<?php echo ROOT_URL; ?>groups">Grupe</a></li>
                        <li><a class="nav-link" href="<?php echo ROOT_URL; ?>products">Artikli</a></li>
                        <li><a class="nav-link" href="<?php echo ROOT_URL; ?>manufacturers">Proizvodjaci</a></li>
                        <li><a class="nav-link" href="<?php echo ROOT_URL; ?>users">Korisnici</a></li>
                        <li><a class="nav-link" href="<?php echo ROOT_URL; ?>profiles/edit">Profil</a></li>
                        <li><a class="nav-link" href="<?php echo ROOT_URL; ?>users/logout">Logout</a></li>
                        <li><a class="nav-tabs" style="color: #e56d31;" href="<?php echo ROOT_URL; ?>shared"><?php  echo 'Ulogovan : '. $_SESSION['user_data']['uname']. ' ' . $_SESSION['user_data']['email'] ; ?></a></li>
                    <?php else : ?>
                        <?php
                            $news_e = 0;
                            $products_e = 0;
                            $section = new SectionModel;
                            foreach ($section->Index() as $item) :
                                if($item['section_name'] == 'news' && $item['enabled'] == 1) :
                                    $news_e = 1;
                                endif;
                                if($item['section_name'] == 'products' && $item['enabled'] == 1) :
                                    $products_e = 1;
                                endif;    
                            endforeach;    
                        ?>
                        <?php if(isset($_SESSION['link_id'])) : ?>
                            <li><a class="nav-link active" href="<?php echo ROOT_URL; ?>#home">Home</a></li>
                            <li><a class="nav-link" href="<?php echo ROOT_URL; ?>#about">O nama</a></li>
                            <?php if($news_e == 1) : ?>
                                <li><a class="nav-link" href="<?php echo ROOT_URL; ?>#news">Vesti</a></li>
                            <?php endif; ?>
                            <li><a class="nav-link" href="<?php echo ROOT_URL; ?>#services">Usluge</a></li>
                            <?php if($products_e == 1) : ?>
                                <li><a class="nav-link" href="<?php echo ROOT_URL; ?>#features">Prodaja</a></li>
                                <li><a class="nav-link" href="<?php echo ROOT_URL; ?>#products">Artikli</a></li>
                            <?php endif; ?>
                            <li><a class="nav-link" href="<?php echo ROOT_URL; ?>#contact">Kontakt</a></li>
                            <!--<li><a style="font-size: small" class="nav-link link" href="<?php echo ROOT_PATH; ?>users/login" data-no="1">Login</a></li>-->
                            <?php unset($_SESSION['link_id']); ?>
                        <?php else : ?>
                            <li><a class="nav-link active" href="#home">Home</a></li>
                            <li><a class="nav-link" href="#about">O nama</a></li>
                            <?php if($news_e == 1) : ?>
                                <li><a class="nav-link" href="#news">Vesti</a></li>
                            <?php endif; ?>
                            <li><a class="nav-link" href="#services">Usluge</a></li>
                            <?php if($products_e == 1) : ?>
                                <li><a class="nav-link" href="#features">Prodaja</a></li>
                                <li><a class="nav-link" href="#product">Artikli</a></li>
                            <?php endif; ?>
                            <li><a class="nav-link" href="#contact">Kontakt</a></li>
                            <!--<li><a style="font-size: small" class="nav-link link" href="<?php echo ROOT_PATH; ?>users/login" data-no="1">Login</a></li>-->
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="section wb" style="margin-top: 0; margin-bottom: 0; text-align: center; padding: 0 0 0 0;">
    <?php
        $profile = new ProfileModel;
        foreach ($profile->Index() as $item) :
    ?>
        <p><?php echo $item['profile_working']; ?> &zigrarr; 
            <a href="mailto:<?php echo $item['profile_email2']; ?>"><?php echo $item['profile_email2']; ?> </a>&zigrarr;
            <a href="tel:<?php echo $item['profile_phone']; ?>"><?php echo $item['profile_phone']; ?></a> , <a href="tel:<?php echo $item['profile_mob']; ?>"><?php echo $item['profile_mob']; ?> </a>&zigrarr; 
            <a href="#map"><?php echo $item['profile_address']; ?></a>
        </p>
    <?php endforeach; ?>
</div>
</header>

<!-- PAGES LOADER -->
<div >
    <?php
        Messages::display();
        require($view);
    ?>
</div>
<!-- END PAGES LOADER -->

<div class="copyrights">
    <div class="container">
        <div class="footer-distributed">
            <div class="footer-left">
                <p class="footer-company-name">
                    <a style="text-decoration: none;" class="link" href="<?php echo ROOT_PATH; ?>users/login" data-no="1">All</a> Rights Reserved. &copy; 2019 
                    <a href="#">ZD Elektronik</a> Design By :
                    <a href="mailto:nijepa@gmail.com">nijepa</a>
                </p>
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end copyrights -->

<a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

<!-- ALL JS FILES -->
<script src="<?php echo ROOT_PATH; ?>assets/js/all.js"></script>
<!-- ALL PLUGINS -->
<script src="<?php echo ROOT_PATH; ?>assets/js/main.js"></script>
<script src="<?php echo ROOT_PATH; ?>assets/js/custom.js"></script>
<script src="<?php echo ROOT_PATH; ?>assets/js/my.js"></script>
<script src="<?php echo ROOT_PATH; ?>assets/js/swiper.min.js"></script>
<script src="<?php echo ROOT_PATH; ?>assets/js/sweetalert2.min.js"></script>
<script src="<?php echo ROOT_PATH; ?>assets/js/jquery.cslider.js"></script>
<script src="<?php echo ROOT_PATH; ?>assets/js/modernizr.custom.28468.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        effect: 'coverflow',
        centeredSlides: true,
        loopFillGroupWithBlank: true,
        slidesPerView: 3,
        initialSlide: 1,
        keyboardControl: true,
        mousewheelControl: false,
        lazyLoading: true,
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            1199: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            575: {
                slidesPerView: 1,
                spaceBetween: 3,
            }
        }
    });
</script>
</body>
</html>