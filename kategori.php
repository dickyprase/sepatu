<?php include('templates/header.php') ?>
<?php require('proses/produk/kategori.php') ?>

<div class="wrapper">
<div class="body-overlay"></div>


<?php include('templates/sidebar.php') ?>

<div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>
					
					<a class="navbar-brand" href="#"> Kategori </a>
					
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
                <h4 class="card-title">List Kategori</h4><br>
                <!-- Tombol untuk menampilkan modal-->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"> <strong>+</strong> Kategori</button>

            <div class="card-content table-responsive">
                <table class="table table-hover">
                    <thead class="text-primary">
                    <tr>
                        <th>Nomor</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php $result = viewSpl(); ?>
                    <?php if(!empty($result)) : ?>
                    <?php foreach($result as $data) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $data['kode_kategori']; ?></td>
                        <td><?= $data['nama_kategori']; ?></td>
                        <td>
                            <!-- Button trigger modal Upload -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit<?= $data['kode_kategori']; ?>">
                                Edit
                            </button>
                            <!-- Button trigger modal Hapus -->
                            <a href="proses/produk/delete_kategori.php?kode=<?= $data['kode_kategori'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data Supplier <?= $data['nama_kategori'] ?> ?');">
                                Hapus
                    </a>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
<div id="edit<?= $data['kode_supplier']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Supplier</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- body modal -->
            <form action="proses/inventori/edit_supplier.php" method="POST">
            <?php
                $kode = $data['kode_supplier']; 
                $query_edit = $mysqli->query("SELECT * FROM supplier WHERE kode_supplier='$kode'");
                while ($row = $query_edit->fetch_array()) :  
            ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode" class="col-form-label">Kode Supplier</label>
                        <input value="<?= $row['kode_supplier'] ?>" type="text" class="form-control" name="kode" id="kode" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama Supplier</label>
                        <input value="<?= $row['nama'] ?>" type="nama" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="no" class="col-form-label">No Telp Supplier</label>
                        <input value="<?= $row['no_telp'] ?>" type="number" class="form-control" name="no" id="no">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="col-form-label">Alamat Supplier</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="3"><?= $row['alamat'] ?></textarea>
                    </div>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="submit" name="editsupplier" class="btn btn-primary" >Simpan Data</button>
                </div>
                <?php endwhile; ?>
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
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode" class="col-form-label">Kode Supplier</label>
                        <input value="<?= prefixSupplier() ?>" type="text" class="form-control" name="kode" id="kode" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama Supplier</label>
                        <input type="nama" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="no" class="col-form-label">No Telp Supplier</label>
                        <input type="number" class="form-control" name="no" id="no">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="col-form-label">Alamat Supplier</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="3"></textarea>
                    </div>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="submit" name="newsupplier" class="btn btn-primary" >Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>



					
<?php include('templates/footer.php') ?>