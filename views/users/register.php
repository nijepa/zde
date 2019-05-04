<div class="container">
    <div class="row">
        <div style="margin-top: 150px; text-align: left" class="col col-xl-4">
            <div class="text-lg-center">
                <i class="fa fa-users fa-5x" style="margin-bottom: 10px;"></i>
                <h1 class="text-dark text-uppercase">Registrovanje korinika</h1>
            </div>
            <form style="margin-bottom: 60px;" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="uname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Registruj korisnika">
                <a class="btn btn-danger" href="<?php echo ROOT_URL; ?>users">Odustani</a>
            </form>
        </div>
    </div>
</div>