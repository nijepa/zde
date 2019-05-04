<div class="container" >
    <div style="margin-top: 150px; text-align: left" class="col col-xs-8">
        <div class="text-lg-center">
            <i class="fa fa-users fa-5x" style="margin-bottom: 10px;"></i>
            <h1 class="text-dark text-uppercase">Izmeni korisnika</h1>
        </div>
        <?php foreach ($viewmodel as $item) : ?>
        <form style="margin-bottom: 60px;" enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input style="display: none" type="text" name="id" class="form-control" value="<?php echo $item['id']; ?>">
            <div class="form-group">
                <label>Korisničko ime</label>
                <input type="text" name="uname" class="form-control" value="<?php echo $item['uname']; ?>" required>
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="email" class="form-control" value="<?php echo $item['email']; ?>" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $item['password']; ?>" required>
            </div>
            <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Zapamti">
            <a type="text" href="<?php echo ROOT_PATH; ?>users" class="btn btn-danger">Odustani</a>
        </form>
        <?php endforeach; ?>
    </div>
</div>