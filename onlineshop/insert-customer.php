<?php
    include('dbconn.php');
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM customer where username = '$user'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $id = $row['id_cus'];
            $total_harga = $_GET['tot'];
            $date = date('Y-m-d H:i:s');
            $status = 0;
            $sql2 = "INSERT INTO penjualan VALUES (NULL, '".$id."', '".$total_harga."', '".$date."', '".$status."');";
            $conn->query($sql2);
    }
    $sql1 = "SELECT * FROM penjualan where id_ctm = '$id'";
        $result2 = $conn->query($sql1);
        while($row2 = $result2->fetch_assoc()){
            $idp = $row2['id_penjualan'];
        }
    
    header("location:template.php?content=checkout.php&id=$idp");
?>