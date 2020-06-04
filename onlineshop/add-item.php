<html>
    <?php
        include('dbconn.php');

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if(!isset($_SESSION['username'])) {
           header('location:template.php?content=login.php&temp=1');
        } else { 
           $id = $_GET["id"];
        }

    ?>
     <div class="main">
      <div class="shop_top">
        <div class="container">
            <center>
            <form class="form" action="assign-to-array.php?id=<?php echo $id;?>" method="post">
                <fieldset class="input">
                    <legend>Kuantitas</legend>
                <p class="id">
                    <label for="id">Kode</label><br><br>
                    <?php echo $id;?><br><br>
                </p>
                <p class="quantity">
                    <label for="quantity">Jumlah barang</label><br>
                    <input type="number" name="quantity">
                </p>
                </fieldset>
                <div class="button2">
                    <input type="submit" value="ADD">
                </div>
            </form>
            </center>
        </div>
    </div>
</div>
</html>

