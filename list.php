<?php
session_start();
?>
<?php if(isset($_SESSION["user_email"])){ ?>
    <h1>USER: <?php echo $_SESSION["user_email"];?></h1>
<?php } ?>
<h1>Cookie Password:<?php echo $_COOKIE["user_password"];?></h1>
