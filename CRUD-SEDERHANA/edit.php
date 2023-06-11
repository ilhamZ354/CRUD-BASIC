<?php
$con = mysqli_connect('localhost', 'root', '', 'coba');

$idobat = $_GET['obatid'];
$query = $con->query(
    "SELECT * FROM obat WHERE obatId = $idobat"
);
$data = $query->fetch_assoc();
if (isset($_POST['submit'])) {
    $obat = $_POST['obat'];
    $harga = $_POST['harga'];

    $query = "UPDATE obat SET obatNama = '$obat', obatHarga = '$harga' WHERE obatId = $idobat";
    $sql = $con->query($query);
    if($sql){
        header("Location:index.php");
    }
}else if(isset($_POST['cancel'])){
    header("Location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.grid.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container shadow-sm bg-light">
<form method="post">
  <div class="mb-3 mt-3">
    <label for="exampleInputEmail1" class="form-label mt-3">Nama Obat :</label>
    <input type="text" class="obat" id="nama_obat" aria-describedby="emailHelp" name="obat" value="<?= $data['obatNama']?>"><br>
    <label for="exampleInputEmail1" class="form-label">Harga Obat :</label>
    <input type="text" class="harga" id="harga" aria-describedby="emailHelp" name="harga" value="<?= $data['obatHarga']?>"><br><br>
    <button type="submit" class="btn btn-dark" name="cancel"><i class="bi bi-plus"></i>Batal</button>
    <button type="submit" class="btn btn-primary" name="submit"><i class="bi bi-plus"></i>Edit</button>
  </div>
</form>
</div>
</form>
</body>
</html>