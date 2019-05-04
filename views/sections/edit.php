<div class="container" >
    <div style="margin-top: 150px; text-align: left" class="col col-xs-8">
        <div class="text-lg-center">
            <i class="fa fa-list fa-5x" style="margin-bottom: 10px;"></i>
            <h1 class="text-dark text-uppercase">Prikaži / sakrij delove sajta</h1>
        </div>
        <?php foreach ($viewmodel as $item) : ?>
            <form style="margin-bottom: 60px;" enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <input style="display: none" type="text" name="section_id" class="form-control" value="<?php echo $item['section_id']; ?>">
                <div class="form-group">
                    <div class="custom-control custom-checkbox mr-sm-4">
                        <?php if($item['enabled'] == 0) { ?>
                            <input value="1" name="featured" style="cursor: pointer" type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <?php } else { ?>
                            <input value="1" name="featured" style="cursor: pointer" type="checkbox" class="custom-control-input" id="customControlAutosizing" checked>
                        <?php } ?>
                        <label style="cursor: pointer" class="custom-control-label" for="customControlAutosizing">Prikazano</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Naziv dela sajta</label>
                    <input type="text" name="news_title" class="form-control" value="<?php echo $item['section_name']; ?>" disabled>
                </div>
                <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Zapamti">
                <a type="text" href="<?php echo ROOT_PATH; ?>sections" class="btn btn-danger">Odustani</a>
            </form>
        <?php endforeach; ?>
    </div>
</div>