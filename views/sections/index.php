<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <form name='frmSearch' action="" method="post" style="margin-top: 150px;">
                <div class="text-lg-center">
                    <i class="fa fa-list fa-5x" style="margin-bottom: 10px;"></i>
                    <h3 class="text-uppercase">Delovi sajta</h3>
                    <br />
                    <h3>Prikazivanje ili skrivanje delova sajta</h3>
                    <br />
                </div>
   
                <br />
                <table id="group_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Prikazano</th>
                        <th>Naziv dela sajta</th>
                        <th>Datum unosa</th>
                        <th>Akcije</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($viewmodel as $item) : ?>
                        <tr>
                            <td><?php echo $item['section_id']; ?></td>
                            <?php if($item['enabled'] == 0) { ?>
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
                            <td><?php echo $item['section_name']; ?></td>
                            <td><small><?php echo $item['section_date']; ?></small></td>
                            <td><a id="edit" class="btn btn-info edit" href="<?php echo ROOT_PATH; ?>sections/edit" data-no="<?php echo $item['section_id']; ?>">Izmeni</button></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>