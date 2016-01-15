<?php
$onlineTotal = $database->query("SELECT COUNT(*) FROM dl_online LIMIT 1;");
$onlineGuest = $database->query("SELECT COUNT(*) FROM dl_online WHERE user_id=0 LIMIT 1;");
$onlineUser = $onlineTotal - $onlineGuest;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <?php if($config['user']): ?>
  <tr>
    <td width="80" style="padding-left:10px;"><strong><?php echo _ONLINE_USER; ?></strong></td>
    <td width="50" align="right"><?php echo number_format($onlineUser)._ONLINE_UNIT; ?></td>
    <td>&nbsp;</td>
  </tr>
  <?php endif; if($config['guest']): ?>
  <tr>
    <td style="padding-left:10px;"><strong><?php echo _ONLINE_GUEST; ?></strong></td>
    <td align="right"><?php echo number_format($onlineGuest)._ONLINE_UNIT; ?></td>
    <td>&nbsp;</td>
  </tr>
  <?php endif; if($config['total']): ?>
  <tr>
    <td style="padding-left:10px;"><strong><?php echo _ONLINE_TOTAL; ?></strong></td>
    <td align="right"><?php echo number_format($onlineTotal)._ONLINE_UNIT; ?></td>
    <td>&nbsp;</td>
  </tr>
  <?php endif; if($config['name']): ?>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><strong><?php echo _ONLINE_NAME; ?></strong>
    <?php 
	if($onlineUser!=0) {
		foreach($database->query("SELECT * FROM dl_online WHERE user_id!=0") as $user) {
			echo $user['user_id'].', ';
		}
	} else {
		echo _ONLINE_NONE;
	}
	?>
    </td>
  </tr>
  <?php endif; ?>
</table>


