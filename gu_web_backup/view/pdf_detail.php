<?php
 require('../config/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Detail</title>
</head>
<body>
    <div class="container">
        <?php
            $id_gu = $_GET['id_gu'];
            $query=mysqli_query($koneksi, "select * from tbl_gu where id_gu='$id_gu'");
            while($data=mysqli_fetch_array($query)){
                $file = $data['file'];
        ?>
    <object data="../asset/file/<?= $file ?>" width="100%" 
    height="1000px" style="border: 1px solid;"></object>
    <br>
    <br>
        <?php
            }
         ?>
    </div>
</body>
</html>