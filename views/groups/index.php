<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <form name='frmSearch' action="" method="post" style="margin-top: 150px;">
                <div class="text-lg-center">
                    <i class="fa fa-sitemap fa-5x" style="margin-bottom: 10px;"></i>
            <h3 class="text-uppercase">Grupe</h3>
                <br />
            <h3>Pregled, dodavanje, izmena i brisanje grupa</h3>
                <br />
                </div>
        <?php if(isset($_SESSION['is_logged_in'])) : ?>
            <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>groups/add">Dodaj grupu </a>
        <?php endif; ?>
                <br />
                <table id="dtBasicExample" class="table table-striped table-bordered table-hover table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naziv</th>
                            <th>Opis</th>
                            <th>Slika</th>
                            <th>Datum unosa</th>
                            <th colspan="2" style="text-align:center">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php foreach ($viewmodel as $item) : ?>
                        <tr>
                            <td><?php echo $item['group_id']; ?></td>
                            <td><?php echo $item['group_title']; ?></td>
                            <td><?php echo $item['group_description']; ?></td>
                            <td><img src="<?php echo IMG_PATH; ?><?php echo $item['group_img']; ?>" class="img-responsive" style="width: 50px;" </td>
                            <td><small><?php echo $item['group_date']; ?></small></td>
                            <td><a class="btn btn-info edit" href="<?php echo ROOT_PATH; ?>groups/edit" data-no="<?php echo $item['group_id']; ?>">Izmeni</button></a></td>
                            <td><a class="btn btn-danger" data-no="g" id="delete_product" data-id="<?php echo $item['group_id']; ?>" href="javascript:void(0)"> Obriši</a></td>
                        </tr>
        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>