<?php 
require('../../function/function.php');

if (isset($_POST['editsupplier'])) {
    $kode   = $_POST['kode'];
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];

    editSpl($kode, $nama, $alamat);
}