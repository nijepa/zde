<div id="product" class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <div class="row" style="margin-top: 150px;">
        <?php
            $service = new ServiceModel;
            foreach ($service->info() as $item) :
        ?>
                <div class="col-md-4 col-sm-4">
                    <img style="width: 300px;" src="<?php echo IMG_PATH; ?><?php echo $item['service_img']; ?>">
                </div>
                <div class="col-md-8 col-sm-8">
                    <!--<div class="pricingTable">-->
                        <h1 style="font-size: 200%; "><?php echo $item['service_name']; ?></h1>
                        <ul>
                            <li style="text-align: left; ">
                        <?php 
                            $opis = explode('-',$item['service_description']); 
                            $i = 0;
                            foreach ($opis as $value) :
                                if($i > 0) :
                        ?>
                                <br />- <?php echo $opis[$i];  ?>
                        <?php 
                                endif;
                            $i++;
                            endforeach; 
                        ?>
                            </li>
                        </ul>
                </div>
        <?php endforeach; ?>
        </div>
    </div><!-- end container -->
</div><!-- end section -->