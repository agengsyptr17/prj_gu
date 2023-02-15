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
                        <h2 style="font-family: 'Lucida Sans'">UBAH DATA GAMBAR UKUR</h2>
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

                            if (isset($_GET['update']) == 'gagal') {
                                echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Gagal!</strong> Periksa kembali data yang akan diubah dengan benar!
                                </div>';
                            }

                            //mendapatkan id dari url yang dikirim, menggunakan method GET:
                            $id_gu= $_GET['id_gu'];
                            //membuat query tampil data siswa berdasarkan nis yang dipilih
                            $query=mysqli_query($koneksi, "SELECT * from tbl_gu where id_gu='$id_gu'");
                            while($data=mysqli_fetch_array($query)){
                                //membuat variabel untuk menampung data gu
                                $id_gu = $data['id_gu'];
                                $no_gu = $data['no_gu'];
                                $nmpemohon = $data['nmpemohon'];
                                $rak = $data['rak'];
                                $tingkat = $data['tingkat'];
                                $bagian = $data['bagian'];
                                $tahun = $data['tahun'];
                                $desa = $data['desa'];
                                $kecamatan = $data['kecamatan'];
                                $file = $data['file'];

                            }
                            ?>
                            <div class="form-group">
                                <input type="hidden" name="id_gu" class="form-control" value="<?= $id_gu ?>" readonly><br>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="no_gu" value="<?= $no_gu ?>"  placeholder="Nomor GU" required>
                                <small class="form-text">Masukan Nomor GU</small>
                            <br>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nmpemohon" value="<?= $nmpemohon ?>" required>
                                <small class="form-text">Nama Pemohon</small>
                            </div>
                            <div class="form-group">
                                <select name="rak" class="form-control" value="<?= $rak ?>" required>
                                    <option disabled>Rak</option>
                                    <option value="1" <?php if($rak=="1"){echo "selected";}?>>1</option>
                                    <option value="2" <?php if($rak=="2"){echo "selected";}?>>2</option>
                                    <option value="3" <?php if($rak=="3"){echo "selected";}?>>3</option>
                                    <option value="4" <?php if($rak=="4"){echo "selected";}?>>4</option>
                                </select>
                                <small class="form-text">Pilih Rak</small>
                            </div>
                            <br>
                                <select name="tingkat" class="form-control" value="<?= $tingkat ?>" required>
                                    <option disabled>Tingkat</option>
                                    <option value="1" <?php if($tingkat=="1"){echo "selected";}?>>1</option>
                                    <option value="2" <?php if($tingkat=="2"){echo "selected";}?>>2</option>
                                    <option value="3" <?php if($tingkat=="3"){echo "selected";}?>>3</option>
                                    <option value="4" <?php if($tingkat=="4"){echo "selected";}?>>4</option>
                                    <option value="5" <?php if($tingkat=="5"){echo "selected";}?>>5</option>
                                    <option value="6" <?php if($tingkat=="6"){echo "selected";}?>>6</option>
                                </select>
                                <small class="form-text">Pilih Tingkatan</small>
                            <br>
                            <div class="form-group">
                                <select name="bagian" class="form-control" value="<?= $bagian ?>" required>
                                    <option disabled>Bagian</option>
                                    <option value="A" <?php if($bagian=="A"){echo "selected";}?>>A</option>
                                    <option value="B" <?php if($bagian=="B"){echo "selected";}?>>B</option>
                                </select>
                                <small class="form-text">Pilih Bagian</small>
                            </div>
                            <div class="form-group">
                                <?php $year = date("Y"); ?>
                                <input type="number" min="1945" max="<?= $year ?>" class="form-control" name="tahun" value="<?= $tahun ?>" autocomplete="off" required>
                                <small id="emailHelp" class="form-text">Tahun</small>
                            </div>
                            <div class="form-group">
                                <select name="desa" class="form-control" value="<?= $desa ?>" required>
                                    <option selected value="<?= $desa?>"><?= $desa?></option>
                                    <option disabled>Desa</option>
                                    <?php include 'dft_desa.php'; ?>
                                </select>
                                <small class="form-text">Pilih Desa</small>
                            </div>
                            <div class="form-group">
                                <select name="kec" class="form-control" value="<?= $kecamatan ?>" required>
                                    <option selected value="<?= $kecamatan?>"><?= $kecamatan?></option>
                                    <option disabled>Kecamatan</option>
                                    <?php include 'dftkec.php'; ?>
                                </select>
                                <small class="form-text">Pilih Kecamatan</small>
                            </div>
                            <input type="file" name="file" autocomplete="off" value="<?= $file?>">
                            <small class="form-text">Unggah file GU Berbentuk PDF <p style="color: red;">(Abaikan jika tidak ingin mengubah file)</p></small>

    </div>
    <div align="right">
    <a class="btn btn-warning" href="tampil_dataa.php"><i class='fas fa-times'></i> Batal</a>
        <button type="submit" class="btn btn-dark" name="update-data">Ubah</button>
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