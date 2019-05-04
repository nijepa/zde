<div id="news" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h3 style=" margin-top: 120px;">Vesti / Akcije</h3>
            <p class="lead">Sve vesti iz ZDE,<br> akcije iz naše ponude..</p>
        </div><!-- end title -->

        <div class="row">
            <?php
            $new = new NewModel;
            foreach ($new->Index() as $item) :
                ?>
                <div class="col-md-4 col-sm-6">
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
                </div>
            <?php endforeach; ?>
        </div>
    </div><!-- end container -->
</div><!-- end section -->