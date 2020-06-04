<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Snow Bootstrap Website Template | Register :: w3layouts</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
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
     <script>
     	
		</script>
 </head>
<body>
			<?php
			require_once "dbconn.php";


			if(isset($_POST['register'])){
				// Personal
				$name = $_POST["nama"];
				$nohp = $_POST["nohp"];
				$alamat = $_POST["alamat"];
				$kodepos = $_POST["kodepos"];
				// Login
			    $username = $_POST["username"];
			    $password = $_POST["password"];
			    $copassword = $_POST["copassword"];
				    $sqli = "SELECT * FROM customer WHERE username = '$username'";
	   				$query = $conn->query($sqli);
	   			if($query->num_rows != 0) {
			   		$err1='<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>INFO!</strong> Username sudah dipakai!</div>';
				    echo $err1;
				    $save = 0;
				}
				else if (!$name || !$nohp || !$alamat || !$kodepos || !$username || !$password || !$copassword){
					$err2='<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>INFO!</strong> Ada kolom yang masih belum diisi!</div>';
					echo $err2;
					$save = 0;
				}else if ($password==$copassword) {
					$data = "INSERT INTO customer VALUES (NULL, '$username', '$password', '$name', '$nohp', '$alamat', '$kodepos')";
       				$save = $conn->query($data);
				}else {
					$err3='<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>INFO!</strong> Password dengan Konfirmasi password berbeda!</div>';
					echo $err3;
					$save = 0;
				}

				if ($save) {
					header('location:template.php?content=login.php&temp=2');
				} else{
					$err4='<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>INFO!</strong> Proses gagal dilakukan!</div>';
					echo $err4;
				}
			}

		?>
     <div class="main">
      <div class="shop_top">
	     <div class="container">
						<form action="" method="POST"> 
								<div class="register-top-grid">
										<h3>PERSONAL INFORMATION</h3>
										<div>
											<span>Nama Lengkap<label>*</label></span>
											<input type="text" name="nama" placeholder="NAMA LENGKAP"> 
										</div>
										<div>
											<span>No Hp<label>*</label></span>
											<input type="text" name="nohp" placeholder="NOMOR HANDPHONE"> 
										</div>
										<div>
											<span>Alamat lengkap<label>*</label></span>
											<input type="text" name="alamat" placeholder="ALAMAT"> 
										</div>
										<div>
											<span>Kode pos<label>*</label></span>
											<input type="text" name="kodepos" placeholder="KODE POS"> 
										</div>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<div class="register-bottom-grid">
										<h3>LOGIN INFORMATION</h3>
										<div>
											<span>Username<label>*</label></span>
											<input type="text" name="username" placeholder="USERNAME">
										</div>
										<div>
											<span>Password<label>*</label></span>
											<input id="modlgn_passwd" type="password" class="inputbox" size="18" name="password" autocomplete="off" placeholder="PASSWORD">
										</div>
										<div>
											<span>Confirm Password<label>*</label></span>
											<input id="modlgn_passwd" type="password" class="inputbox" size="18" autocomplete="off" name="copassword" placeholder="CONFIRM PASSWORD">
										</div>
								</div>
								<div class="clear"> </div>
								<div class="button2" align="center">
								<input type="submit" name="register" value="DAFTAR"></div>
						</form>
					</div>
		   </div>
	  </div>
</body>	
</html>