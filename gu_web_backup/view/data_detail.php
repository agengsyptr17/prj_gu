<?php
include 'header.php';
include 'navbar.php';
include '../controller/cek_sess.php';

$no_gu = $_GET['no_gu'];
$id_gu = $_GET['id_gu'];

$query = mysqli_query($koneksi, "SELECT * FROM tbl_gu WHERE no_gu='$no_gu' && id_gu='$id_gu'");

while ($data = mysqli_fetch_assoc($query)) {
    // menyimpan data dalam bentuk variabel agar mudah saat pemanggilan
    $id_gu = $data['id_gu'];
    $no_gu = $data['no_gu'];
    $nmpemohon = $data['nmpemohon'];
    $rak = $data['rak'];
    $tingkat = $data['tingkat'];
    $bagian = $data['bagian'];
    $tahun = $data['tahun'];
    $desa = $data['desa'];
    $kecamatan = $data['kecamatan'];
    $tgl = $data['tgl'];
    $file = $data['file'];

?>

    <body style="text-align: center;">


        <br><br><br><br>
        <div class="container" style="height: 100%;" align="center">
            <table border="0" style="width: 80%;" class="table table-bordered">
                <thead style="height: 5%" align="center">
                    <tr style="height: 10%">
                        <td colspan="3">
                            <h2 style="font-family: 'Lucida Sans'">DETAIL DATA & TATA LETAK GAMBAR UKUR</h2>
                        </td>
                    </tr>
                </thead>
                <tbody align="center">      
                    <tr>
                        <td>No.GU</td>
                        <td>:</td>
                        <td><?= $no_gu ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pemohon</td>
                        <td>:</td>
                        <td><?= $nmpemohon ?></td>
                    </tr>
                    <tr>
                        <td>Rak</td>
                        <td>:</td>
                        <td><?= $rak ?></td>
                    </tr>
                    <tr>
                        <td>Tingkat</td>
                        <td>:</td>
                        <td><?= $tingkat ?></td>
                    </tr>
                    <tr>
                        <td>Bagian</td>
                        <td>:</td>
                        <td><?= $bagian ?></td>
                    </tr>
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td><?= $tahun ?></td>
                    </tr>
                    <tr>
                        <td>Desa</td>
                        <td>:</td>
                        <td><?= $desa ?></td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td><?= $kecamatan ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                        <a class="btn btn-danger" href="tampil_data.php" abbr title="Kembali">
                                <i class='fas fa-arrow-alt-circle-left' style='color:white'></i>
                            </a>
                            <a class="btn btn-success" abbr title="Lihat File" href="pdf_detail.php?id_gu=<?= $id_gu ?>"><i class='fas fa-file-pdf'></i></a>
                            <?php
                            if ($_SESSION['nip'] == 'admin' || 'asn') {
                                echo '<a class="btn btn-info" abbr title="Ubah" href="update_dataa.php"><i class="far fa-edit" style="color:white;"></i></a>';
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
        <?php
    }
        ?>
    </body>