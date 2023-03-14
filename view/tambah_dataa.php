<?php
// memanggil file koneksi dan file proses
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
    <title>Home</title>
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
                        <h2 style="font-family: 'Lucida Sans'">TAMBAHKAN GAMBAR UKUR BARU</h2>
                    </td>
                </tr>
            </thead>
            <tbody align="center">
                <tr style="height: 90%">
                    <td>
                        <form method="post" action="" align="left" enctype="multipart/form-data" style="width: 100%; padding: 20px; border: 0px solid #f1f1f1; background-color: rgba(0, 0, 51, 0.2);">
                            <a class="btn-close" aria-label="Close" href="tampil_data.php">
                                <i class='fas fa-window-close' style='font-size:24px;color:blue'></i>
                            </a>
                            <?php
                            if (isset($_GET['add'])) {

                                if ($_GET['add'] == 'berhasil') {
                                    echo '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Berhasil!</strong> Berhasil Menambah Data!</div>';
                                } else if ($_GET['add'] == 'gagal') {
                                    echo '<div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Gagal!</strong> Gagal Menambah Data!</div>';
                                }
                            }
                            ?>
                            <div class="form-group">
                                <input type="number" class="form-control" id="nim" name="no_gu" placeholder="Nomor GU" required>
                                <small class="form-text">Masukan Nomor GU</small>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nmpemohon" placeholder="Nama Pemohon" required>
                                <small class="form-text">Nama Pemohon</small>
                            </div>
                            <div class="form-group">
                                <select name="rak" class="form-control" required>
                                    <option selected disabled>Rak</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                <small class="form-text">Pilih Rak</small>
                            </div>
                            <div class="form-group">
                                <select name="tingkat" class="form-control" required>
                                    <option selected disabled>Tingkat</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <small class="form-text">Pilih Tingkatan</small>
                            </div>
                            <div class="form-group">
                                <select name="bagian" class="form-control" required>
                                    <option selected disabled>Bagian</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                                <small class="form-text">Pilih Bagian</small>
                            </div>
                            <div class="form-group">
                                <?php $year = date("Y"); ?>
                                <input type="number" min="1945" max="<?= $year ?>" class="form-control" name="tahun" autocomplete="off" required>
                                <small id="emailHelp" class="form-text">Tahun</small>
                            </div>
                            <div class="form-group">
                                <select name="desa" class="form-control" required>
                                    <option selected disabled>Desa</option>
                                    <?php include 'dft_desa.php'; ?>
                                </select>
                                <small class="form-text">Pilih Desa</small>
                                
                            </div>
                            <div class="form-group">
                                <select name="kec" class="form-control" required>
                                    <option selected disabled>Kecamatan</option>
                                    <?php include 'dftkec.php'; ?>
                                </select>
                                <small class="form-text">Pilih Kecamatan</small>
                            </div>
                            <input type="file" id="file" name="file" autocomplete="off" required>
                            <small class="form-text">Unggah file GU (Berbentuk PDF)</small>

    </div>
    <div align="right">
        <button type="reset" class="btn btn-success" name="reset">Reset</button>
        <button type="submit" class="btn btn-dark" name="add-data">Tambah</button>
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
</body>

</html>