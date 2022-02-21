<?php 
require('../../function/function.php');

if (isset($_POST['newbahan'])) {
    $kode   = $_POST['kode'];
    $nama   = $_POST['nama'];
    $satuan   = $_POST['satuan'];

    insertBd($kode, $nama, $satuan);
}