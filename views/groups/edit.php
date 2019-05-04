<div class="container" >
    <div style="margin-top: 150px; text-align: left" class="col col-xs-8">
        <div class="text-lg-center">
            <i class="fa fa-sitemap fa-5x" style="margin-bottom: 10px;"></i>
            <h1 class="text-dark text-uppercase">Izmeni grupu</h1>
        </div>
        <?php foreach ($viewmodel as $item) : ?>
        <form style="margin-bottom: 60px;" enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input style="display: none" type="text" name="group_id" class="form-control" value="<?php echo $item['group_id']; ?>">
            <div class="form-group">
                <label>Naziv grupe</label>
                <input type="text" name="group_title" class="form-control" value="<?php echo $item['group_title']; ?>" required>
            </div>
            <div class="form-group">
                <label>Opis</label>
                <textarea type="text" name="group_description" class="form-control" required><?php echo $item['group_description']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Slika</label>
                <input type="text" name="group_img" id="group_img" class="form-control"  style="display:none " value="<?php echo $item['group_img']; ?>">
                <img src='<?php echo IMG_PATH; ?><?php echo $item['group_img']; ?>' id="blah" class="img-responsive" style="width: 50px;">
            </div>
            <div class="form-group">
                <b id = "select_file" class="span3" style="font-weight: bold; cursor: pointer; ">Izaberi sliku</b>
                <input type="file" name="edit_age" id="edit_age"  style="display:none ">
            </div>
            <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Zapamti">
            <a type="text" href="<?php echo ROOT_PATH; ?>groups" class="btn btn-danger">Odustani</a>
        </form>
        <?php endforeach; ?>
    </div>
</div>