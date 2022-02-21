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
					
					<a class="navbar-brand" href="#"> Bahan Dasar </a>
					
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
                <h4 class="card-title">List Bahan Dasar</h4><br>
                <!-- Tombol untuk menampilkan modal-->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"> <strong>+</strong> Bahan Dasar</button>

            <div class="card-content table-responsive">
                <table class="table table-hover">
                    <thead class="text-primary">
                    <tr>
                        <th>Nomor</th>
                        <th>Kode Bahan Dasar</th>
                        <th>Nama Bahan Dasar</th>
                        <th>Satuan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php $result = viewBd(); ?>
                    <?php if(!empty($result)) : ?>
                    <?php foreach($result as $data) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $data['kode_bahan']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['satuan']; ?></td>
                        <td>
                            <!-- Button trigger modal Upload -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit<?= $data['kode_bahan']; ?>">
                                Edit
                            </button>
                            <!-- Button trigger modal Hapus -->
                            <a href="proses/inventori/delete_bd.php?kode=<?= $data['kode_bahan'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data Bahan Dasar <?= $data['nama'] ?> ?');">
                                Hapus
                    </a>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
<div id="edit<?= $data['kode_bahan']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Bahan Dasar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- body modal -->
            <form action="proses/inventori/edit_bd.php" method="POST">
            <?php
                $kode = $data['kode_bahan']; 
                $query_edit = $mysqli->query("SELECT * FROM bahan_dasar WHERE kode_bahan='$kode'");
                while ($row = $query_edit->fetch_array()) :  
            ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode" class="col-form-label">Kode Bahan Dasar</label>
                        <input value="<?= $row['kode_bahan'] ?>" type="text" class="form-control" name="kode" id="kode" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama Bahan Dasar</label>
                        <input value="<?= $row['nama'] ?>" type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="satuan" class="col-form-label">Nama Satuan</label>
                        <input value="<?= $row['satuan'] ?>" type="text" class="form-control" name="satuan" id="satuan">
                    </div>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="submit" name="editbahan" class="btn btn-primary" >Simpan Data</button>
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
                <h4 class="modal-title">Tambah Bahan Dasar Baru</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- body modal -->
            <form action="proses/inventori/add_bd.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode" class="col-form-label">Kode Bahan Dasar</label>
                        <input value="<?= prefixBd() ?>" type="text" class="form-control" name="kode" id="kode" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama Bahan Dasar</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="satuan" class="col-form-label">Nama satuan <i>contoh : centimeter</i> </label>
                        <input type="text" class="form-control" name="satuan" id="satuan">
                    </div>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="submit" name="newbahan" class="btn btn-primary" >Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>



					
<?php include('templates/footer.php') ?>