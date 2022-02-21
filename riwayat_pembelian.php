<?php include('templates/header.php') ?>

<div class="wrapper">
<div class="body-overlay"></div>


<?php include('templates/sidebar.php') ?>

<div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>
					
					<a class="navbar-brand" href="#"> Riwayat Pembelian </a>
					
                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="material-icons">more_vert</span>
                    </button>

                    <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">   
							<li class="nav-item">
                                <a class="nav-link" href="../index.php">
								<span class="material-icons">logout</span>
								</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
	    </div>
			
<div class="main-content">

<div class="row ">
    <div class="col-lg-12 col-md-12">
        <div class="card" style="min-height: 485px">
            <div class="card-header card-header-text">
                <h4 class="card-title">List Riwayat Pembelian</h4><br>
                <!-- Tombol untuk menampilkan modal-->

            <div class="card-content table-responsive">
                <table id="dataTable" class="table table-hover">
                    <thead class="text-primary">
                    <tr>
                        <th>Nomor</th>
                        <th>Tanggal Pembelian</th>
                        <th>Kode Pembelian</th>
                        <th>Nama Bahan</th>
                        <th>Satuan</th>
                        <th>Supplier</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php $result = viewRiwayatPbl(); ?>
                    <?php if(!empty($result)) : ?>
                    <?php foreach($result as $data) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td><?= $data['kode_pembelian']; ?></td>
                        <td><?= $data['nama_bahan']; ?></td>
                        <td><?= $data['satuan']; ?></td>
                        <td><?= $data['supplier']; ?></td>
                        <td><?= number_format($data['harga']); ?></td>
                        <td><?= $data['qty']; ?></td>
                        <td><?= number_format($data['subtotal']); ?></td>
                    </tr>

                    <div id="edit<?= $data['kode_pembelian']; ?>" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h4 class="modal-title">Pindah data ke stok gudang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- body modal -->
            <form action="proses/inventori/to_stok.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="qty" class="col-form-label">Quantity Real</label>
                        <input value="<?= $data['qty']; ?>" type="number" class="form-control" name="qty" id="qty">
                        <input type="hidden" name="kode" value="<?= $data['kode_pembelian']; ?>">
                        <input type="hidden" name="nama" value="<?= $data['nama_bahan']; ?>">
                        <input type="hidden" name="satuan" value="<?= $data['satuan']; ?>">
                        <input type="hidden" name="harga" value="<?= $data['harga']; ?>">
                    </div>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="submit" name="tostok" class="btn btn-primary" >Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

                    <?php endforeach; ?>
                    <?php endif; ?>
                
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
                    

<!-- Modal -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Supplier Baru</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- body modal -->
            <form action="proses/inventori/add_pembelian.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode" class="col-form-label">Kode Pembelian</label>
                        <input value="<?= prefixPembelian() ?>" type="text" class="form-control" name="kode" id="kode" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="col-form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama Bahan</label>
                        <select onchange="autofill()" name="nama" class="form-control" id="nama">
                            <option disabled selected>== Pilih Nama Bahan ==</option>
                        <?php 
                        $sql = "SELECT nama FROM bahan_dasar";
                        $query = $mysqli->query($sql); 
                        while ($row = $query->fetch_array()) :
                        ?>
                            <option value="<?= $row['nama'] ?>"><?= ucfirst($row['nama']) ?></option>
                        <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="satuan" class="col-form-label">Satuan</label>
                        <input type="text" class="form-control" name="satuan" id="satuan" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="col-form-label">Supplier</label>
                        <select name="supplier" class="form-control" id="supplier">
                            <option disabled selected>== Pilih Supplier ==</option>
                        <?php 
                        $sql = "SELECT nama FROM supplier";
                        $query = $mysqli->query($sql); 
                        while ($row = $query->fetch_array()) :
                        ?>
                            <option value="<?= $row['nama'] ?>"><?= ucfirst($row['nama']) ?></option>
                        <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="col-form-label">Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga">
                    </div>
                    <div class="mb-3">
                        <label for="qty" class="col-form-label">Quantity</label>
                        <input onkeyup="hitung()" type="text" class="form-control" name="qty" id="qty">
                    </div>
                    <div class="mb-3">
                        <label for="subtotal" class="col-form-label">Subtotal</label>
                        <input type="text" class="form-control" name="subtotal" id="subtotal" readonly>
                    </div>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="submit" name="newpembelian" class="btn btn-primary" >Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<script>
function autofill() {
    var nama = $('#nama').val();

    $.ajax({
        type: 'GET',
        url: "proses/ambilsatuan.php",
        data: 'nama=' + nama,
        success: function(data) {
            var json = data
        obj = JSON.parse(json);
        $('#satuan').val(obj.satuan);
        }
    });
}

function hitung(value) {
    var harga = parseInt(document.getElementById("harga").value);
    var qty = parseInt(document.getElementById("qty").value);
    var hasil = harga * qty;

    const formatRupiah = (money) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(money);
    }

    if (!isNaN(hasil)) {
        document.getElementById("subtotal").value = formatRupiah(hasil);
    }
}

</script>

					
<?php include('templates/footer.php') ?>