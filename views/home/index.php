<?php
    $news_e = 0;
    $products_e = 0;
    $manufacturers_e = 0;
    $section = new SectionModel;
    foreach ($section->Index() as $item) :
        if($item['section_name'] == 'news' && $item['enabled'] == 1) :
            $news_e = 1;
        endif;
        if($item['section_name'] == 'products' && $item['enabled'] == 1) :
            $products_e = 1;
        endif;
        if($item['section_name'] == 'manufacturers' && $item['enabled'] == 1) :
            $manufacturers_e = 1;
        endif;     
    endforeach;    
?>

<!-- --------------- SLIDER --------------- -->
<section id="home" class="cd-hero js-cd-hero js-cd-autoplay">
    <ul class="cd-hero__slider">
<?php
    $man = new ServiceModel;
    foreach ($man->Index() as $item) :
        if ($item['service_id'] == 1) { 
?>
        <li class="cd-hero__slide cd-hero__slide--selected js-cd-slide">
    <?php } else { ?>
        <li class="cd-hero__slide js-cd-slide">
    <?php } ?>
            <div class="cd-hero__content cd-hero__content--half-width">
                <h2>ZDE SERVIS </h2>
                <p><?php echo $item['service_name']; ?></p>
            </div> <!-- .cd-hero__content -->
            <div class="cd-hero__content cd-hero__content--half-width cd-hero__content--img">
                <img src="<?php echo IMG_PATH; ?><?php echo $item['service_img']; ?>" class="img-fluid" alt="tech 1">
            </div> <!-- .cd-hero__content -->
        </li>
<?php endforeach; ?>
    </ul> <!-- .cd-hero__slider -->
    <div class="cd-hero__nav js-cd-nav">
        <nav>
            <span class="cd-hero__marker cd-hero__marker--item-1 js-cd-marker"></span>
            <ul>
                <li class="cd-selected"><a href="#0">01</a></li>
                <li><a href="#0">02</a></li>
                <li><a href="#0">03</a></li>
                <li><a href="#0">04</a></li>
                <li><a href="#0">05</a></li>
            </ul>
        </nav>
    </div> <!-- .cd-hero__nav -->
</section> <!-- .cd-hero -->

<!-- --------------- MANUFACTURERS --------------- -->
<?php if($manufacturers_e == 1) : ?>
    <div id="news1" class="section db">
        <div class="container">
            <div class="row">
    <?php
        $man = new ManufacturerModel;
        foreach ($man->Index() as $item) :
    ?>
                <div class="col-md-2 col-sm-2">
                    <div class="our-team">
                        <div class="team_img">
                            <img style="width: 70px;" src="<?php echo IMG_PATH; ?><?php echo $item['man_img']; ?>">
                        </div>
                    </div>
                </div>
    <?php endforeach; ?>
            </div>
        </div><!-- end container -->
    </div><!-- end section -->
<?php endif; ?>

<!-- --------------- ABOUT US --------------- -->
<div id="about" class="section wb">
    <div class="container">
        <img src="<?php echo ROOT_PATH; ?>assets/images/logos/logoFull.png" alt="image" style="display: block;  margin: 0 auto;">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h3>O Nama</h3>
                    <p> <b>Servis računara ZDE</b> je servisni centar u Beogradu koji je specijalizovan za  održavanje  i servisiranje vaših:<br><br>
                        Notebook računara, Tablet računara, Netbook računara, PC računara, TFT monitora, Televizora, DVD playera, Štampača, Skenera, napajanja, matičnih ploča.<br><br>
                        ZDE servisni centar servisira uređaje svih proizvodjača : <b>ACER, ASUS, APPLE, COMPAQ, DELL, FUJITSU, GATEWAY, HP, IBM, LENOVO, LG, TOSHIBA, MSI, SIEMENS, SAMSUNG, SONY VAIO, PHILIPS, PACKARD BELL, NEC</b> , uz davanje garancije na uradjeni servis u trajanju od 3 meseca.</p>
                </div><!-- end title -->
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="about-left">
                    <img src="assets/uploads/about-1.jpg" class="img-fluid" alt="" />
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="about-right">
                    <h2>Zadovoljni klijenti </h2>
                    <p><b>Servis računara ZDE</b> je servis računara sa iskustvom i  zadovoljnim klijentima koji se uvek vraćaju u naš servisni centar.<br><br>
                        U našim  servisnim prostorijama za servis računara ZDE dobićete brzu i kvalitetnu uslugu popravke i održavanja Vašeg računara , monitora, televizora, štampača ili skenera.<br><br>
                        <b>Servis računara ZDE</b>- Servis lakših kvarova obavlja  isti dan, a kod težih kvarova servis se obavlja za par radnih dana.</p>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6">
                <div class="about-right">
                    <h2>Rezervni delovi </h2>
                    <p><b>Servis računara ZDE</b> vrši otkup neispravnih desktop i laptop računara, monitora i LED ili LCD televizora po najpovoljnijm cenama pored toga vrši zamenu polovno za polovno ili novo, nadogradnju računara.<br><br>
                       <b>Servis računara ZDE</b> ima veliki izbor rezervnih delova : memorija, ekrana ili display-a, tastatura, hard diskova, matičnih ploča, napajanja, kućišta, optičkih komponenti.<br><br>
                       Veliki izbor rezervnih delova nam omogućava da brzo i u velikom procentu popravimo donete uredjaje na servis."</p>
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="about-left">
                    <img src="assets/uploads/about-2.jpg" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- --------------- NEWS --------------- -->
