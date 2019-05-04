<div class="container" >
    <div style="margin-top: 150px; text-align: left" class="col col-xs-8">
        <div class="text-lg-center">
            <i class="fa fa-desktop fa-5x" style="margin-bottom: 10px;"></i>
            <h1 class="text-dark text-uppercase">Izmeni grupu</h1>
        </div>
        <?php foreach ($viewmodel as $item) : ?>
        <form style="margin-bottom: 60px;" enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <div class="custom-control custom-checkbox mr-sm-4">
                    <?php if($item['favorite'] == 0) { ?>
                    <input value="1" name="prod_fav" style="cursor: pointer" type="checkbox" class="custom-control-input" id="customControlAutosizing">
                    <?php } else { ?>
                    <input value="1" name="prod_fav" style="cursor: pointer" type="checkbox" class="custom-control-input" id="customControlAutosizing" checked>
                    <?php } ?>
                    <label style="cursor: pointer" class="custom-control-label" for="customControlAutosizing">Na akciji</label>
                </div>
            </div>
            <div class="form-group">
                <label>Naziv artikla</label>
                <input type="text" name="prod_name" class="form-control" value="<?php echo $item['prod_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="categories">Kategorija</label>
                <select class="form-control" name="prod_group" id="" required>

                    <?php
                    $product = new ProductModel;
                    foreach ($product->group() as $it) :
                        $cat_id = $it['group_id'];
                        $cat_title = $it['group_title'];
                        if ($cat_id == $item['sub_id']) {
                            echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
                        } else {
                            echo "<option value='{$cat_id}'>{$cat_title}</option>";
                        }
                    endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Opis</label>
                <textarea type="text" name="prod_description" class="form-control"><?php echo $item['prod_description']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Slika</label>
                <input type="text" name="group_img" id="group_img" class="form-control"  style="display:none ">
                <img src="<?php echo IMG_PATH; ?><?php echo $item['prod_img']; ?>" id="blah"  class="img-responsive" style="width: 50px;">
            </div>
            <div class="form-group">
                <b id = "select_file" class="span3" style="font-weight: bold; cursor: pointer; ">Izaberi sliku</b>
                <input type="file" name="edit_age" id="edit_age"  style="display:none ">
            </div>
            <div class="form-group">
                <label>Procesor</label>
                <input type="text" name="prod_processor" class="form-control" value="<?php echo $item['prod_processor']; ?>">
            </div>
            <div class="form-group">
                <label>Memorija</label>
                <input type="text" name="prod_memory" class="form-control" value="<?php echo $item['prod_memory']; ?>">
            </div>
            <div class="form-group">
                <label>HD</label>
                <input type="text" name="prod_hd" class="form-control" value="<?php echo $item['prod_hd']; ?>">
            </div>
            <div class="form-group">
                <label>Optika</label>
                <input type="text" name="prod_optic" class="form-control" value="<?php echo $item['prod_optic']; ?>">
            </div>
            <div class="form-group">
                <label>Grafika</label>
                <input type="text" name="prod_graphic" class="form-control" value="<?php echo $item['prod_graphic']; ?>">
            </div>
            <div class="form-group">
                <label>Baterija</label>
                <input type="text" name="prod_batery" class="form-control" value="<?php echo $item['prod_batery']; ?>">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox mr-sm-4">
                    <?php if($item['prod_camera'] == 0) { ?>
                        <input value="1" name="prod_camera" style="cursor: pointer" type="checkbox" class="custom-control-input" id="customControlAutosizing1">
                    <?php } else { ?>
                        <input value="1" name="prod_camera" style="cursor: pointer" type="checkbox" class="custom-control-input" id="customControlAutosizing1" checked>
                    <?php } ?>
                    <label style="cursor: pointer" class="custom-control-label" for="customControlAutosizing1">Kamera</label>
                </div>
            </div>
            <div class="form-group">
                <label>Cena</label>
                <input type="text" name="prod_price" class="form-control" value="<?php echo $item['prod_price']; ?>">
            </div>

            <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Zapamti">
            <a type="text" href="<?php echo ROOT_PATH; ?>products" class="btn btn-danger">Odustani</a>
        </form>
        <?php endforeach; ?>
    </div>
</div>