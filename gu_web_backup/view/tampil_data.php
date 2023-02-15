<?php
include 'header.php';
include 'navbar.php';
include '../controller/cek_sess.php';

?>

<body>

    <!-- mengatur ukuran halaman website -->
    <div class="container-responsive-sm">
        <br>
        <br>
        <br>
        <br>



        <br>

        <!-- membuat tampilan card -->
        <div class="card">
            <!-- card header: -->
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary" align="center">DATA GAMBAR UKUR KANTOR PERTANAHAN KABUPATEN SIMALUNGUN</h4>
            </div>

            <!-- card body -->
            <div class="card-body">
                <!-- membuat tombol untuk mengarahkan ke halaman input data siswa -->
                <div class="col text-start">
                    <a class="btn btn-info" href="tambah_dataa.php"><i class='fas fa-plus'></i> Tambah Data</a>
                </div>
                <!-- membuat alert untuk menampilkan pesan (berhasil atau gagal)-->
                <?php
                if (isset($_GET['hapus'])) {

                    if ($_GET['hapus'] == 'berhasil') {
                        echo "<div class='alert alert-success'><strong>Berhasil!</strong> Berhasil Menghapus Data!</div>";
                    } else if ($_GET['hapus'] == 'gagal') {
                        echo "<div class='alert alert-danger'><strong>Gagal!</strong> Gagal Menghapus Data!</div>";
                    }
                }
                if (isset($_GET['update']) == 'berhasil') {
                    echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Berhasil!</strong>Data telah diubah!</div>';
                }
                ?>

                <!-- membuat tabel untuk menampilkan data dari database -->
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead align="center">
                            <tr>
                                <!-- membuat tabel header unuk nama kolom -->
                                <th scope="col">No.</th>
                                <th scope="col">Nomor GU</th>
                                <th scope="col">Nama Pemohon</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Diubah Terakhir</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <!-- tbody untuk menampilkan data dari database -->
                        <tbody align="center">
                            <?php
                            $bts = 20;
                            $hlm = @$_GET['hal'];
                            if(empty($hal)) {
                                $posisi = 0;
                                $hal = 1;
                            } else {
                                $posisi = ($hal - 1 ) * $bts;
                            }
                            if(isset($_SERVER['REQUEST_METHOD'] == "POST")) {
                                
                            }
                            $query = mysqli_query($koneksi, "SELECT * FROM tbl_gu");
                            // membuat variabel $no untuk membuat nomor urut data
                            $no = 1;
                            // membuat variabel $count untuk menghitung jumlah data
                            $count = mysqli_num_rows($query);
                            // perulangan while, digunakan untuk menampilkan data dengan mysqli_fetch_assoc
                            while ($data = mysqli_fetch_assoc($query)) {
                                // menyimpan data dalam bentuk variabel agar mudah saat pemanggilan
                                $id_gu = $data['id_gu'];
                                $no_gu = $data['no_gu'];
                                $nmpemohon = $data['nmpemohon'];
                                $tahun = $data['tahun'];
                                $desa = $data['desa'];
                                $kecamatan = $data['kecamatan'];
                                $tgl = $data['tgl'];

                            ?>
                                <tr>
                                    <!-- menampilkan data pada tabel dengan memanggil variabel -->
                                    <td><?= $no++ ?></td>
                                    <td><?= $no_gu ?></td>
                                    <td><?= $nmpemohon ?></td>
                                    <td><?= $tahun ?></td>
                                    <td><?= $desa ?></td>
                                    <td><?= $kecamatan ?></td>
                                    <td><?= $tgl ?></td>

                                    <td>
                                        <!-- Membuat form untuk mengirim nis, yang digunakan untuk proses update dan delete -->
                                        <form method="Post">
                                            <input type="hidden" name="id_gu" value="<?= $id_gu ?>">
                                            <a class="btn btn-success" abbr title="Lihat Dokumen" href="pdf_detail.php?id_gu=<?= $id_gu ?>"><i class='fas fa-file-pdf'></i></a>
                                            <a class="btn btn-info" abbr title="Lihat Detail" href="data_detail.php?id_gu=<?= $id_gu ?>&&no_gu=<?= $no_gu ?>"><i class='far fa-eye'></i></a>
                                            <a class="btn btn-warning" abbr title="Ubah" href="update_dataa.php?id_gu=<?= $id_gu ?>"><i class='far fa-edit' style="color:white;"></i></a>
                                            <button name="delete-data" abbr title="Hapus" class="btn btn-danger"><i class='far fa-trash-alt'></i></button>
                                        </form>
                                    </td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <h6>Jumlah Data Gambar Ukur : <?php echo $count; ?></h6>
            </div>
        </div>
    </div>
    </div>


    </div>
    <?php include 'footer.php'; ?>