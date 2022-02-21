<?php 
require ('../../function/function.php');

$id = $_GET['id'];

if (isset($id)) {
    deleteStok($id);
}