<?php
include 'header.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Add User</title>
    <style>
     body,
        html {
            background-color: white;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            height: 100%;
            margin-top: 35px;
        }
  </style>
</head>


<body>
  <div class="container" style="height: 100%;" align="center">
    <table border="0" style="width: 80%;">
      <thead style="height: 5%" align="center">
        <tr style="height: 10%">
          <td>
            <h2 style="font-family: 'Lucida Sans'">TAMBAHKAN PENGGUNA BARU</h2>
          </td>
        </tr>
      </thead>
      <tbody align="center">
        <tr style="height: 90%">
          <td>
            <form method="post" action="" align="left" enctype="multipart/form-data" style="width: 100%; padding: 20px; border: 0px solid #f1f1f1; background-color: rgba(0, 0, 51, 0.2);">
              <a class="btn-close" aria-label="Close" href="data_user.php">
                <i class='fas fa-window-close' style='font-size:24px;color:red'></i>
              </a>
              <br>
              <?php
              if (isset($_GET['daftar']) == 'gagal') {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Gagal!</strong> Gagal Menambahkan Akun!</div>';
              }

              if (isset($_GET['pass']) == 'tidakcocok') {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Password tidak cocok!</div>';
              }

              ?>
              <div class="form-group">
                <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP atau Username" autocomplete="off" required>
                <small class="form-text">NIP</small>
              </div>


              <div class="form-group">
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" autocomplete="off" required>
                <small class="form-text">Nama Pengguna</small>
              </div>


              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" autocomplete="OFF" id="id_password" required>
                <small class="form-text">Password</small>
              </div>

              <div class="form-group">
                <input type="password" name="password2" class="form-control" placeholder="Konfirmasi password" autocomplete="OFF" required>
                <small class="form-text">Konfirmasi Password</small>
              </div>

              <div class="form-group">
                <select name="level" class="form-control" required>
                  <option selected disabled>Level</option>
                  <option>Admin</option>
                  <option>ASN</option>
                </select>
                <small class="form-text">Pilih Level</small>
              </div>
              
              <div class="form-group">
                <input type="file" name="img" class="form-control" autocomplete="OFF" required>
                <small class="form-text">Unggah Foto Anda</small>
              </div>

              <div class="form-group">
                <button type="submit" name="daftar" class="btn btn-success">Daftar</button>
              </div>

              </div>
    </form>
    </td>
    </tr>
    <tr>
        <td></td>
    </tr>
    </tbody>
    <tfoot style="height: 5%;" align="center">
        <tr>
            <td style="font-family: 'Courier New', Courier, monospace; font-size: 8pt; padding-top: 10px">Kantor Pertanahan Kabupaten Simalungun @<?php echo $year = date("Y"); ?></td>
        </tr>
    </tfoot>
    </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');

    togglePassword.addEventListener('click', function(e) {
      // toggle the type attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // toggle the eye slash icon
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>

</html>