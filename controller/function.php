<?php
    session_start();

    if (isset($_POST['update-user'])){

    $id_user = $_POST['id_user'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];
    $pswd = mysqli_real_escape_string($koneksi, $_POST["pswd"]);
    $newpass = mysqli_real_escape_string($koneksi, $_POST["newpass"]);
    $newpass2 = mysqli_real_escape_string($koneksi, $_POST["newpass2"]);
    
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id_user='$id_user'");

    if ($newpass !== $newpass2) {
        header("Location:update-user.php?pass=tidakcocok");
        return false;
    }

    if (mysqli_num_rows($query) > 0) {

        $data = mysqli_fetch_assoc($query);
        $passwordhash = $data['password'];

      if (password_verify($pswd, $passwordhash)) {
        $passwordhash = password_hash($newpass, PASSWORD_DEFAULT);
      }
    }
    
    $file = $_FILES['file']['name'];
    $profil = array('jpg', 'png');
    $source = $_FILES['file']['tmp_name'];
    $folder = '../asset/img-user/';
    $ekstensi = strtolower(end(explode('.', $_FILES['file']['name'])));
    $profil_ekstensi = in_array($ekstensi, $profil, $folder.$file);
    
    
    $data = mysqli_fetch_array($query);
    
        if(empty($file)) {
            mysqli_query($koneksi, "Update tbl_user set nip='$nip', nama='$nama', password='$passwordhash', level='$level', tgl=current_timestamp() where id_user='$id_user'"); 
            header("location:data_user.php?update=berhasil");

        } else{
            if(!$pdf_ekstensi) {       
                header("Location:update_user.php?update=gagal&&id_user=$id_user");
                exit;
            } else {

            $update = $data['file'];
            unlink("../asset/img-user/".$update);
            move_uploaded_file($source, $folder.$file);
            mysqli_query($koneksi, "Update tbl_user set nip='$nip', nama='$nama', level='$level', password='$passwordhash', tgl=current_timestamp(), file='$file' where id_user='$id_user'"); 
            header("location:tampil_dataa.php?update=berhasil");            
        }
        exit;
    }
    
}

if (isset($_POST['update-data'])){
        $id_gu = $_POST['id_gu'];
        $no_gu = $_POST['no_gu'];
        $nmpemohon = $_POST['nmpemohon'];
        $rak = $_POST['rak'];
        $tingkat = $_POST['tingkat'];
        $bagian = $_POST['bagian'];
        $tahun = $_POST['tahun'];
        $desa = $_POST['desa'];
        $kecamatan = $_POST['kec'];
        $file = $_FILES['file']['name'];
        $pdf = array('pdf');
        $source = $_FILES['file']['tmp_name'];
        $folder = '../asset/file/';
        $ekstensi = strtolower(end(explode('.', $_FILES['file']['name'])));
        $pdf_ekstensi = in_array($ekstensi, $pdf, $folder.$file);
        
        $query = mysqli_query($koneksi, "SELECT * FROM tbl_gu WHERE id_gu='$id_gu'");
        $data = mysqli_fetch_array($query);
                
        
        
            if(empty($file)) {

                mysqli_query($koneksi, "Update tbl_gu set no_gu='$no_gu', nmpemohon='$nmpemohon', rak='$rak', tingkat='$tingkat', bagian='$bagian', tahun='$tahun', desa='$desa', kecamatan='$kecamatan', tgl=current_timestamp() where id_gu='$id_gu'"); 
                header("location:tampil_data.php?update=berhasil");

            } else{
                if(!$pdf_ekstensi) {
            
                    header("Location:update_dataa.php?update=gagal&&id_gu=$id_gu");
                    exit;
                } else {

                $update = $data['file'];
                unlink("../asset/file/".$update);
                move_uploaded_file($source, $folder.$file);
                mysqli_query($koneksi, "Update tbl_gu set no_gu='$no_gu', nmpemohon='$nmpemohon', rak='$rak', tingkat='$tingkat', bagian='$bagian', tahun='$tahun', desa='$desa', kecamatan='$kecamatan', tgl=current_timestamp(), file='$file' where id_gu='$id_gu'"); 
                header("location:tampil_dataa.php?update=berhasil");
                
            }
            exit;
        }
        
    }

