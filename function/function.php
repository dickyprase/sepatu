<?php 

require 'Database.php';
$db = new Database();
$mysqli = $db->connect();

// Dashboard
function rowsSupplier() {
    global $mysqli;

    $sql = "SELECT * FROM supplier";
    $view = $mysqli->query($sql);
    $result = $view->num_rows;

    return $result;
}

function rowsBahan() {
    global $mysqli;

    $sql = "SELECT * FROM bahan_dasar";
    $view = $mysqli->query($sql);
    $result = $view->num_rows;

    return $result;
}

function rowsStok() {
    global $mysqli;

    $sql = "SELECT * FROM stok_gudang";
    $view = $mysqli->query($sql);
    $result = $view->num_rows;

    return $result;
}

// Supplier
function viewSpl() {
    global $mysqli;

    $sql = "SELECT * FROM supplier";
    $view = $mysqli->query($sql);

    $result = [];
    while ($data = $view->fetch_assoc()) {
        $result[] = $data;
    }

    return $result;
}

function prefixSupplier() {
    global $mysqli;

    $sql = "SELECT max(kode_supplier) as MaxKode FROM supplier";
    $hasil = $mysqli->query($sql);
    $data = $hasil->fetch_array();
    $kdSupplier = $data['MaxKode'];
    
    $noUrut = (int) substr($kdSupplier, 3, 3);
    $noUrut++;
    $char = "SPL";
    
    $kdSupplier = $char . sprintf("%03s", $noUrut);
    return $kdSupplier;

}

function insertSpl($kode, $nama, $alamat, $no) {
    global $mysqli;

    $kode = $mysqli->real_escape_string($kode);
    $nama = $mysqli->real_escape_string($nama);
    $alamat = $mysqli->real_escape_string($alamat);
    $no = $mysqli->real_escape_string($no);

    $sql = "INSERT INTO supplier VALUES('$kode', '$nama', '$alamat', '$no')";
    $input = $mysqli->query($sql);

    if ($input) {
        header("location: supplier.php");
    } else {
        echo "<script>alert('Data gagal disimpan'); window.location.href='../../supplier.php'</script>";
    }
}

function editSpl($kode, $nama, $alamat) {
    global $mysqli;

    $kode = $mysqli->real_escape_string($kode);
    $nama = $mysqli->real_escape_string($nama);
    $alamat = $mysqli->real_escape_string($alamat);

    $sql = "UPDATE supplier SET nama='$nama', alamat='$alamat' WHERE kode_supplier='$kode'";
    $update = $mysqli->query($sql);

    if ($update) {
        echo "<script>alert('Data sukses diubah'); window.location.href='../../supplier.php'</script>";
    } else {
        echo "<script>alert('Data gagal diubah'); window.location.href='../../supplier.php'</script>";
    }
}

function deleteSpl($kode) {
    global $mysqli;

    $sql = "DELETE FROM supplier WHERE kode_supplier='$kode'";
    $delete = $mysqli->query($sql);

    if ($delete) {
        echo "<script>alert('Data sukses dihapus'); window.location.href='../../supplier.php'</script>";
    } else {
        echo "<script>alert('Data gagal dihapus'); window.location.href='../../supplier.php'</script>";
    }
}


// Bahan Dasar
function viewBd() {
    global $mysqli;

    $sql = "SELECT * FROM bahan_dasar";
    $view = $mysqli->query($sql);

    $result = [];
    while ($data = $view->fetch_assoc()) {
        $result[] = $data;
    }

    return $result;
}

function prefixBd() {
    global $mysqli;

    $sql = "SELECT max(kode_bahan) as MaxKode FROM bahan_dasar";
    $hasil = $mysqli->query($sql);
    $data = $hasil->fetch_array();
    $kdSupplier = $data['MaxKode'];
    
    $noUrut = (int) substr($kdSupplier, 3, 3);
    $noUrut++;
    $char = "BHN";
    
    $kdSupplier = $char . sprintf("%03s", $noUrut);
    return $kdSupplier;

}

function insertBd($kode, $nama, $satuan) {
    global $mysqli;

    $kode = $mysqli->real_escape_string($kode);
    $nama = $mysqli->real_escape_string($nama);
    $satuan = $mysqli->real_escape_string($satuan);

    $sql = "INSERT INTO bahan_dasar VALUES('$kode', '$nama', '$satuan')";
    $input = $mysqli->query($sql);

    if ($input) {
        echo "<script>alert('Data sukses disimpan'); window.location.href='../../bahanDasar.php'</script>";
    } else {
        echo "<script>alert('Data gagal disimpan'); window.location.href='../../bahanDasar.php'</script>";
    }
}

function editBd($kode, $nama, $satuan) {
    global $mysqli;

    $kode = $mysqli->real_escape_string($kode);
    $nama = $mysqli->real_escape_string($nama);
    $satuan = $mysqli->real_escape_string($satuan);

    $sql = "UPDATE bahan_dasar SET nama='$nama', satuan='$satuan' WHERE kode_bahan='$kode'";
    $update = $mysqli->query($sql);

    if ($update) {
        echo "<script>alert('Data sukses diubah'); window.location.href='../../bahanDasar.php'</script>";
    } else {
        echo "<script>alert('Data gagal diubah'); window.location.href='../../bahanDasar.php'</script>";
    }
}

function deleteBd($kode) {
    global $mysqli;

    $sql = "DELETE FROM bahan_dasar WHERE kode_bahan='$kode'";
    $delete = $mysqli->query($sql);

    if ($delete) {
        echo "<script>alert('Data sukses dihapus'); window.location.href='../../bahanDasar.php'</script>";
    } else {
        echo "<script>alert('Data gagal dihapus'); window.location.href='../../bahanDasar.php'</script>";
    }
}


