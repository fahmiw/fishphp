<?php
    session_start();
    
    $i = $_GET['i'];
    $_SESSION['cart'][$i] = null;
    echo "
            <script>
            alert('Item dihapus!');
            document.location.href= 'template.php?content=cart.php';
            </script>";
?>