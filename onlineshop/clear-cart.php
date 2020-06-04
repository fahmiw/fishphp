<?php
session_start();

unset($_SESSION['cart']);

header("location:template.php?content=cart.php");
?>
