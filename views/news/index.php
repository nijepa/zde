<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <form name='frmSearch' action="" method="post" style="margin-top: 150px;">
                <div class="text-lg-center">
                    <i class="fa fa-star fa-5x" style="margin-bottom: 10px;"></i>
                    <h3 class="text-uppercase">Vesti / Akcije</h3>
                    <br />
                    <h3>Pregled, dodavanje, izmena i brisanje vesti / akcija</h3>
                    <br />
                </div>
                <?php if(isset($_SESSION['is_logged_in'])) : ?>
                    <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>news/add">Dodaj vest / akciju</a>
                <?php endif; ?>
                <br />
                <table id="group_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vazece</th>
                        <th>Naslov</th>
                        <th>Opis</th>
                        <th>Slika</th>
                        <th>Datum unosa</th>
                        <th colspan="2" style="text-align:center">Akcije</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($viewmodel as $item) : ?>
                        <tr>
                            <td><?php echo $item['news_id']; ?></td>
                            <?php if($item['featured'] == 0) { ?>
                                <td>
                                    <div class="custom-control custom-checkbox mr-sm-4">
                                        <input value="1" name="featured" type="checkbox" class="custom-control-input" id="customControlAutosizing" disabled>
                                        <label class="custom-control-label" for="customControlAutosizing"></label>
                                    </div>
                                </td>
                            <?php } else { ?>
                                <td>
                                    <div class="custom-control custom-checkbox mr-sm-4">
                                        <input value="1" name="featured" type="checkbox" class="custom-control-input" id="customControlAutosizing" checked disabled>
                                        <label class="custom-control-label" for="customControlAutosizing"></label>
                                    </div>
                                </td>
                            <?php } ?>
                            <!--<td><?php //echo $item['featured']; ?></td>-->
                            <td><?php echo $item['news_title']; ?></td>
                            <td><?php echo $item['news_description']; ?></td>
                            <td><img src="<?php echo IMG_PATH; ?><?php echo $item['news_img']; ?>" class="img-responsive" style="width: 50px;" </td>
                            <td><small><?php echo $item['news_date']; ?></small></td>
                            <td><a id="edit" class="btn btn-info edit" href="<?php echo ROOT_PATH; ?>news/edit" data-no="<?php echo $item['news_id']; ?>">Izmeni</button></a></td>
                            <td><a class="btn btn-danger" data-no="n" id="delete_product" data-id="<?php echo $item['news_id']; ?>" href="javascript:void(0)"> Obriši</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>