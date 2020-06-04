<?php
    session_start();
    $i = count($_SESSION['cart']) + 1;
    // $i = 1;
    $_SESSION['cart'][$i]['id'] = $_GET['id'];
    $_SESSION['cart'][$i]['quantity'] = $_POST['quantity'];

    header("location:template.php?content=cart.php");
?>