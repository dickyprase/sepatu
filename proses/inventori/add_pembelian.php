<?php 
require('../../function/function.php');

if (isset($_POST['newpembelian'])) {
    $kode   = $_POST['kode'];
    $tanggal   = $_POST['tanggal'];
    $nama = $_POST['nama'];
    $satuan = $_POST['satuan'];
    $supplier = $_POST['supplier'];
    $harga = $_POST['harga'];
    $qty = $_POST['qty'];
    $subtotal = $_POST['subtotal'];

// var_dump($_POST);
    insertPbl($kode, $tanggal, $nama, $supplier, $qty, $satuan, $harga, $subtotal);
}