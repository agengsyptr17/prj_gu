<?php 
include 'header.php';

// if(isset($_SESSION['nip'])) {
//   header("Location:searching_nomor.php");
// }

?>

    <body class="w3-white">
        <!-- Image and name container. Change to your picture here. -->
      <div class="image-container">
      <img src="https://kompaskerja.com/wp-content/uploads/2019/12/rekrutmen-ppnpn-bpn-2020.jpg" class="w3-margin" alt="Person" max-width="100%" height="150px" style="border-radius: 50%;">
      
       <!-- Content. Add your bio here. -->
       <div class="w3-margin">
       <h2 class="w3-text-black"><strong>SISTEM INFORMASI DIGITALISASI GAMBAR UKUR</strong></h2>
       <p>SEKSI SURVEI DAN PEMETAAN <br>
       KANTOR PERTANAHAN KABUPATEN SIMALUNGUN</p>
       <br>
       </div>
    
  <form action="" method="POST">
  
    <div class="mb-3 mt-3 links-container">

    <?php
  if (isset($_GET['daftar']) =='berhasil' ) {               
      echo'<div class="alert alert-success alert-dismissible" width: 350px;">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Berhasil!</strong> Berhasil Menambahkan Akun Baru!Silahkan Login</div>';
    }

    if (isset($_GET['login']) =='gagal' ) {               
      echo'<div class="alert alert-danger alert-dismissible" width: 350px;">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Gagal!</strong> Username atau Password tidak sesuai!</div>';
    }

  ?>
      <input type="text" name="nip" style="width: 350px;" class="form-control" placeholder="Masukan NIP atau Username" autocomplete="off" required>
  
      <input type="password" name="password" style="width: 350px;" class="form-control" placeholder="Enter Password" autocomplete="off" required>
      <br>
        <button type="submit" name="login" class="w3-button w3-hover-blue w3-large w3-black" style="width: 350px;">LOGIN</button>
      </div>    
  
      </form>
    </div>
    <?php include 'footer.php'; ?>
    </body>
    
  
  