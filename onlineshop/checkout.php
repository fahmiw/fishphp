<?php
        include('dbconn.php');
        $id_pemesan = $_GET['id'];

        function rupiah($num){
        $result = "Rp. ".number_format($num,'0',',','.');
        return $result;
        }
        $sql = "SELECT * FROM penjualan where id_penjualan = '$id_pemesan'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){

    ?>
    <div class="main">
      <div class="shop_top">
         <div class="container">
            <center>
            <table>
                <th>
                    <h2>Informasi Pembeli</h2>
                </th>
                <tr>
                    <td>ID pesanan</td>
                    <td><?php echo $row["id_penjualan"]; $id=$row["id_penjualan"];?></td>
                </tr>
                <tr>
                <?php
                    $user = $_SESSION['username'];
                    $sql1 = "SELECT * FROM customer where username = '$user'";
                        $result1 = $conn->query($sql1);
                        while($row1 = $result1->fetch_assoc()){
                ?>
                    <td>Nama</td>
                    <td><?php echo $row1["nama_cus"]; $nama=$row1["nama_cus"];?></td>
                </tr>
                <tr>
                    <td>Nomor HP</td>
                    <td><?php echo $row1["no_hp"]; $nomor_hp=$row1["no_hp"];?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?php echo $row1["alamat_cus"]; $alamat=$row1["alamat_cus"];?></td>
                </tr>
                <tr>
                    <td>Kode pos</td>
                    <td><?php echo $kodepos = $row1["kodepos_cus"]; $kodepos=$row1["kodepos_cus"];?></td>
                </tr>
                <tr>
                    <td>Total barang</td>
                    <td><?php echo $row["total_harga"];?></td>
                </tr>
                <tr>
                    <td>Tanggal Transaksi</td>
                    <td><?php echo $row["tgl_penjualan"];?></td>
                </tr>
            </table>
            <br>
            <?php
                    }
                }
            ?>
            <br>
            <table>
                <th>
                    <h2>Informasi Barang</h2>
                </th>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Sub Total</th>
                    
                </tr>
            <?php
                if(!isset($_SESSION)) 
                { 
                    session_start(); 
                } 
                $total = 0;
                $berat = 0;
                for($i=1; $i <= count($_SESSION['cart']); $i++){
                    if($_SESSION['cart'][$i] == null){
                        
                    }
                    else{
                        $id = $_SESSION['cart'][$i]['id'];
                        $quantity = $_SESSION['cart'][$i]['quantity'];
                        $sql = "SELECT * FROM barang where kode = '$id'";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc())
                        {

            ?>
            <tr>
                <td>
                    <?php            
                       echo $row["nama"]; 
                    ?>
                </td>
                <td>
                    <?php
                        echo $quantity;
                    ?>
                </td>
                <td>
                    <?php
                        echo rupiah($row["harga"]);
                    ?>
                </td>
                <td>
                    <?php
                        $sub = $row["harga"]*$quantity; 
                        echo rupiah($sub);
                        $berat += $row["berat"]*$quantity;
                        $berat_total = $berat/1000;
                    ?>
                </td>
                
            </tr>
            <?php
                        }
                        $sql = "INSERT INTO jual VALUES ('".$id."', '".$id_pemesan."', '".$sub."', '".$quantity."')";
                        $conn->query($sql);
                        $total += $sub;
                    }
                }
            ?>
            <tr>
                <td colspan="3">Ongkir seberat <?php echo $berat_total." Kg"?></td>
                <td>
                    <?php
                        
                        $sql = "SELECT * FROM ongkir where kodepos_tujuan = '$kodepos'";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc())
                        {
                            $ongkir = $row['tarif'];
                        }
                        $berat_pengiriman = fmod($berat_total, 1) > 0.3 ? ceil($berat_total) : floor($berat_total);
                        $biaya_ongkir = $berat_pengiriman * $ongkir;
                        echo rupiah($biaya_ongkir);
                        echo "(" .$berat_pengiriman. "Kg)";
           
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">Total Pembayaran</td>
                <td>
                    <?php
                        $total_pembayaran = $total+$biaya_ongkir;
                        echo rupiah($total_pembayaran);
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="4" align="center" bgcolor="#FF7597">
                    
                    <form action="submit-order.php" method="post">
                    <div class="button2">
                    <p class="submit">        
                        <input type="submit" value="CHECKOUT">
                    </p>
                    </div>
                    </form>

                </td> 
            </tr>
            </table>
            </center>
        </div>
    </div>
</div>