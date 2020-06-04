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
                    $sql = "SELECT * FROM penjualan";
                    $result = $conn->query($sql);
                    while($temp = mysqli_fetch_assoc($result)){
                        $penjualan[] = $temp;
                    } 
            ?>
            <center>
                <table>
                    <tr>
                        <th>ID Penjualan</th>
                        <th>ID Customer</th>
                        <th>Total Pembayaran</th>
                        <th>Tanggal Penjualan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    <?php 

                        $i = 1;
                        foreach ($penjualan as $isi):
                          
                          if ($isi["Status"]==0){
                            $var = "BELUM BAYAR";
                          }else if ($isi["Status"]==1){
                            $var = "SUDAH BAYAR";
                          }else if ($isi["Status"]==2){
                            $var = "SUDAH KIRIM";
                          }
                ?>
                <tr>
                    <td>
                        <?php            
                           echo $isi["id_penjualan"]; 
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $isi["id_ctm"];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo rupiah($isi["total_harga"]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $isi["tgl_penjualan"];
                            
                        ?>
                    </td>

                    <td>
                        <?php if($var=="BELUM BAYAR"){
                            ?> 
                            <a href="adm-update-status.php?id=<?=$isi["id_penjualan"];?>" class="btn btn-danger" role="button"><?php echo $var;?></a>
                        <?php
                            }
                        ?>
                        <?php if($var=="SUDAH BAYAR"){
                            ?> 
                            <a href="adm-update-status.php?id=<?=$isi["id_penjualan"];?>" class="btn btn-warning" role="button"><?php echo $var;?></a>
                        <?php
                            }
                        ?>
                        <?php if($var=="SUDAH KIRIM"){
                            ?> 
                            <a href="adm-update-status.php?id=<?=$isi["id_penjualan"];?>" class="btn btn-success" role="button"><?php echo $var;?></a>
                        <?php
                            }
                        ?>
                    </td>
                    <td>
                        <a href="adm-template.php?content=adm-view-detail.php&id=<?=$isi['id_penjualan']?>" class="btn btn-info" role="button">VIEW DETAIL</a>
                    </td>
                </tr>
                <?php 
                    $i++;
                    endforeach;
                    ?>
                </table>
            </center>
        </div>
    </div>
</div>
</body>
</html>