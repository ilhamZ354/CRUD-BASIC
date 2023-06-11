<?php

$con = mysqli_connect('localhost', 'root', '', 'coba');


$sql = "SELECT * FROM obat";
$query = $con->query($sql);
$tabel = $query->fetch_all();

if (isset($_POST['obat'])) {
    $obat = $_POST['obat'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO obat VALUE (null,'$obat','$harga')";
    $sql = $con->query($query);
    if($sql){
        header("Location:index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-LATIHAN</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.grid.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container shadow-sm mt-3">
    <div class="row justify-content-center">
        <div class="col text-center bg-warning">
            <h1>DAFTAR OBAT RUMAH SAKIT</h1>
        </div>
    </div>

<div class="container-fluid shadow-sm bg-light">
<form method="post">
  <div class="mb-3 mt-3">
    <label for="exampleInputEmail1" class="form-label mt-3">Nama Obat :</label>
    <input type="text" class="obat" id="nama_obat" aria-describedby="emailHelp" name="obat"><br>
    <label for="exampleInputEmail1" class="form-label">Harga Obat :</label>
    <input type="text" class="harga" id="harga" aria-describedby="emailHelp" name="harga"><br>
    <button type="submit" class="btn btn-primary"><i class="bi bi-plus"></i>+ tambah</button>
  </div>
</form>
</div>

    <table class="table">
        <thead>
            <tr>
            <th >Id</th>
            <th>Nama Obat</th>
            <th>Harga Obat</th>
            <th colspan="1" ></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tabel as $kolom) { ?>
                <tr>
                    <td><?= $kolom[0] ?></td>
                    <td><?= $kolom[1] ?></td>
                    <td><?= $kolom[2] ?></td>
                    <td><a href="edit.php?obatid=<?=$kolom[0]?>" class="btn btn-info">edit
                    <a href="hapus.php?obatid=<?=$kolom[0]?>" class="btn btn-warning">hapus</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>