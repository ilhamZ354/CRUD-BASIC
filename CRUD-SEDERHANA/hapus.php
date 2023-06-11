<?php
$con = mysqli_connect('localhost', 'root', '', 'coba');

$idobat = $_GET['obatid'];
$sql = $con->query("DELETE FROM obat WHERE obatId = $idobat");
if($sql){    header("Location:index.php");
}
?>