// Pembelian
function viewPembelian() {
    global $mysqli;

    $sql = "SELECT * FROM pembelian WHERE status=0 ORDER BY kode_pembelian DESC";
    $view = $mysqli->query($sql);

    $result = [];
    while ($data = $view->fetch_assoc()) {
        $result[] = $data;
    }

    return $result;
}

function viewRiwayatPbl() {
    global $mysqli;

    $sql = "SELECT * FROM pembelian WHERE status=1 ORDER BY tanggal DESC";
    $view = $mysqli->query($sql);

    $result = [];
    while ($data = $view->fetch_assoc()) {
        $result[] = $data;
    }

    return $result;
}

function prefixPembelian() {
    global $mysqli;

    $sql = "SELECT max(kode_pembelian) as MaxKode FROM pembelian";
    $hasil = $mysqli->query($sql);
    $data = $hasil->fetch_array();
    $kdPembelian = $data['MaxKode'];
    
    $noUrut = (int) substr($kdPembelian, 3, 3);
    $noUrut++;
    $char = "PBL";
    
    $kdPembelian = $char . sprintf("%03s", $noUrut);
    return $kdPembelian;

}

function insertPbl($kode, $tanggal, $nama, $supplier, $qty, $satuan, $harga, $subtotal) {
    global $mysqli;

    $kode   = $mysqli->real_escape_string($kode);
    $tanggal   = $mysqli->real_escape_string($tanggal);
    $nama = $mysqli->real_escape_string($nama);
    $satuan = $mysqli->real_escape_string($satuan);
    $supplier = $mysqli->real_escape_string($supplier);
    $harga = $mysqli->real_escape_string($harga);
    $qty = $mysqli->real_escape_string($qty);
    $subtotal = $mysqli->real_escape_string($subtotal);
    $subtotal = preg_replace("/[^0-9]/", "", $subtotal);

    $sql = "INSERT INTO pembelian VALUES('$kode', '$tanggal', '$nama', '$supplier', $qty, '$satuan', $harga, $subtotal, 0)";
    $input = $mysqli->query($sql);

    if ($input) {
        echo "<script>alert('Data sukses disimpan'); window.location.href='../../pembelian.php'</script>";
    } else {
        echo "<script>alert('Data gagal disimpan'); window.location.href='../../pembelian.php'</script>";
    }
}

function deletePbl($kode) {
    global $mysqli;

    $sql = "DELETE FROM pembelian WHERE kode_pembelian='$kode'";
    $delete = $mysqli->query($sql);

    if ($delete) {
        echo "<script>alert('Data sukses dihapus'); window.location.href='../../pembelian.php'</script>";
    } else {
        echo "<script>alert('Data gagal dihapus'); window.location.href='../../pembelian.php'</script>";
    }
}

// to stok
function toStok($kode, $nama, $qty, $satuan) {
    global $mysqli;

    $kode   = $mysqli->real_escape_string($kode);
    $qty   = $mysqli->real_escape_string($qty);
    $nama = $mysqli->real_escape_string($nama);
    $satuan = $mysqli->real_escape_string($satuan);

    $sql = "UPDATE pembelian SET status=1 WHERE kode_pembelian='$kode'";
    $query = $mysqli->query($sql);
    
    $q = $mysqli->query("SELECT * FROM stok_gudang WHERE nama_bahan='$nama'");
    $cek = $q->num_rows;
    $data = $q->fetch_array();

    if ($cek > 0) {
        $hasil = $data['stok'] + $qty;
        $sqll = "UPDATE stok_gudang SET stok=$hasil WHERE nama_bahan='$nama'";
        
        if($mysqli->query($sqll)) {
            echo "<script>alert('Data sukses disimpan'); window.location.href='../../pembelian.php'</script>";
        } else {
            echo "<script>alert('Data gagal disimpan'); window.location.href='../../pembelian.php'</script>";
        }
    } else {
        $sql2 = "INSERT INTO stok_gudang VALUES(null, '$nama', '$satuan', '$qty')";
        $query2 = $mysqli->query($sql2);
    
        if ($query2) {
            echo "<script>alert('Data sukses disimpan'); window.location.href='../../pembelian.php'</script>";
        } else {
            echo "<script>alert('Data gagal disimpan'); window.location.href='../../pembelian.php'</script>";
        }        
    }

}


// Stok
function viewStok() {
    global $mysqli;

    $sql = "SELECT * FROM stok_gudang";
    $view = $mysqli->query($sql);

    $result = [];
    while ($data = $view->fetch_assoc()) {
        $result[] = $data;
    }

    return $result;
}

function editStok($id, $stok) {
    global $mysqli;

    $id   = $mysqli->real_escape_string($id);
    $stok   = $mysqli->real_escape_string($stok);

    $sql = "UPDATE stok_gudang SET stok=$stok WHERE id_stok='$id'";
    $query = $mysqli->query($sql);

    if ($query) {
        echo "<script>alert('Data sukses disimpan'); window.location.href='../../stokGudang.php'</script>";
    } else {
        echo "<script>alert('Data gagal disimpan'); window.location.href='../../stokGudang.php'</script>";
    }
}

function deleteStok($id) {
    global $mysqli;

    $sql = "DELETE FROM stok_gudang WHERE id_stok='$id'";
    $delete = $mysqli->query($sql);

    if ($delete) {
        echo "<script>alert('Data sukses dihapus'); window.location.href='../../stokGudang.php'</script>";
    } else {
        echo "<script>alert('Data gagal dihapus'); window.location.href='../../stokGudang.php'</script>";
    }
}