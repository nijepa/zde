<div class="container" >
    <div style="margin-top: 150px; text-align: left" class="col col-xs-8">
        <div class="text-lg-center">
            <i class="fa fa-industry fa-5x" style="margin-bottom: 10px;"></i>
            <h1 class="text-dark text-uppercase">Izmeni proizvođača</h1>
        </div>
        <?php foreach ($viewmodel as $item) : ?>
        <form style="margin-bottom: 60px;" enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input style="display: none" type="text" name="man_id" class="form-control" value="<?php echo $item['man_id']; ?>">
            <div class="form-group">
                <label>Naziv grupe</label>
                <input type="text" name="man_name" class="form-control" value="<?php echo $item['man_name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Slika</label>
                <input type="text" name="group_img" id="group_img" class="form-control"  style="display:none " value="<?php echo $item['man_img']; ?>">
                <img src='<?php echo IMG_PATH; ?><?php echo $item['man_img']; ?>' id="blah" class="img-responsive" style="width: 50px;">
            </div>
            <div class="form-group">
                <b id = "select_file" class="span3" style="font-weight: bold; cursor: pointer; ">Izaberi sliku</b>
                <input type="file" name="edit_age" id="edit_age"  style="display:none ">
            </div>
            <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Zapamti">
            <a type="text" href="<?php echo ROOT_PATH; ?>manufacturers" class="btn btn-danger">Odustani</a>
        </form>
        <?php endforeach; ?>
    </div>
</div>