<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <form name='frmSearch' action="" method="post" style="margin-top: 150px;">
                <div class="text-lg-center">
                    <i class="fa fa-users fa-5x" style="margin-bottom: 10px;"></i>
                    <h3 class="text-uppercase">Korisnici</h3>
                    <br />
                    <h3>Pregled, dodavanje, izmena i brisanje korisnika</h3>
                    <br />
                </div>
                <?php if(isset($_SESSION['is_logged_in'])) : ?>
                    <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>users/register">Dodaj korisnika</a>
                <?php endif; ?>
                <br />
                <table id="group_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Korisničko ime</th>
                        <th>E-mail</th>
                        <th>Datum unosa</th>
                        <th colspan="2" style="text-align:center">Akcije</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($viewmodel as $item) : ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo $item['uname']; ?></td>
                            <td><?php echo $item['email']; ?></td>
                            <td><small><?php echo $item['register_date']; ?></small></td>
                            <td><a id="edit" class="btn btn-info edit" href="<?php echo ROOT_PATH; ?>users/edit" data-no="<?php echo $item['id']; ?>">Izmeni</button></a></td>
                            <td><a class="btn btn-danger" data-no="u" id="delete_product" data-id="<?php echo $item['id']; ?>" href="javascript:void(0)">Obriši</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>