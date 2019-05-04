<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <form name='frmSearch' action="" method="post" style="margin-top: 150px;">
                <div class="text-lg-center">
                    <i class="fa fa-industry fa-5x" style="margin-bottom: 10px;"></i>
                    <h3 class="text-uppercase">Proizvodjači</h3>
                    <br />
                    <h3>Pregled, dodavanje, izmena i brisanje proizvodjača</h3>
                    <br />
                </div>
                <?php if(isset($_SESSION['is_logged_in'])) : ?>
                    <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>manufacturers/add">Dodaj proizvodjača</a>
                <?php endif; ?>
                <br />
                <table id="group_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Slika</th>
                        <th>Datum unosa</th>
                        <th colspan="2" style="text-align:center">Akcije</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($viewmodel as $item) : ?>
                        <tr>
                            <td><?php echo $item['man_id']; ?></td>
                            <td><?php echo $item['man_name']; ?></td>
                            <td><img src="<?php echo IMG_PATH; ?><?php echo $item['man_img']; ?>" class="img-responsive" style="width: 50px;" </td>
                            <td><small><?php echo $item['man_date']; ?></small></td>
                            <td><a id="edit" class="btn btn-info edit" href="<?php echo ROOT_PATH; ?>manufacturers/edit" data-no="<?php echo $item['man_id']; ?>">Izmeni</button></a></td>
                            <td><a class="btn btn-danger" data-no="m" id="delete_product" data-id="<?php echo $item['man_id']; ?>" href="javascript:void(0)"> Obriši</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>