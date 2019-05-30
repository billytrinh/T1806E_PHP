<?php
session_start();
?>
<?php if(isset($_SESSION["current_user"])){ ?>
    <h1>USER: <?php echo $_SESSION["current_user"]["username"];?></h1>
<?php } ?>
<h1>Cookie Password:<?php echo $_COOKIE["user_password"];?></h1>
