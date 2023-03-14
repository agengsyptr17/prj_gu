<?php
include '../controller/cek_sess.php';


//   if(isset($_GET['nip'])) {
//      $nip= $_GET['nip'];
//      $query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE nip='$nip'");

//      while($data=mysqli_fetch_row($query)) {

//      $nip=$data['nip'];


//      }

// 
?>

<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">

  <a class="navbar-brand"><img src="../asset/img/bpn-sml.png" alt="bpn" width="40px"></a>

  <a class="nav" style="text-decoration: none; color: rgba(255,255,255,.5);" href="#">KANTOR PERTANAHAN KAB.SIMALUNGUN<br>
    Seksi Survey Dan Pemetaan
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="searching_nomor.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tampil_data.php">Daftar GU</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" data-toggle="modal" data-target="#myModal" href="#">
        <span class='fas fa-user-circle'>
        </span> <?= $_SESSION['nip'] ?><br></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../controller/logout.php">Logout</a>
      </li>
    </ul>
    
</nav>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><?= $_SESSION['nip'] ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php
        if ($_SESSION['nip'] == 'admin') {
          echo '<a class="btn btn-info" href="data_user.php">Dashbooard User</a>';
        }
        ?>
        <a class="btn btn-success" href="profil.php?nip=<?=$_SESSION['nip']?>">Profil</a>
        <a class="btn btn-danger" href="../controller/logout.php">Logout</a>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>