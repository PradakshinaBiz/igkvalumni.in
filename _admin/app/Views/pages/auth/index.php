<div class="container-fluid">
    <div class="card position-absolute top-50 start-50 translate-middle" style="min-width:350px;">
        <h5 class="card-header">Admin Login</h5>
        <div class="card-body">
            <?= session()->getFlashdata('error') ?>
            <?= service('validation')->listErrors() ?>
            <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif;?>
            <form  method="post" action="<?= base_url("login") ?>">
                <?= csrf_field() ?>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="email" name="email_id" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i>
                    </span>
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                    <input type="submit" class="form-control btn btn-primary" value="Login" />
                </div>
            </form>
        </div>
    </div>
</div>
