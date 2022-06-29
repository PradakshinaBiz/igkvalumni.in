<section id="container">

  <div class="container">

    <div class="row">

      <div class="col-md-6">
        <div style="padding-top:100px;">
<h3 class="mb-4">Contact Us</h3>

<h5>Dean, Faculty of Agriculture</h5>
<h6>Indira Gandhi Krishi Vishwavidyalaya</h6>
<p>Krishak Nagar, Raipur</br>Chhattisgarh, Pin - 492012</p>
<p>Phone : 077124 42537</p>
<p>E Mail : contact@deancoaryp.in</p>
</div>
      </div>
      <div class="col-md-6">

        <div style="padding-top:100px;">
          <h3 class="mb-4">Write Us</h3>
        <?= session()->getFlashdata('error') ?>


        <?php if(service('validation')->listErrors()):?>
          <div class="alert alert-danger">
              <?= service('validation')->listErrors() ?>
          </div>
        <?php endif;?>

        <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
        <?php endif;?>
        <form  method="post" action="<?= base_url("contact") ?>">
            <?= csrf_field() ?>
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name" />
            </div>
            <div class="input-group mb-3">
                <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No" />
            </div>
            <div class="input-group mb-3">
                <input type="text" name="email_id" class="form-control" placeholder="Email Id" />
            </div>
            <div class="input-group mb-3">
                <textarea class="form-control" name="message" placeholder="Message"></textarea>
            </div>
            <div class="input-group">
                <input type="submit" class="form-control btn btn-primary" value="Send" />
            </div>
        </form>
      </div>
</div>
    </div>

  </div>

</section>
