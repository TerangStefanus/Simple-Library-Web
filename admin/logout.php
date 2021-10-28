<?php
session_start();
session_destroy();
header("location:../pages/landing_page.php");
?>