//proses insert data 
if (isset($_POST['add-data'])){
        
        $no_gu = htmlspecialchars($_POST['no_gu']);
        $nmpemohon = htmlspecialchars($_POST['nmpemohon']);
        $rak = htmlspecialchars($_POST['rak']);
        $tingkat = htmlspecialchars($_POST['tingkat']);
        $bagian = htmlspecialchars($_POST['bagian']);
        $tahun = htmlspecialchars($_POST['tahun']);
        $desa = htmlspecialchars($_POST['desa']);
        $kecamatan = htmlspecialchars($_POST['kec']);
        $file = $_FILES['file']['name'];
        $pdf = array('pdf');
        $source = $_FILES['file']['tmp_name'];
        $folder = '../asset/file/';
        $ekstensi = strtolower(end(explode('.', $_FILES['file']['name'])));
        $pdf_ekstensi = in_array($ekstensi, $pdf, $folder.$file);


        
        if(!$pdf_ekstensi){
            echo 'Gagal';
            header("location:tambah_dataa.php?add=gagal");
        } else {
            move_uploaded_file($source, $folder.$file);

            mysqli_query($koneksi,"INSERT INTO `tbl_gu` (`id_gu`, `no_gu`, `nmpemohon`, `rak`, `tingkat`, `bagian`, `tahun`, `desa`, `kecamatan`, `tgl`, `file`) 
            VALUES ('', '$no_gu', '$nmpemohon', '$rak', '$tingkat', '$bagian', '$tahun', '$desa', '$kecamatan', current_timestamp(), '$file')");
            echo 'Berhasil';
            header("location:tambah_dataa.php?add=berhasil");
            
        }
      exit;
   
}

//proses hapus data user
if (isset($_POST['delete-user'])){
    $id_user = $_POST['id_user'];

    $hapus = mysqli_query($koneksi,"delete from tbl_user where id_user='$id_user'");

    if($hapus){
        echo 'Berhasil';
        header("location:data_user.php?hapus=berhasil");
    } else {
        echo 'Gagal';
        header("location:data_user.php?hapus=gagal");
    }
    exit;
  
}

if (isset($_POST['delete-data'])){
    $id_gu = $_POST['id_gu'];

    $hapus = mysqli_query($koneksi,"delete from tbl_gu where id_gu='$id_gu'");

    if($hapus){
        echo 'Berhasil';
        header("location:tampil_data.php?hapus=berhasil");
    } else {
        echo 'Gagal';
        header("location:tampil_data.php?hapus=gagal");
    }
    exit;
  
}

if (isset($_POST['daftar'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $password2 = mysqli_real_escape_string($koneksi, $_POST['password2']);
    $level = $_POST['level'];



    if ($password !== $password2) {
        header("Location:add-user.php?pass=tidakcocok");
    return false;
    }

    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

    $daftar = mysqli_query($koneksi, "INSERT INTO tbl_user VALUES('', '$nip', '$nama', '$passwordhash', '$level')");
    
    if ($daftar) {
        header("Location:data_user.php?daftar=berhasil");
    } else {
        header("Location:add-user.php?daftar=gagal");
    }
    exit;

}

if (isset($_POST['login'])) {
    
    $nip = $_POST['nip'];
    $pswd = mysqli_real_escape_string($koneksi, $_POST["password"]);
    
    if ($nip == '' OR $pswd == '') {
      $err .= '<li style="display:block">Silahkan masukkan NIP dan Password</li>';
    }

    $que = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE nip='$nip'");
    
    if (mysqli_num_rows($que) > 0) {

        $data = mysqli_fetch_assoc($que);
        $passwordhash = $data['password'];

      if (password_verify($pswd, $passwordhash)) {
        
        // $_SESSION['login'] = true;
        if ($data['level'] == 'admin' ) {
            $_SESSION['nip'] = $nip;
            $_SESSION['level'] = 'admin';
            header("Location:tampil_data.php");
        } else
        if ($data['level'] == 'asn' ) {
            $_SESSION['nip'] = $nip;
            $_SESSION['level'] = 'asn';
            header("Location:searching_nomor.php");
        }
      
      } else {
       
        header("Location:index.php?login=gagal");

        }
    }
}

