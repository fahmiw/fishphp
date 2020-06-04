<?php
        if(isset($_POST['edit'])){

            $id = $_GET['id'];
            $old = $_GET['id'];
            $nama = $_GET['nama'];
            $nomor_hp = $_GET['nomorhp'];
            $alamat = $_GET['alamat'];
            $kodepos = $_GET['kodepos'];
            
    ?>
    <div class="main">
      <div class="shop_top">
         <div class="container">
                <form action="insert-customer.php?<?php echo "old=".$_GET['id'];?>" method ="post">
                    <h3>Ubah Data Diri Anda</h3>
                
                    <!-- <br><label for="id">IDpesanan</label><br>
                    <input type="text" name="id" value=<?php echo $id?>><br><br> -->
                    <div>
                        <span>Masukan ID PESANAN<label>*</label></span>
                        <input type="text" name="id" value=<?php echo $id?>> 
                    </div>
                
                    <!-- <label for="nama">Nama</label><br>
                    <input type="text" name="nama" value=<?php echo $nama?>><br><br> -->
                    <div>
                        <span>Nama<label>*</label></span>
                        <input type="text" name="nama" value=<?php echo $nama?>> 
                    </div>
                
                    <!-- <label for="nomorhp">Nomor Telepon</label><br>
                    <input type="text" name="nomorhp" value=<?php echo $nomor_hp?>><br><br> -->
                    <div>
                        <span>Nomor Telephone<label>*</label></span>
                        <input type="text" name="nomorhp" value=<?php echo $nomor_hp?>> 
                    </div>
                
                    <!-- <label for="alamat">Alamat</label><br>
                    <input type="text" name="alamat" value=<?php echo $alamat?>><br><br -->>
                    <div>
                        <span>Alamat<label>*</label></span>
                        <input type="text" name="alamat" value=<?php echo $alamat?>> 
                    </div>
                
                    <!-- <label for="kodepos">Kode Pos</label><br>
                    <input type="text" name="kodepos" value=<?php echo $kodepos?>><br><br> -->
                    <div>
                        <span>Kode Pos<label>*</label></span>
                        <input type="text" name="kodepos" value=<?php echo $kodepos?>> 
                    </div>
                    <div class="clear"> </div>

                    <p class="submit">
                        <input type="submit" value="SAVE" name="edit"}>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <?php

        }
        else{

            $tot = $_GET['tot'];
    ?>
    <div class="main">
      <div class="shop_top">
         <div class="container">
            <form action="insert-customer.php?tot=<?php echo $_GET['tot']?>" method ="post">
                <div class="register-top-grid">
                <h3>MASUKAN DATA DIRI</h3>
                    <!-- <label for="id">Masukan IDpesanan</label><br>
                    <input type="text" name="id"><br><br> -->
                    <div>
                        <span>Masukan ID PESANAN<label>*</label></span>
                        <input type="text" name="id"> 
                    </div>
                    <!-- <label for="nama">Nama</label><br>
                    <input type="text" name="nama"><br><br> -->
                    <div>
                        <span>Nama<label>*</label></span>
                        <input type="text" name="nama"> 
                    </div>
                
                    <!-- <label for="nomorhp">Nomor Telepon</label><br>
                    <input type="text" name="nomorhp"><br><br> -->
                    <div>
                        <span>Nomor Telephone<label>*</label></span>
                        <input type="text" name="nomorhp"> 
                    </div>
                
                    <!-- <label for="alamat">Alamat</label><br>
                    <input type="text" name="alamat"><br><br> -->
                    <div>
                        <span>Alamat<label>*</label></span>
                        <input type="text" name="alamat"> 
                    </div>
                
                    <!-- <label for="kodepos">Kode Pos</label><br>
                    <input type="text" name="kodepos"><br><br> -->
                    <div>
                        <span>Kode Pos<label>*</label></span>
                        <input type="text" name="kodepos"> 
                    </div>
                    <div class="clear"> </div>
                    <p class="submit">
                        <input type="submit" value="SUBMIT">
                    </p>
            </form>
            <?php
                }
            ?>
        </div>
    </div>
</div>