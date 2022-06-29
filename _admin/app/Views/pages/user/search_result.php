<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <style type="text/css">
    body {
      font-family: 'Poppins', sans-serif;
    }

    table,
    th,
    td {
      padding: 5px;
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>

</head>

<body>
<div style="height: 11.69in; width: 8.27in; margin: 0px auto;">

  <?php

    $i = 1;

    foreach($userList as $user)
    {
      ?>
  <table style="margin-bottom:10px;width:100%">
    <tr>
      <td rowspan="4">
        <?= $i++ ?>
      </td>
      <td><strong>UID :</strong>
        <?= $user["user_id"] ?>
      </td>
      <td><strong>Passout :</strong>
        <?= $user['passout_year'] ?>
      </td>
      <td><strong>Designation :</strong>
        <?= $user['designation'] ?>
      </td>
      <td rowspan="3"><strong>Contact</strong></td>
    </tr>
    <tr>
      <td><strong>Name :</strong>
        <?= $user["name"] ?>
      </td>
      <td rowspan="2"><strong>Award : </strong></td>
      <td rowspan="2"><strong>Company :</strong>
        <?= $user["company_name"] ?>
      </td>
    </tr>
    <tr>
      <td><strong>College :</strong></td>
    </tr>
    <tr>
      <td colspan="4"><strong>Brief Details : </strong></td>
    </tr>
  </table>
  <?php
    }

    ?>
</div>

</body>

</html>
