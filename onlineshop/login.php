<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
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
 </head>
<body>
	<?php	
	if(!isset($_SESSION['username'])){
		$error = $_GET["temp"];
		if ($error == 1) {
		$result='<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>INFO!</strong> Kamu harus login terlebih dahulu!</div>';
		}
		else if ($error == 2) {
		$result='<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>INFO!</strong> Pendaftaran berhasil silahkan login!</div>';
		}
		else {
		    $result = '';
		}

	?>
	<?php
				if(isset($_POST['submit'])){
					if(!isset($_SESSION)) 
						{ 
							session_start(); 
						}
				    require_once ("dbconn.php");
				    $username = $_POST["username"];
				    $password = $_POST["password"];
				    $sql = "SELECT * FROM customer WHERE username = '$username'";
   					$query = $conn->query($sql);
   					$hasil = $query->fetch_assoc();
					   if($query->num_rows == 0) {
					     $err1='<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>INFO!</strong> Username belum terdaftar!</div>';
							echo $err1;
					   } else {
					     if($password <> $hasil['password']) {
					       $err2='<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>INFO!</strong> Password salah!</div>';
							echo $err2;
					     } else {
					       $_SESSION['username'] = $hasil['username'];
					       header('location:template.php?content=shop.php');
					     }
					   }
					}
				?>
	<?php echo $result;?>
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="col-md-6">
				 <div class="login-page">
					<h4 class="title">New Customers</h4>
					<p>Untuk bisa melakukan pemesanan barang dan pembelian barang anda harus melakukan pendaftaran akun. Selamat Berbelanja</p>
					<div class="button1">
					   <a href="template.php?content=register.php"><input type="submit" name="Submit" value="Create an Account"></a>
					 </div>
					 <div class="clear"></div>
				  </div>
				</div>
				
				<div class="col-md-6">
				 <div class="login-title">
	           		<h4 class="title">LOGIN HERE!</h4>
					<div id="loginbox" class="loginbox">
						<form action="" method="post" name="login" id="login-form">
						  <fieldset class="input">
						    <p id="login-form-username">
						      <label for="modlgn_username">Username</label>
						      <input id="modlgn_username" type="text" name="username" class="inputbox" size="18" autocomplete="off">
						    </p>
						    <p id="login-form-password">
						      <label for="modlgn_passwd">Password</label>
						      <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off">
						    </p>
						    <div class="remember">
							    <p id="login-form-remember">
							      <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
							   </p>
							    <input type="submit" name="submit" class="button" value="Login"><div class="clear"></div>
							 </div>
						  </fieldset>
						 </form>
					</div>
					<?php
					  	} else{
					  		$link = 'template.php?content=shop.php';
					  		$username = $_SESSION["username"];
					  		echo "<br>";
					  		echo "<center><h2>Kamu telah login ($username)</h2></center>";
							echo "<center><h4>Ayo belanja sekarang <a href='".$link."'>here</a></h4></center>";
							echo "<br>";
					  	}
					  ?>
			      </div>
				 <div class="clear"></div>
			  </div>
			</div>
		  </div>
	  </div>
</body>	
</html>