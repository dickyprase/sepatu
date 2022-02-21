<?php 

if (isset($_POST['newsupplier'])) {
    $kode   = $_POST['kode'];
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];

    insertSpl($kode, $nama, $alamat, $no);
}