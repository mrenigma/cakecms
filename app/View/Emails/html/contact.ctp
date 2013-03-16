<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo __('Contact'); ?></title>
<style>
a:link {
color:#046380;
text-decoration:underline;
}
</style>
</head>
<body>
<table align="center" width="600" style="border: #666666 1px solid;" cellpadding="0" cellspacing="0">
  <tr>
    <td><TABLE width="510" border="0" cellpadding="0" cellspacing="0" align="center">
        <TR>
          <TD>
          	<p style="font-family: arial,  helvetica, sans-serif;font-size: 25px;color: #666666;"><br>
            	<?php echo __('Contact'); ?>
            </p>
            <span style="font-family: arial,  helvetica, sans-serif;font-size: 15px;color: #666666;"><?php echo __('Name'); ?>: </span> <?php echo $name; ?>
            <br /> 
            <span style="font-family: arial,  helvetica, sans-serif;font-size: 15px;color: #666666;"><?php echo __('E-mail'); ?>: </span> <?php echo $email; ?>
            <br />
            <span style="font-family: arial,  helvetica, sans-serif;font-size: 15px;color: #666666;"><?php echo __('Telephone'); ?>: </span> <?php echo $phone; ?>
            <br />
            <p>
            	<?php echo $message; ?>
            </p>
           </TD> 
        </TR>
      </TABLE>
</table>
</body>
</html>
