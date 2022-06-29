<div class="container">
    <?= session()->getFlashdata('error') ?>
    <?php if (service('validation')->listErrors()):?>
    <div class="alert alert-danger">
        <?= service('validation')->listErrors() ?>
    </div>
    <?php endif;?>
    <?php if (session()->getFlashdata('success')):?>
    <div class="alert alert-primary">
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif;?>
    <form method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="card mb">
            <div class="card-header">
                My Profile
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>UID</label>
                            <input type="text" class="form-control" value="<?= $user['user_id'] ?>" readonly />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Name</label>
                            <input type="text" class="form-control" value="<?= $user['name'] ?>" readonly />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Email Id</label>
                            <input name="email_id" placeholder="Email Id" type="text" class="form-control" value="<?= $user['email_id'] ?>" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Mobile No</label>
                            <input name="mobile_no" placeholder="Mobile No" type="text" class="form-control" value="<?= $user['mobile_no'] ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>H No. / Street Name</label>
                            <input name="add_1" placeholder="H No. / Street Name" type="text" class="form-control" value="<?= $user['add_1'] ?>" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>City / Village</label>
                            <input name="add_2" placeholder="City / Village" type="text" class="form-control" value="<?= $user['add_2'] ?>" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>State / Country</label>
                            <input name="add_3" placeholder="State / Country" type="text" class="form-control" value="<?= $user['add_3'] ?>" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Pin</label>
                            <input name="add_4" placeholder="Pin" type="text" class="form-control" value="<?= $user['add_4'] ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb">
            <div class="card-header">
                Education
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group mb">
                            <label>Highest Qualification</label>
                            <select class="form-select" name="highest_qualification">
                                <option value="0">Select</option>
                                <?php

                                foreach(QUALIFICATION as $k => $v)
                                {
                                  ?>
                                    <option value="<?= $k ?>" <?=($user['highest_qualification'] == $k) ? "selected" : "" ?>><?= $v ?></option>

                                  <?php
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb">
                            <label>Subject</label>
                            <select class="form-select" name="subject">
                                <option value="0">Select</option>
                                <?php
                                    foreach(SUBJECT as $k => $v)
                                    {
                                      ?>
                                <option value="<?= $k ?>" <?=($user['subject'] == $k) ? "selected" : "" ?>><?= $v ?></option>
                                <?php
                                    }

                                    ?>
                                <option value="-1" <?=($user['subject']=="-1") ? "selected" : "" ?>>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb">
                            <label>Passout Year</label>
                            <select class="form-select" name="passout_year">
                                <option value="0">Select</option>
                                <?php
                                    foreach(_YEAR_ as $k => $v)
                                    {
                                      ?>
                                <option value="<?= $k ?>" <?=($user['passout_year'] == $k) ? "selected" : "" ?>><?= $v ?></option>
                                <?php
                                    }

                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Institute</label>
                            <select class="form-select mb" name="institute" onchange="instituteToggle(this.value)">
                                <option value="0">Select</option>
                                <?php
                                    foreach ($instituteList as $institute) {
                                        ?>
                                <option <?=($user['institute']==$institute['id']) ? "selected" : "" ?> value="<?= $institute['id'] ?>">
                                    <?= $institute['title'] ?>
                                </option>
                                <?php
                                    }


                                    ?>
                                <option value="-1" <?=($user['institute']=="-1") ? "selected" : "" ?>>Other</option>
                            </select>
                            <input name="institute_other" placeholder="Institute" type="<?= ($user['institute'] == "-1")?"text":"hidden" ?>" class="form-control mb"
                                value="<?= $user['institute_other'] ?>" id="instituteOther"/>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>University</label>
                            <select class="form-select mb" name="university" onchange="universityToggle(this.value)">
                                <option value="0">Select</option>
                                <?php
                                    foreach ($universityList as $university) {
                                        ?>
                                <option <?=($user['university']==$university['id']) ? "selected" : "" ?> value="<?= $university['id'] ?>">
                                    <?= $university['title'] ?>
                                </option>
                                <?php
                                    }


                                    ?>
                                <option value="-1" <?=($user['university']=="-1") ? "selected" : "" ?>>Other</option>
                            </select>
                            <input name="university_other" placeholder="University" type="<?= ($user['university'] == "-1")?"text":"hidden" ?>" class="form-control mb"
                                value="<?= $user['university_other'] ?>" id="universityOther"/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb">
                            <label>Degree</label>
                            <select class="form-select" name="fellowship">
                                <option value="0">Select</option>
                                <?php
                                    foreach(DEGREE as $k => $v)
                                    {
                                      ?>
                                <option value="<?= $k ?>" <?=($user['degree'] == $k) ? "selected" : "" ?>><?= $v ?></option>
                                <?php
                                    }

                                    ?>
                                <option value="-1" <?=($user['degree']=="-1") ? "selected" : "" ?>>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb">
                            <label>Fellowship</label>
                            <select class="form-select" name="fellowship">
                                <option value="0">Select</option>
                                <?php

                                foreach(FELLOWSHIP as $k => $v)
                                {
                                  ?>
                                    <option value="<?= $k ?>" <?=($user['fellowship'] == $k) ? "selected" : "" ?>><?= $v ?></option>

                                  <?php
                                }

                                ?>
                                <option value="-1" <?=($user['fellowship']=="-1") ? "selected" : "" ?>>Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>City</label>
                            <input value="<?= $user['e_city'] ?>" name="e_city" type="text" class="form-control" placeholder="City">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>State</label>
                            <select class="form-select" name="e_state">
                                <option value="0">Select</option>
                                <?php
                                    foreach ($stateList as $state) {
                                        ?>
                                <option <?=($user['e_state']==$state['id']) ? "selected" : "" ?> value="
                                    <?= $state['id'] ?>">
                                    <?= $state['title'] ?>
                                </option>
                                <?php
                                    }


                                    ?>
                                    <option <?=($user['e_state']=="-1") ? "selected" : "" ?> value="-1">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Country</label>
                            <select class="form-select" name="e_country">
                                <option value="0">Select</option>
                                <?php
                                    foreach ($countryList as $country) {
                                        ?>
                                <option <?=($user['e_country']==$country['id']) ? "selected" : "" ?> value="<?= $country['id'] ?>"><?= $country['nicename'] ?>
                                </option>
                                <?php
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Pin</label>
                            <input value="<?= $user['e_pin'] ?>" name="e_pin" type="text" class="form-control" placeholder="Pin">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb">
            <div class="card-header">
                Employment
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Employement Status</label>
                            <select class="form-select" name="employment_status">
                                <option value="0">Select</option>
                                <?php

                                foreach(EMPLOYMENT_STATUS as $k => $v)
                                {
                                ?>

                                <option value="<?= $k ?>" <?=($user['employment_status']==$k) ? "selected" : "" ?> ><?= $v ?></option>

                                <?php
                                }

                                ?>
                                <option value="-1" <?=($user['employment_status']=="-1") ? "selected" : "" ?> >Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Job started</label>
                            <input type="date" class="form-control" name="job_started" value="<?= $user["job_started"] ?>"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Department</label>
                            <select class="form-select" name="department">
                                <option value="0">Select</option>
                                <option value="1" <?=($user['department']=="1") ? "selected" : "" ?> >Administration</option>
                                <option value="2" <?=($user['department']=="2") ? "selected" : "" ?> >Marketing</option>
                                <option value="3" <?=($user['department']=="3") ? "selected" : "" ?> >Finance</option>
                                <option value="4" <?=($user['department']=="4") ? "selected" : "" ?> >Teaching</option>
                                <option value="5" <?=($user['department']=="5") ? "selected" : "" ?> >Research</option>
                                <option value="-1" <?=($user['department']=="-1") ? "selected" : "" ?> >Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Designation</label>
                            <input type="text" placeholder="Designation" class="form-control" name="designation" value="<?= $user["designation"] ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Company / Organization</label>
                            <input name="company_name" value="<?= $user['company_name'] ?>" type="text" class="form-control"
                                placeholder="Company / Organization">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Address</label>
                            <input value="<?= $user['c_address'] ?>" name="c_address" type="text" class="form-control"
                                placeholder="Address">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>City</label>
                            <input value="<?= $user['c_city'] ?>" name="c_city" type="text" class="form-control" placeholder="City">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>State</label>
                            <select class="form-select" name="c_state">
                                <option value="0">Select</option>
                                <?php
                                    foreach ($stateList as $state) {
                                        ?>
                                <option <?=($user['c_state']==$state['id']) ? "selected" : "" ?> value="
                                    <?= $state['id'] ?>">
                                    <?= $state['title'] ?>
                                </option>
                                <?php
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Official email id</label>
                            <input name="c_email_id" value="<?= $user['c_email_id'] ?>" type="text" class="form-control"
                                placeholder="Official email id">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb">
                            <label>Mobile No. ( With country code )</label>
                            <input value="<?= $user['c_mobile_no'] ?>" name="c_mobile_no" type="text" class="form-control"
                                placeholder="Mobile No.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb">
                            <label>Brief detail ( Maximum 1000 characters )</label>
                            <textarea name="brief_details" class="form-control" rows="3"
                                placeholder="Brief detail"><?= $user['brief_details'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb">
        <div class="card-body">

          <div class="row">

            <div class="col-md-3">
              <div class="form-group mb">
                  <img src="<?= $user["profile_image"] ?>" width="100" height="100" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb">
                  <label>Upload your latest photograph</label>
                  <input class="form-control" type="file" name="profile_image" accept="image/jpeg"/>
              </div>
            </div>

          </div>
</div>
        </div>


        <input type="submit" name="submit" value="Update" class="btn btn-primary" />
    </form>
</div>

<script type="text/javascript">

function instituteToggle(i)
{
  if(i == -1)
  {
    document.getElementById("instituteOther").type = "text";
  }
  else
  {
    document.getElementById("instituteOther").type = "hidden";
  }
}

function universityToggle(i)
{
  if(i == -1)
  {
    document.getElementById("universityOther").type = "text";
  }
  else
  {
    document.getElementById("universityOther").type = "hidden";
  }
}

</script>
