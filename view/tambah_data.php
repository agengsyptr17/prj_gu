<?php
// memanggil file koneksi dan file proses
include '../config/connection.php';
include '../controller/function.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah GU</title>

    <!-- link style menggunakan bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>

<body>
    <!-- Mengatur ukuran tampilan -->
    <div class="container-sm">
        <br>

        <div class="text-center">
            <h2>SEKSI SURVEI DAN PEMETAAN <br>
            KANTOR PERTANAHAN KABUPATEN SIMALUNGUN</h2>
            <br>
        </div>
        <br>
        <!-- Membuat card -->
        <div class="card">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col-11 text-start">
                            <h4>TAMBAHKAN GAMBAR UKUR BARU</h4>
                        </div>
                        <div class="col-1 text-end">
                            <a class="btn-close" aria-label="Close" href="tampil_data.php">
                            <i class='fas fa-window-close' style='font-size:36px;color:red'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="card-body">

                        <?php
                        //Validasi untuk menampilkan alert / pesan pemberitahuan
                        // $nip = $_SESSION['nip'];
                        if (isset($_GET['add'])) {

                            if ($_GET['add'] == 'berhasil') {
                                echo "<div class='alert alert-success'><strong>Berhasil!</strong> Berhasil Menambah Data!</div>";
                            } else if ($_GET['add'] == 'gagal') {
                                echo "<div class='alert alert-danger'><strong>Gagal!</strong> Gagal Menambah Data!</div>";
                            }
                        }
                        ?>

                        <!-- Membuat inputan untuk dikirim ke file proses_siswa.php -->
                        <input type="hidden" class="form-control" value="">

                        <h6>Nomor GU : </h6>
                        <input type="text" class="form-control" id="no_gu" name="no_gu" autocomplete="off" required>

                        <h6>Nama Pemohon : </h6>
                        <input type="text" class="form-control" id="nmpemohon" name="nmpemohon" autocomplete="off" required>

                        <h6>Rak : </h6>
                        <select name="rak" class="form-control" required>
                        <option>--Rak--</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>

                        <h6>Tingkat : </h6>
                        <select name="tingkat" class="form-control" required>
                            <option>--Tingkat--</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                        </select>

                        <h6>Bagian : </h6>
                        <select name="bagian" class="form-control" required>
                            <option selected disabled>--Bagian--</option>
                            <option>A</option>
                            <option>B</option>
                        </select>
                        
                        <?php 
                        $year = date("Y");
                        ?>
                    
                        <h6>Tahun : </h6>
                        <input type="number" min="1945" max="<?=$year?>" class="form-control" name="tahun" autocomplete="off" required>

                        <h6>Desa : </h6>
                        <select name="desa" class="form-control" required>
                        <option selected disabled>--Desa--</option>
                        <?php 
                        include 'dft_desa.php';
                        ?>
                        </select

                        <h6>File :</h6> <br>
                        <input type="file" id="file" name="file" autocomplete="off" required>

                    </div>
                </div>
                <div class="card-footer text-center">
                    <a class="btn btn-warning" href="tampil_data.php"><i class='fas fa-arrow-left'></i> | Kembali</a>
                    <button class="btn btn-primary" type="submit" name="add-data">Simpan</button>
                    <button class="btn btn-secondary" type="reset"><span class="glyphicon glyphicon-repeat"> Reset</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>