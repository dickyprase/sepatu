<?php 
require('../../function/function.php');

if (isset($_POST['editstok'])) {
    $id   = $_POST['id'];
    $stok   = $_POST['stok'];

    editStok($id, $stok);
}