<?php if($news_e == 1) : ?>
    <div id="news" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Vesti / Akcije</h3>
                <p class="lead">Najnovije vesti iz ZDE,<br> akcije iz naše ponude..</p>
            </div><!-- end title -->
            <div class="row">
    <?php
        $new = new NewModel;
        foreach ($new->view() as $item) :
    ?>
                <div class="col-md-4 col-sm-6">
                    <a class="link" href="<?php echo ROOT_PATH; ?>news/view" data-no="1">
                    <div class="our-team">
                        <div class="team_img">
                            <img style="width: 200px;" src="<?php echo IMG_PATH; ?><?php echo $item['news_img']; ?>">
                        </div>
                        <div class="team-content">
                            <h3 class="title"><?php echo $item['news_title']; ?></h3>
                            <span class="post"><?php echo date("d-m-Y", strtotime($item['news_date'])); ?></span>
                            <p><?php echo $item['news_description']; ?></p>
                        </div>
                    </div>
                    </a>
                </div>
    <?php endforeach; ?>
            </div>
        </div><!-- end container -->
    </div><!-- end section -->
<?php endif; ?>

<!-- --------------- SERVICES --------------- -->
<div id="services" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Usluge</h3>
            <!--<p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum<br>auctor nisi elit consequat ipsum, nec sagittis sem!</p>-->
        </div><!-- end title -->

        <div class="owl-screenshots swiper-container">
            <div class="mobilescreen-image"></div>
            <div class="swiper-wrapper">
<?php
    $service = new ServiceModel;
    foreach ($service->Index() as $item) :
?>
                <div class="swiper-slide">
                    <div class="service-widget">
                        <a class="link" data-id="<?php echo $item['service_id']; ?>" href="<?php echo ROOT_PATH; ?>services/info" data-no="1"><div class="post-media entry wow fadeIn">
                        <img style="width: 250px; height: 250px" src="<?php echo IMG_PATH; ?><?php echo $item['service_img']; ?>" alt="" class="img-fluid img-rounded">
                            <div class="magnifier"></div>
                        <h3 class="title"><?php echo $item['service_name']; ?></h3>
                        <p class="description"><?php echo $item['service_description']; ?></p>
                        <span class="post">*</span>
                        </div></a>
                    </div>
                </div><!-- end service -->
<?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </div>
            <div class="swiper-button-prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div><!-- end row -->			
    </div><!-- end container -->
</div><!-- end section -->

<!-- --------------- GROUPS --------------- -->
<?php if($products_e == 1) : ?>
    <div id="features" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Prodaja </h3>
                <p class="lead">Novo<br>Polovno</p>
            </div><!-- end title -->
            <div class="row">
    <?php
        $group = new GroupModel;
        foreach ($group->Index() as $item) :
    ?>
                <div class="col-md-4">
                    <div class="services-inner-box">
                        <div class="ser-icon">
                            <a class="link" data-id="<?php echo $item['group_id']; ?>" href="<?php echo ROOT_PATH; ?>products/view" data-no="1">
                            <img src="<?php echo IMG_PATH; ?><?php echo $item['group_img']; ?>" class="img-responsive" style="width: 70px;"
                            <i class=" fa fa-desktop effect-1"></i></a>
                        </div>
                        <h2><?php echo $item['group_title']; ?></h2>
                        <p><?php echo $item['group_description']; ?></p>
                    </div>
                </div><!-- end col -->
    <?php endforeach; ?>
            </div>
        </div><!-- end container -->
    </div><!-- end section -->
