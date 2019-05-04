<div class="container">
    <div class="row">
        <div style="margin-top: 150px; text-align: left" class="col col-xl-4">

            <div class="text-lg-center">
                <h1 class="text-dark text-uppercase">Logovanje u admin deo</h1>
            </div>
            <form style="margin-bottom: 60px;" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Uloguj se">
                <a class="btn btn-danger" href="<?php echo ROOT_URL; ?>">Odustani</a>
            </form>
        </div>
    </div>
</div>