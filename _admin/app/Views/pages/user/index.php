<div class="container">

  <div class="btn-group mb-4" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#send_mail_model">Send Mail</button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_password_model">Update Password</button>

  </div>


  <div class="modal fade" id="send_mail_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form  method="post">
            <?= csrf_field() ?>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send Mail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <textarea name="mail_content" id="mail_content" style="width:100%;height:200px;"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="send_mail()">Send</button>
        </div>
      </form>
      </div>
    </div>
  </div>


    <div class="modal fade" id="update_password_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form  method="post">
              <?= csrf_field() ?>
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <textarea name="mail_content" id="mail_content_1" style="width:100%;height:200px;"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="update_password()">Send</button>
          </div>
        </form>
        </div>
      </div>
    </div>

<div id="ajax_msg"></div>

  <table class="table table-striped">
    <thead>
      <tr class="table-dark">
        <td><input type="checkbox" id="check_all"/></td>
        <td>Sn</td>
        <td>User Id</td>
        <td>Name</td>

        <td>Email Id</td>
        <td>Mobile No</td>
        <td>Password</td>

        <td>Updated At</td>

        <td></td>
        <td></td>
      </tr>
    </thed>
  <?php

  $i = 1;

  foreach($userList as $user)
  {
    ?>
  <tr>
  <td><input type="checkbox" class="checkbox" name="checkbox_values" value="<?= $user["uuid"] ?>"/></td>
  <td align="right"><?= $i++ ?></td>
  <td><?= $user['user_id'] ?></td>
  <td><?= $user['name'] ?></td>
  <td><?= $user['email_id'] ?></td>
  <td><?= $user['mobile_no'] ?></td>
  <td><?= ($user['password'] != "" )?"Updated":"" ?></td>

  <td><?= ($user['updated_at'] != "")?date('d/m/Y',strtotime($user['updated_at'])):"" ?></td>

  <td><a href="<?= base_url("user/details/".$user["uuid"]) ?>"><i class="fa-solid fa-user"></i></a></td>
  <td><a href="<?= base_url("user/edit/".$user["uuid"]) ?>"><i class="fa-solid fa-pencil"></i></a></td>
  </tr>
    <?php
  }
  ?>
  </table>

</div>
<script type="text/javascript">
    $("#check_all").click(function(){



        var checkAll = $("#check_all").prop("checked");

        if(checkAll)
        {
            $(".checkbox").prop("checked",true);
        }
        else
        {
            $(".checkbox").prop("checked",false);
        }

    });

    $(".checkbox").click(function(){

        if($(".checkbox").length == $(".checkbox:checked").length)
        {
            $("#check_all").attr("checked","checked");
        }
        else
        {
            $("#check_all").removeAttr("checked");
        }
    });

</script>

<script type="text/javascript">

function send_mail()
{

  for (instance in CKEDITOR.instances)
  {
    CKEDITOR.instances[instance].updateElement();
  }

  var mail_content    = document.getElementById("mail_content").value;
  var user_id     = "";



        $('input:checkbox[name=checkbox_values]').each(function()
        {

            if($(this).is(':checked'))
            {
                if(user_id == "")
                {
                    user_id = $(this).val() ;
                }
                else
                {
                    user_id = user_id + ',' + $(this).val() ;
                }
            }
        });


        $.ajax({
                    type: "POST",
                    url: "<?php echo base_url("ajax/send_mail") ?>",
                    data: { user_id : user_id , mail_content : mail_content} ,
                    success:function(result){$("#ajax_msg").html(result);}
                });

}

function update_password()
{

  for (instance in CKEDITOR.instances)
  {
    CKEDITOR.instances[instance].updateElement();
  }

  var mail_content_1    = document.getElementById("mail_content_1").value;
  var user_id     = "";


        $('input:checkbox[name=checkbox_values]').each(function()
        {

            if($(this).is(':checked'))
            {
                if(user_id == "")
                {
                    user_id = $(this).val() ;
                }
                else
                {
                    user_id = user_id + ',' + $(this).val() ;
                }
            }
        });


        $.ajax({
                    type: "POST",
                    url: "<?php echo base_url("ajax/update_password") ?>",
                    data: { user_id : user_id , mail_content : mail_content_1} ,
                    success:function(result){$("#ajax_msg").html(result);}
                });

}

</script>