<?php endif; ?>

<!-- --------------- PRODUCTS --------------- -->
<?php if($products_e == 1) : ?>
    <div id="product" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Artikli</h3>
                <p>Neki od artikala <strong>iz naše ponude!</strong> U ponudi imamo još.<br> Pogledajte detalje ili izaberite grupu artikala.</p>
            </div><!-- end title -->
            <div class="row">
    <?php
        $product = new ProductModel;
        foreach ($product->main() as $item) :
    ?>
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable">
                        <div class="price-value"><?php echo $item['prod_name']; ?>
                            <span class="month"><?php echo $item['prod_price']; ?> €</span>
                        </div>
                        <h3 class="title"><?php echo $item['group_title']; ?></h3>
                        <ul class="pricing-content">
                            <li><?php echo $item['prod_processor']; ?></li>
                            <li><?php echo $item['prod_memory']; ?></li>
                            <li><?php echo $item['prod_hd']; ?></li>
                            <li><?php echo $item['prod_optic']; ?></li>
                            <li><?php echo $item['prod_graphic']; ?></li>
                        </ul>
                        <a class="pricingTable-signup hvr-bounce-to-right link" data-id="<?php echo $item['prod_id']; ?>" href="<?php echo ROOT_PATH; ?>products/info" data-no="1">Više ...</a>
                    </div>
                </div>
    <?php endforeach; ?>
            </div>
        </div><!-- end container -->
    </div><!-- end section -->
<?php endif; ?>

<!-- --------------- CONTACT --------------- -->
<div id="contact" class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Kontaktirajte nas</h3>
        </div><!-- end title -->
        <div class="row">
            <div class="col-md-12">
                <div class="contact_form">
                    <div id="message"></div>
                    <form id="contactform" class="row" action="assets/contact.php" name="contactform" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Ime">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Prezime">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Vaš Email">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Vaš Telefon">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Poruka..."></textarea>
                            </div>
                            <div class="text-center pdi">
                                <button type="submit" value="SEND" id="submit" class="hvr-bounce-to-right get-btn">Pošalji</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- end section -->

<!-- --------------- FOOTER --------------- -->
<footer class="footer">
    <div class="container">
        <div class="row">
<?php
    $profile = new ProfileModel;
    foreach ($profile->Index() as $item) :
?>
            <div class="col-md-6">
                <div class="subscribe-text">
                    <h3><?php echo $item['profile_name']; ?></h3>
                    <p><?php echo $item['profile_subname']; ?></p>
                    <p><?php echo $item['profile_description']; ?></p>
                    <p style="font-size: 20px;"><?php echo $item['profile_working']; ?></p>
                </div>
            </div>
                <div class="col-md-6">
                    <div class="subscribe-text">
                        <p>E-mail : <a href="mailto:<?php echo $item['profile_email']; ?>"><?php echo $item['profile_email']; ?></a>  ,  <a href="mailto:<?php echo $item['profile_email2']; ?>"><?php echo $item['profile_email2']; ?></a></p>
                        <p>Telefon : <a href="tel:<?php echo $item['profile_phone']; ?>"><?php echo $item['profile_phone']; ?></a></p>
                        <p>Mobilni : <a href="tel:<?php echo $item['profile_mob']; ?>"><?php echo $item['profile_mob']; ?></a></p>
                        <p>Adresa : <?php echo $item['profile_address']; ?></p>
                    </div>
                </div>
<?php endforeach; ?>
        </div>
    </div>
    <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d595.1492700698589!2d20.486104868155877!3d44.80072019449271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7a9d4c73b34b%3A0x81be214273ecbe78!2z0JHRg9C70LXQstCw0YAg0LrRgNCw0ZnQsCDQkNC70LXQutGB0LDQvdC00YDQsCAxODAsINCR0LXQvtCz0YDQsNC0!5e0!3m2!1ssr!2srs!4v1550008811149" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="subscribe-text">
                    <h3>Prijavite se na listu</h3>
                    <p>Prijavite se na listu da povremeno dobijate obaveštenja o našim vestima, novitetima, akcijama... </p>
                </div>
                <div class="subscribe-form">
                    <form>
                        <input class="form-control" id="subscribe_email" name="email" placeholder="Email Adresa..." required="" type="email">
                        <button type="submit" class="btn subscribe-btn"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer><!-- end footer -->