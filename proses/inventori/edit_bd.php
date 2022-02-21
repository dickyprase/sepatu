<?php 
require('../../function/function.php');

if (isset($_POST['editbahan'])) {
    $kode   = $_POST['kode'];
    $nama   = $_POST['nama'];
    $satuan   = $_POST['satuan'];

    editBd($kode, $nama, $satuan);
}