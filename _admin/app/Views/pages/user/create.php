<div class="container">
    <?= session()->getFlashdata('error') ?>
    <?= service('validation')->listErrors() ?>
    <form  method="post">
        <?= csrf_field() ?>
        <div class="form-group row mb-4">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" id="inputPassword" placeholder="" name="name">
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-sm-2 col-form-label">Email Id</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputPassword" placeholder="" name="email_id">
            </div>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" value="Create" class="btn btn-primary" />
        </div>
    </form>
</div>
