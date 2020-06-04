<?php
	include ("dbconn.php");
	
	$id = $_GET["id"];
	
	$sql = "SELECT Status as num FROM penjualan WHERE id_penjualan = '$id'";
	$var = mysqli_query($conn, $sql);
	$result = mysqli_fetch_assoc($var);
	$here = $result['num'];
	switch ($here) {
		case 0 :
				$val = 1;
				mysqli_query($conn, "UPDATE penjualan SET Status='$val' WHERE id_penjualan ='$id'");
    			echo "
	            <script>
	            alert('Data berhasil di Update!');
	            document.location.href= 'adm-template.php?content=adm-data-penjualan.php';
	            </script>";
			break;
		case 1 :
				$val = 2;
				mysqli_query($conn, "UPDATE penjualan SET Status='$val' WHERE id_penjualan ='$id'");
    			echo "
	            <script>
	            alert('Data berhasil di Update!');
	            document.location.href= 'adm-template.php?content=adm-data-penjualan.php';
	            </script>";
			break;
		case 2 :
				header("location:adm-template.php?content=adm-data-penjualan.php");
			break;
		default:
			break;
	}

?>