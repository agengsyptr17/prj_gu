<?php
include 'header.php';
include 'navbar.php'
?>

<body class="container-fluid">

    <!-- mengatur ukuran halaman website -->
    <div class="container-sm">
        <br>
        <h1 class="text-center">
            <br>
            DATA AKUN PENGGUNA
        </h1>

        <!-- membuat tombol untuk mengarahkan ke halaman input data siswa -->
        <div class="col text-start">
            <a class="btn btn-primary" href="add-user.php">Tambah Data</a>
        </div>

        <br>
        
        <!-- membuat tampilan card -->
        <div class="card">
            <!-- card body -->
            <div class="card-body">
                <!-- membuat alert untuk menampilkan pesan (berhasil atau gagal)-->
                <?php
                    if (isset($_GET['hapus'])) {
                                            
                        if ($_GET['hapus']=='berhasil'){
                            echo'<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Berhasil!</strong> Berhasil Menghapus User!</div>';
                        }else if ($_GET['hapus']=='gagal'){
                            echo'<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Gagal!</strong> Gagal Menghapus User!</div>';
                        }   
                    }
                    if (isset($_GET['update']) =='berhasil' ) {               
                            echo"<div class='alert alert-success'><strong>Berhasil!</strong> Berhasil Mengubah Data User!</div>";
                        }     
                ?>
                
                <!-- membuat tabel untuk menampilkan data dari database -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <!-- membuat tabel header unuk nama kolom -->
                            <th scope="col">No.</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama Pengguna</th>
                            <th scope="col">Level</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <!-- tbody untuk menampilkan data dari database -->
                    <tbody>
                        <?php 
                        // membuat query untuk menampilkan data
                        $query = mysqli_query($koneksi,"SELECT * FROM tbl_user");
                        // membuat variabel $no untuk membuat nomor urut data
                        $no = 1;
                        // membuat variabel $count untuk menghitung jumlah data
                        $count = mysqli_num_rows($query);
                        // perulangan while, digunakan untuk menampilkan data dengan mysqli_fetch_assoc
                        while ($data = mysqli_fetch_assoc($query)) 
                        {
                            // menyimpan data dalam bentuk variabel agar mudah saat pemanggilan
                            $id_user = $data['id_user'];
                            $nip = $data['nip'];
                            $nama = $data['nama'];
                            $level = $data['level'];
                        

                        ?>
                        <tr>
                            <!-- menampilkan data pada tabel dengan memanggil variabel -->
                            <td><?= $no++ ?></td>
                            <td><?= $nip ?></td>
                            <td><?= $nama ?></td>
                            <td><?= $level ?></td>

                            <td>
                                <!-- Membuat form untuk mengirim nis, yang digunakan untuk proses update dan delete -->
                                <form method="Post">
                                    <input type="hidden" name="id_user" value="<?= $id_user ?>">
                                    <a class="btn btn-warning" abbr title="Ubah" href="update-user.php?id_user=<?= $id_user ?>"><i class='far fa-edit' style="color:white;"></i></a>
                                    <button name="delete-user" abbr title="Hapus" class="btn btn-danger"><i class='far fa-trash-alt'></i></button>
                                </form>
                            </td>

                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <h6>Jumlah Data Pengguna : <?php echo $count; ?></h6>
            </div>
        </div>
    </div>
    </div>


    </div>
    <?php include 'footer.php'; ?>