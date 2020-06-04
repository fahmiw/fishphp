<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE HTML>
<html>
<head>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
 </head>
<body>
	<div class="main">
      <div class="shop_top">
		<div class="container">
            <?php 
                    require_once ("dbconn.php");

                    function rupiah($num){
                    $result = "Rp. ".number_format($num,'0',',','.');
                    return $result;
                    }
                    $id = $_GET["id"];
                    $result2 = mysqli_query($conn, "SELECT * FROM penjualan WHERE id_penjualan ='$id'");
                    while($row = $result2->fetch_assoc()){
                        if ($row["Status"]==0){
                        $var = "BELUM BAYAR";
                      }else if ($row["Status"]==1){
                        $var = "SUDAH BAYAR";
                      }else if ($row["Status"]==2){
                        $var = "SUDAH KIRIM";
                      }

            ?>
            <center>
            <table>
                <th>
                    <h2>Informasi Pembeli</h2>
                </th>
                <tr>
                    <td>ID pesanan</td>
                    <td><?php echo $row["id_penjualan"];?></td>
                </tr>
                <tr>
                <?php
                    $user = $row["id_ctm"];
                    $sql1 = "SELECT * FROM customer where id_cus = '$user'";
                        $result1 = $conn->query($sql1);
                        while($row1 = $result1->fetch_assoc()){
                ?>
                    <td>Nama</td>
                    <td><?php echo $row1["nama_cus"]?></td>
                </tr>
                <tr>
                    <td>Nomor HP</td>
                    <td><?php echo $row1["no_hp"];?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?php echo $row1["alamat_cus"];?></td>
                </tr>
                <tr>
                    <td>Kode pos</td>
                    <td><?php echo $kodepos = $row1["kodepos_cus"];?></td>
                </tr>
                <tr>
                    <td>Total barang</td>
                    <td><?php echo $tot = $row["total_harga"];?></td>
                </tr>
                <tr>
                    <td>Tanggal Transaksi</td>
                    <td><?php echo $row["tgl_penjualan"];?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <?php if($var=="BELUM BAYAR"){
                            ?> 
                            <a href="#" class="btn btn-danger" role="button"><?php echo $var;?></a>
                        <?php
                            }
                        ?>
                        <?php if($var=="SUDAH BAYAR"){
                            ?> 
                            <a href="#?>" class="btn btn-warning" role="button"><?php echo $var;?></a>
                        <?php
                            }
                        ?>
                        <?php if($var=="SUDAH KIRIM"){
                            ?> 
                            <a href="#" class="btn btn-success" role="button"><?php echo $var;?></a>
                        <?php
                            }
                        ?>
                    </td>
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
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Berat Satuan(gram)</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Sub Total</th>
                </tr>
            <?php
                $total = 0;
                $berat = 0;
                $result = mysqli_query($conn, "SELECT * FROM jual WHERE id_penjualan = '$id'");
                    while($temp = mysqli_fetch_assoc($result)){
                    $penjualan[] = $temp;
                    }
                    foreach ($penjualan as $isi):
            ?>
            <tr>
                <td>
                    <?php            
                       echo $kode=$isi["kode"]; 
                    ?>
                </td>
                <?php
                    $res = mysqli_query($conn, "SELECT * FROM barang WHERE kode ='$kode'");
                    while($rowb = $res->fetch_assoc()){
                ?>
                <td>
                    <?php            
                       echo $rowb["nama"]; 
                    ?>
                </td>
                <td>
                    <?php
                        echo $brt=$rowb["berat"];
                    ?>
                </td>
                <td>
                    <?php
                        echo $jml=$isi["jumlah_brg"];
                    ?>
                </td>
                <td>
                    <?php
                        echo rupiah($rowb["harga"]);
                    }
                    ?>
                </td>
                <td>
                    <?php
                        $sub = $isi["harga_brg"]; 
                        echo rupiah($sub);
                        $berat += $brt*$jml;
                        $berat_total = $berat/1000;
                    ?>
                </td>
                <?php
                    
                    endforeach;
                ?>
            </tr>
            <tr>
                <td colspan="5">Ongkir seberat <?php echo $berat_total." Kg"?></td>
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
                <td colspan="5">Total Pembayaran</td>
                <td>
                    <?php
                        $total_pembayaran = $tot+$biaya_ongkir;
                        echo rupiah($total_pembayaran);
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <a href="adm-template.php?content=adm-data-penjualan.php" class="btn btn-info" role="btn">Kembali</a>
                </td> 
            </tr>
            </table>
            </center>
</body>
</html>