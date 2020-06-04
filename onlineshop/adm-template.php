<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
@ob_start();
session_start();
if (!isset($_GET['content'])){
	$vcontent='adm-template.php?content=adm-data-penjualan.php';
}
else
{
	$vcontent=$_GET['content'];
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>ADMIN Site</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<!--<script src="js/jquery.easydropdown.js"></script>-->
<!--start slider -->
<link rel="stylesheet" href="css/fwslider.css" media="all">
<script src="js/jquery-ui.min.js"></script>
<script src="js/fwslider.js"></script>
<!--end slider -->
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
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="#"><img src="images/logo.png" alt=""/></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
						    <ul class="nav" id="nav">
						    	<li><a href="adm-template.php?content=adm-data-penjualan.php">Data Penjualan</a></li>
						    	<li><a href="adm-template.php?content=shop.php">Barang</a></li>							
								<div class="clear"></div>
							</ul>
							<script type="text/javascript" src="js/responsive-nav.js"></script>
				    </div>							
	    		    <div class="clear"></div>
	    	    </div>
	            <div class="header_right">
	    		  <!-- start search-->
				      <div class="search-box">
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
						<!-- profile -->

						<!-- profile -->
						<!----search-scripts---->
						<script src="js/classie.js"></script>
						<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
						<!----//search-scripts---->
	       </div>
	       <div class="profile">
	       	<ul class="icon1 sub-icon1 profile_img">
				<li><a href="#"><img src="images/profile.png" alt="" height="24px" width="24px" /></a>
				<ul class="sub-icon1 list">
					<li class="list_img"><img src="images/bl.png" alt="" height="24px" width="24px"/></li>
						  <li class="list_desc"><h4><a href="#">Hai! Admin Ganteng</a></h4><span class="actual"></span></li>
						  <div class="login_buttons">
							 <div class="check_button"><a href="#">Adminku</a></div>
							 <div class="login_button"><a href="#">Logout</a></div>
							 <div class="clear"></div>
						  </div>
						  <div class="clear"></div>
				</ul>
				</li>
			</ul>
			</div>
	      </div>
		 </div>
	    </div>
	</div>
	<div class="content">
		<?php  	if(isset($_GET["content"])){ 
    					include($_GET["content"]);
   								//session_start(); /* Starts the session */
    					}		
			 ?>
</body>	
</html>