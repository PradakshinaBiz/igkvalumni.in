<div style="padding:10px;">
    <div class="card mb-4">
        <form method='get' action="<?= base_url("user/search_result") ?>">
            <div class="card-header">Search</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group mb">
                            <label>Passout Year</label>
                            <select class="form-select" name="passout_year">
                                <option value="0">Select</option>
                                <?php
                                    for ($x = 2000; $x <= 2023; $x++) {
                                        ?>
                                <option value="<?= $x ?>" <?=($_GET['passout_year']==$x) ? "selected" : "" ?> >
                                    <?= $x ?>
                                </option>
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
                                <option <?=($_GET['institute']==$institute['id']) ? "selected" : "" ?> value="<?= $institute['id'] ?>"><?= $institute['title'] ?></option>
                                <?php
                                    }


                                    ?>
                                <option value="-1" <?=($_GET['institute']=="-1") ? "selected" : "" ?>>Other</option>
                            </select>
                            <input name="institute_other" placeholder="Institute" type="<?= ($user['institute'] == "-1")?"text":"hidden" ?>" class="form-control mb"
                                value="<?= $_GET['institute_other'] ?>" id="instituteOther"/>
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
                                <option <?=($_GET['university']==$university['id']) ? "selected" : "" ?> value="<?= $university['id'] ?>"><?= $university['title'] ?></option>
                                <?php
                                    }


                                    ?>
                                <option value="-1" <?=($_GET['university']=="-1") ? "selected" : "" ?>>Other</option>
                            </select>
                            <input name="university_other" placeholder="University" type="<?= ($user['university'] == "-1")?"text":"hidden" ?>" class="form-control mb"
                                value="<?= $user['university_other'] ?>" id="universityOther"/>
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
                                <option value="<?= $k ?>" <?=($_GET['fellowship'] == $k) ? "selected" : "" ?>><?= $v ?></option>
                                <?php
                                    }

                                    ?>
                                <option value="-1" <?=($_GET['fellowship']=="-1") ? "selected" : "" ?>>Other</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Search" />
            </div>
        </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr class="table-dark">
                <td>User Id</td>
                <td>Name</td>
                <td>Passout</td>
                <td>Institute</td>
                <td>University</td>
                <td>Job Started</td>
                <td>Designation</td>
                <td>Company</td>
                <td>Email Id</td>
                <td>Mobile No</td>
            </tr>
            </thed>
            <?php
                if(isset($_GET['page']))
                {
                  $i = (( $_GET['page'] - 1) * 50 ) + 1 ;
                }
                else {
                  $i = 1;
                }



                foreach($userList as $user)
                {
                  ?>
            <tr>
                <td><?= $user['user_id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['passout_year'] ?></td>
                <td><?= $user['institute'] ?></td>
                <td><?= $user['university'] ?></td>
                <td><?= $user['job_started'] ?></td>
                <td><?= $user['designation'] ?></td>
                <td><?= $user['company_name'] ?></td>
                <td><?= $user['email_id'] ?></td>
                <td><?= $user['mobile_no'] ?></td>
            </tr>
            <?php
                }
                ?>
    </table>
</div>
