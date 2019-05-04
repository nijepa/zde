<?php
    $counts = new SharedModel;
    $c = $counts->Index();
?>
<div class="container" style="margin-top: 200px; margin-bottom: 100px;">
    <div class="download-icons">
        <div class="box-icon">
            <div class="btn-buy apple-button" style="margin-right: 30px; width: 250px">
                <a class="da-link hvr-bounce-to-right cd-hero__btn" href="<?php echo ROOT_URL; ?>news"><i class="fa fa-star fa-5x"></i> Ukupno : <?php echo $c[3]; ?> <strong>Vesti</strong></a>
            </div>
            <div class="btn-buy apple-button" style="margin-right: 30px; width: 250px">
                <a class="da-link hvr-bounce-to-right cd-hero__btn" href="<?php echo ROOT_URL; ?>services"><i class="fa fa-wrench"></i> Ukupno : <?php echo $c[5]; ?> <strong>Usluge</strong></a>
            </div>
            <div class="btn-buy apple-button" style="margin-right: 30px; width: 250px">
                <a class="da-link hvr-bounce-to-right cd-hero__btn" href="<?php echo ROOT_URL; ?>products"><i class="fa fa-desktop"></i> Ukupno : <?php echo $c[1]; ?> <strong>Artikli</strong></a>
            </div>
        </div>
    </div>
    <div class="download-icons" style="margin-top: 30px;">
        <div class="box-icon">
            <div class="btn-buy apple-button" style="margin-right: 30px; width: 250px">
                <a class="da-link hvr-bounce-to-right cd-hero__btn" href="<?php echo ROOT_URL; ?>groups"><i class="fa fa-sitemap"></i> Ukupno : <?php echo $c[0]; ?> <strong>Grupe</strong></a>
            </div>
            <div class="btn-buy apple-button" style="margin-right: 30px; width: 250px">
                <a class="da-link hvr-bounce-to-right cd-hero__btn" href="<?php echo ROOT_URL; ?>manufacturers"><i class="fa fa-industry"></i> Ukupno : <?php echo $c[2]; ?> <strong>Proizvodjači</strong></a>
            </div>
            <div class="btn-buy apple-button" style="margin-right: 30px; width: 250px">
                <a class="da-link hvr-bounce-to-right cd-hero__btn" href="<?php echo ROOT_URL; ?>users"><i class="fa fa-users"></i> Ukupno : <?php echo $c[4]; ?> <strong>Korisnici</strong></a>
            </div>
        </div>
    </div>
    <div class="download-icons" style="margin-top: 30px;">
        <div class="box-icon">
            <div class="btn-buy apple-button" style="margin-right: 30px; width: 250px">
                <a class="da-link hvr-bounce-to-right cd-hero__btn" href="<?php echo ROOT_URL; ?>sections"><i class="fa fa-list"></i> Delovi sajta <strong>Delovi sajta</strong></a>
            </div>
            <div class="btn-buy apple-button" style="margin-right: 30px; width: 250px">
                <a class="da-link hvr-bounce-to-right cd-hero__btn" href="<?php echo ROOT_URL; ?>profiles/edit"><i class="fa fa-info"></i> Profil <strong>Profil</strong></a>
            </div>
        </div>
    </div>
</div>