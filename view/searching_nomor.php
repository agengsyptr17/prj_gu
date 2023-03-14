<?php
include 'header.php';
include 'navbar.php';
?>

<body class="w3-white">
    <!-- Image and name container. Change to your picture here. -->
    <div class="image-container">
        <br><br><br>
        <img src="https://kompaskerja.com/wp-content/uploads/2019/12/rekrutmen-ppnpn-bpn-2020.jpg" class="w3-margin" alt="Person" max-width="100%" height="150px" style="border-radius: 50%;">
        <!-- Content. Add your bio here. -->
        <div class="w3-margin">
            <h2 class="w3-text-black">
                <strong><a name="head">SISTEM INFORMASI MESIN PENCARI GAMBAR UKUR</a></strong>
            </h2>
            <p>SEKSI SURVEI DAN PEMETAAN <br>
                KANTOR PERTANAHAN KABUPATEN SIMALUNGUN</p>
        </div>

        <form action="" method="post">

            <div class="mb-3 mt-3 links-container">
                <input type="text" class="form-control" id="no_gu" placeholder="No.GU" style="width: 50%;" name="no_gu" autocomplete="off" required>
                <?php
                $year = date("Y");
                ?>
                <input type="number" min="1945" max="<?= $year ?>" placeholder="Tahun" class="form-control" style="width: 50%;" id="tahun" name="tahun" autocomplete="off" required>
                <button type="submit" name="search-no" style="width: 50%;" class="w3-button w3-hover-blue w3-large w3-black">CARI GU</button>
                <a href="searching_nama.php">Cari GU Berdasarkan Nama</a>
            </div>
        </form>
        <?php

        if (isset($_POST['search-no'])) {
            $no_gu = $_POST['no_gu'];
            $tahun = $_POST['tahun'];

            $query = mysqli_query($koneksi, "SELECT * FROM tbl_gu WHERE no_gu='$no_gu' && tahun='$tahun'");

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

                <table align="center" class="table table-bordered" style="width: 80%;">
                    <thead>
                        <tr>
                            <th colspan="3">DETAIL DATA & TATA LETAK GAMBAR UKUR</th>
                        </tr>
                    </thead>
                    <tbody>
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
        <?php
            }
        } ?>
    </div>
    <?php include 'footer.php'; ?>
</body>