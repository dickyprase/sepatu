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
					
					<a class="navbar-brand" href="#"> Stok Gudang </a>
					
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
                <h4 class="card-title">List Stok Gudang</h4><br>

            <div class="card-content table-responsive">
                <table class="table table-hover">
                    <thead class="text-primary">
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Bahan Dasar</th>
                        <th>Stok Real Gudang</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php $result = viewStok(); ?>
                    <?php if(!empty($result)) : ?>
                    <?php foreach($result as $data) : ?>
                    <tr>

                        <td><?= $i++ ?></td>
                        <td><?= $data['nama_bahan']; ?></td>
                        <td><?= $data['stok']; ?> <?= $data['satuan'] ?></td>
                        <td>
                            <!-- Button trigger modal Upload -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit<?= $data['id_stok']; ?>">
                                Edit
                            </button>
                            <!-- Button trigger modal Hapus -->
                            <a href="proses/inventori/delete_stok.php?id=<?= $data['id_stok'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data <?= $data['nama_bahan'] ?> ?');">
                                Hapus
                    </a>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
<div id="edit<?= $data['id_stok']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h4 class="modal-title">Update Stok Real Gudang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- body modal -->
            <form action="proses/inventori/edit_stok.php" method="POST">
            <?php
                $kode = $data['id_stok']; 
                $query_edit = $mysqli->query("SELECT * FROM stok_gudang WHERE id_stok='$kode'");
                while ($row = $query_edit->fetch_array()) :  
            ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="stok" class="col-form-label">Stok Real Gudang</label>
                        <input value="<?= $row['stok'] ?>" type="number" class="form-control" name="stok" id="stok">
                        <input value="<?= $row['id_stok'] ?>" type="hidden" name="id">
                    </div>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="submit" name="editstok" class="btn btn-primary" >Simpan Data</button>
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
                    


</div>



					
<?php include('templates/footer.php') ?>