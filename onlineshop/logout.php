<?php
echo "
	            <script>
	            alert('Logout berhasil!');
	            document.location.href='template.php?content=index.php';
	            </script>";
session_destroy();
header('URL:template.php?content=index.php');
?>