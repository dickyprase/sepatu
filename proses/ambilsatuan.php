<?php 
require('../function/function.php');

$nama = $_GET['nama'];
$query = $mysqli->query("SELECT satuan FROM bahan_dasar WHERE nama='$nama'");

$data = $query->fetch_array();

echo json_encode($data);

