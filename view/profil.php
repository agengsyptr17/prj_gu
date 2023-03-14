<?php
include 'header.php';
include 'navbar.php';
include '../controller/cek_sess.php';
?>

<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #f6d365;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
    }
</style>

<body>
    <br><br><br><br>
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <h2 class="w3-text-black" align="center">
                <strong>Profil <?= $_SESSION['nip'] ?></strong>
            </h2>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <?php
                            if (isset($_GET['update']) == 'berhasil') {
                                echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Berhasil!</strong>Profil telah diubah!</div>';
                            }

                            $nip = $_SESSION['nip'];
                            $query = mysqli_query($koneksi, "SELECT * from tbl_user where nip='$nip'");
                            while ($data = mysqli_fetch_array($query)) {
                                $id_user = $data['id_user'];
                                $nip = $data['nip'];
                                $nama = $data['nama'];
                                $password = $data['password'];
                                $level = $data['level'];
                                $email = $data['email'];
                                $foto = $data['foto'];
                                $ctt =  $data['catatan'];
                            }

                            ?>
                            <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="../asset/img-user/<?= $foto ?>" alt="Foto Profil" class="img-fluid my-5" style="width: 80px;" />
                                <h5><?= $nama ?></h5>
                                <p><?= $level ?></p>
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Informasi</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>NIP</h6>
                                            <p class="text-muted"><?= $nip ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted"></p>
                                        </div>
                                    </div>
                                    <h6>Catatan Pekerjaan</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Terakhir
                                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                            </h6>
                                            <div class="modal fade" id="myModal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Catatan Pekerjaan</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <?= $ctt?>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <p class="text-muted">Lorem ipsum</p>
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        </section><p align="center" style="font-family: 'Courier New', Courier, monospace; font-size: 8pt; padding-top: 10px">Kantor Pertanahan Kabupaten Simalungun @<?=$year = date("Y"); ?></p>
</body>
