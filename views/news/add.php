<div class="container" >
    <div style="margin-top: 150px; text-align: left" class="col col-xs-8" >
        <div class="text-lg-center">
            <i class="fa fa-star fa-5x" style="margin-bottom: 10px;"></i>
            <h1 class="text-dark text-uppercase">Dodaj novu vest / akciju</h1>
        </div>
        <br />
        <form style="margin-bottom: 60px;" enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <div class="custom-control custom-checkbox mr-sm-4">
                    <input value="1" name="featured" style="cursor: pointer" type="checkbox" class="custom-control-input" id="customControlAutosizing">
                    <label style="cursor: pointer" class="custom-control-label" for="customControlAutosizing">Aktuelno</label>
                </div>
            </div>
            <div class="form-group">
                <label>Naslov</label>
                <input type="text" name="news_title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Opis</label>
                <textarea type="text" name="news_description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Slika</label>
                <input type="text" name="group_img" id="group_img" class="form-control"  style="display:none ">
                <img src="#" id="blah" src="#" class="img-responsive" style="width: 50px;">
            </div>
            <div class="form-group">
                <b id = "select_file" class="span3" style="font-weight: bold; cursor: pointer; ">Izaberi sliku</b>
                <input type="file" name="edit_age" id="edit_age"  style="display:none ">
            </div>
            <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Zapamti">
            <a type="text" href="<?php echo ROOT_PATH; ?>news" class="btn btn-danger">Odustani</a>
        </form>
    </div>
</div>