<?php 
require('../../function/function.php');

if (isset($_POST['tostok'])) {
    $kode   = $_POST['kode'];
    $nama = $_POST['nama'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];

    // var_dump($_POST);
    toStok($kode, $nama, $qty, $satuan);
}