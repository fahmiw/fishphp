    <?php 
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        include 'dbconn.php';
        
        for($i=1; $i <= count($_SESSION['cart']); $i++){
            if($_SESSION['cart'][$i] == null){
                
            }
            else{
                
                $id = $_SESSION['cart'][$i]['id'];
                $quantity = $_SESSION['cart'][$i]['quantity'];
             //   $harga = $_SESSION['cart'][$i]['harga'];
                $sql = "SELECT * FROM barang where kode = '$id'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc())
                {
                    $stok_update = $row['stok'] - $quantity;
                    
                }
                $sql = "UPDATE barang SET stok = '$stok_update' WHERE kode = '$id'";
                $conn->query($sql);

            }
        }
        echo "
            <script>
            alert('Pesanan telah dibuat!');
            document.location.href= 'template.php?content=shop.php';
            </script>";
    ?>