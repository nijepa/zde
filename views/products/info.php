<div id="product" class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <?php
            /**$prod = new ProductModel;
            $gr="Trenutno nema artikala u ovoj grupi.";
            foreach ($prod->view() as $it) :
                $gr = $it['gp'];
            endforeach; **/?>
            <h3><?php// echo $gr; ?></h3>
            <p>Molimo Vas <strong>pošaljite zahtev !</strong> za dodatne informacije.<br> Odgovaramo u najkraćem vremenskom roku...</p>
        </div><!-- end title -->

        <div class="row">
            <?php
            $product = new ProductModel;
            foreach ($product->info() as $item) :
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable">
                        <div class="price-value">Naziv: <?php echo $item['prod_name']; ?>
                            <span class="month">Cena: <?php echo $item['prod_price']; ?> €</span>
                        </div>
                        <ul class="pricing-content">
                            <li>Opis: <?php echo $item['prod_description']; ?></li>
                            <li>Procesor: <?php echo $item['prod_processor']; ?></li>
                            <li>Memorija: <?php echo $item['prod_memory']; ?></li>
                            <li>HD: <?php echo $item['prod_hd']; ?></li>
                            <li>Optika: <?php echo $item['prod_optic']; ?></li>
                            <li>Grafika: <?php echo $item['prod_graphic']; ?></li>
                            <li>Baterija: <?php echo $item['prod_batery']; ?></li>
                            <li>Kamera: <?php echo $item['prod_camera']; ?></li>
                        </ul>
                        <!--<a href="#" class="pricingTable-signup hvr-bounce-to-right">Naruči</a>-->
                    </div>
                </div>

                <div style="background-color: #0f0f0f" class="col-md-6 col-sm-6">
                <div class="pricingTable">
                    <div class="price-value">Zatražite dodatne informacije ...</div>
                    <div class="contact_form">
                        <!--<div id="message"></div>-->
                        <form  id="contactform" action="assets/contact.php" name="contactform" method="post">
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
                                    <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Poruka...">Izabrani artikal : &#13;&#10; Šifra : <?php echo $item['prod_id']; ?> &#13;&#10; Naziv : <?php echo $item['prod_name']; ?> &#13;&#10;</textarea>
                                </div>
                                <div class="text-center pdi">
                                    <button type="submit" value="SEND" id="submit" class="hvr-bounce-to-right get-btn">Pošalji</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div><!-- end container -->
</div><!-- end section -->