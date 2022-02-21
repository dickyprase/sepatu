<?php 
require ('../../function/function.php');

$kode = $_GET['kode'];

if (isset($kode)) {
    deletePbl($kode);
}