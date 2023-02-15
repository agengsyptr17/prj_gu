<?php
session_start();
include 'header.php';

?>

<body>
    <!-- Mengatur ukuran tampilan -->
    <div class="container-sm">
        <br>
        
        <div class="text-center">
            <h4>Form Update Data</h4>
            <br>
        </div>
        <div class="col text-start">
            <a class="btn btn-warning" href="tampil_data.php">Kembali</a>
        </div>
        <!-- Membuat card -->
        <div class="card">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col-11 text-start">
                            <h4>Form Update Data</h4>
                        </div>
                        <div class="col-1 text-end">
                            <a class="btn-close" aria-label="Close" href="tampil_data.php"></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="card-body">
                    <?php

                    if (isset($_GET['update']) =='gagal') {
                        echo"<div class='alert alert-danger'><strong>Gagal!</strong> Periksa kembali data yang akan diubah dengan benar!</div>";
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
                                $file = $data['file'];
                            
                        ?>
                        <!-- menampilkan data pada inputan dengan mengatur value/ nilai yang telah disimpan dalam variabel: -->
                        
                        <input type="hidden" name="id_gu" class="form-control" value="<?= $id_gu ?>" readonly><br>
                        
                        <h6>Nomor GU : </h6>
                        <input type="text" name="no_gu" class="form-control" value="<?= $no_gu ?>" required><br>
                        
                        <h6>Nama Pemohon : </h6>
                        <input type="text" name="nmpemohon" class="form-control" value="<?= $nmpemohon ?>" required><br>
                        
                        <h6>Rak : </h6>
                        <select name="rak" class="form-control" value="<?= $rak ?>" required>
                        <option disabled>--Rak--</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                        <h6>Tingkat :</h6>
                        <select name="tingkat" class="form-control" value="<?= $tingkat ?>" required>
                            <option disabled>--Tingkat--</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                        </select>

                        <h6>Bagian : </h6>
                        <select name="bagian" class="form-control" value="<?= $bagian ?>" required>
                            <option disabled>--Bagian--</option>
                            <option>A</option>
                            <option>B</option>
                        </select>

                        <?php 
                        $year = date("Y");
                        ?>
                    
                        <h6>Tahun : </h6>
                        <input type="number" min="1945" max="<?=$year?>" name="tahun" class="form-control" value="<?= $tahun ?>" required><br>
                        
                        <h6>Desa : </h6>
                        <select name="desa" class="form-control" value="<?= $desa ?>" required>
                        <option disabled>--Desa--</option>
                            <?php 
                            include 'dft_desa.php';
                            ?>
                        </select>

                        <h6>File : </h6>
                        <input type="file" name="file" class="form-control" value="<?= $file?>"><br>
                        
                        <?php } ?>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <!-- membuat tombol update dan akan dikirim ke file proses -->
                    <button class="btn btn-primary" type="submit" name="update-data">Ubah</button>
                    <a class="btn btn-warning" href="tampil_data.php">Batal</a>
                </div>
            </form>
        </div>
    </div>

