<div class="container" >
    <div style="margin-top: 150px; text-align: left" class="col col-xs-8">
        <div class="text-lg-center">
            <i class="fa fa-info fa-5x" style="margin-bottom: 10px;"></i>
            <h1 class="text-dark text-uppercase">Izmeni profil</h1>
        </div>
        <?php foreach ($viewmodel as $item) : ?>
            <form style="margin-bottom: 60px;" enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <input style="display: none" type="text" name="profile_id" class="form-control" value="<?php echo $item['profile_id']; ?>">
                <div class="form-group">
                    <label>Naziv</label>
                    <input type="text" name="profile_name" class="form-control" value="<?php echo $item['profile_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Podnaziv</label>
                    <input type="text" name="profile_subname" class="form-control" value="<?php echo $item['profile_subname']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Opis</label>
                    <textarea type="text" name="profile_description" class="form-control" required><?php echo $item['profile_description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Adresa</label>
                    <input type="text" name="profile_address" class="form-control" value="<?php echo $item['profile_address']; ?>" required>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" name="profile_email" class="form-control" value="<?php echo $item['profile_email']; ?>" required>
                </div>
                <div class="form-group">
                    <label>E-mail 2</label>
                    <input type="text" name="profile_email2" class="form-control" value="<?php echo $item['profile_email2']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Telefon</label>
                    <input type="text" name="profile_phone" class="form-control" value="<?php echo $item['profile_phone']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Mobilni</label>
                    <input type="text" name="profile_mob" class="form-control" value="<?php echo $item['profile_mob']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Radno vreme</label>
                    <input type="text" name="profile_working" class="form-control" value="<?php echo $item['profile_working']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Slika</label>
                    <input type="text" name="profile_img" id="group_img" class="form-control"  style="display:none " value="<?php echo $item['profile_img']; ?>">
                    <img src='<?php echo LOGOS_PATH; ?><?php echo $item['profile_img']; ?>' id="blah" class="img-responsive" style="width: 50px;">
                </div>
                <div class="form-group">
                    <b id = "select_file" class="span3" style="font-weight: bold; cursor: pointer; ">Izaberi sliku</b>
                    <input type="file" name="edit_age" id="edit_age"  style="display:none ">
                </div>
                <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Zapamti">
                <a type="text" href="<?php echo ROOT_PATH; ?>shared" class="btn btn-danger">Odustani</a>
            </form>
        <?php endforeach; ?>
    </div>
</div>