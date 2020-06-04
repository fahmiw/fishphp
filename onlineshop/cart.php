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
				function rupiah($angka){
					$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
					return $hasil_rupiah;
				 
				}
			         if(!isset($_SESSION)) 
			        { 
			            session_start(); 
			        } 

			        include ('dbconn.php');
			        $link = 'template.php?content=shop.php';
			        if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
			            echo "<h2>CART KOSONG</h2>";
			            echo "<h4>Get item in shop <a href='".$link."'>here</a></h4>";
			            echo "<br>";
			        }
			        else{
			    ?>
			    <center>
			    <table>
			    	<h3>ISI KERANJANG</h3>
			        <tr>
			            <th>Nama Barang</th>
			            <th>Jumlah</th>
			            <th>Harga</th>
			            <th>Sub Total</th>
			            <th>Aksi</th>
			        </tr>
			    <?php

			        $total = 0;
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
			                
			            ?>
			        </td>
			        <td>
			            <a href="delete-cart.php?i=<?php echo $i?>">HAPUS</a>
			        </td>
			    </tr>
			    <?php
			                }
			    
			                $total += $sub;
			            }
			        }
			    ?>  
			    <tr>
                	<td colspan="3">Total Pembayaran</td>
                	<td colspan="2">
				            <?php
				                echo "Total Pembayaran = ". rupiah($total);
				                
				            ?>
				    </td>
				 </tr>
			        <table>
			            <th>
			                <form action="template.php?content=shop.php" method="post">
			                    <div class="button2">
			                        <input type="submit" value="Tambah">
			                    </div>
			                </form>
			            </th>
			            <th>
			            <form action="clear-cart.php" method="post">
			                <div class="button2">
			                	<input type="submit" value="Clear">
			                </div>
			            </form>
			            </th>
			            <th>
			            <form action="template.php?content=insert-customer.php&tot=<?php echo $total;?>" method="post">
			                <div class="button2">
			                    <input type="submit" value="Pesan">
			                </div>
			            </form>
			            </th>
			        </table>
			    </table>
			    </center>
			    <?php
					}
			    ?>
		 </div>
		</div>
	</div>
</body>	
</html>