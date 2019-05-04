<div id="product" class="section lb" style="margin-top: 60px">
    <div class="container">
        <div class="section-title text-center">
        <?php
            $prod = new ProductModel;
            $gr = "Trenutno nema artikala u ovoj grupi.";
            foreach ($prod->view() as $it) :
                $gr = $it['gp'];
            endforeach;
        ?>
            <h3 style="margin-top: 100px;"><?php echo $gr; ?></h3>
            <?php if($gr == "Trenutno nema artikala u ovoj grupi.") { ?>
                <p>Trenutno <strong>nemamo artikala!</strong> Kontaktirajte nas <br> ili proverite ponovo ...</p>
            <?php } else {  ?>
                <p>Pogledajte detalje <strong>za izabrani artikal!</strong><br> Tražite više informacija...</p>
            <?php } ?>
        </div><!-- end title -->

        <div class="row">
        <?php
            $product = new ProductModel;
            foreach ($product->view() as $item) :
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
                    <a class="pricingTable-signup hvr-bounce-to-right link" data-id="<?php echo $item['prod_id']; ?>" href="<?php echo ROOT_PATH; ?>products/info" data-no="1">Više ...</a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div><!-- end container -->
</div><!-- end section -->