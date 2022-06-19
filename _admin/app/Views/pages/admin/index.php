<table>
<?php
foreach($userList as $user)
{
  ?>
<tr>
<td><?= $user['name'] ?></td>
<td><?= $user['email_id'] ?></td>
</tr>
  <?php
}
?>
</table>
