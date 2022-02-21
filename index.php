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
					
					<a class="navbar-brand" href="#"> Dashboard </a>
					
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
			
			<div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-warning">
                                       <span class="material-icons">equalizer</span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Data Supplier</strong></p>
                                    <h3 class="card-title"><?= rowsSupplier(); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-rose">
                                       <span class="material-icons">face</span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Data Bahan Dasar</strong></p>
                                    <h3 class="card-title"><?= rowsBahan(); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-success">
                                        <span class="material-icons">local_shipping</span>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Data Stok Gudang</strong></p>
                                    <h3 class="card-title"><?= rowsStok(); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
					<div class="row ">
                        <div class="col-lg-12 col-md-12">
                            <div class="card" style="min-height: 300px">
                            <div class="card-content">
                                <h1>Dashboard</h1>
                            </div>
                            </div>
                        </div>
                    </div>
					
					
<?php include('templates/footer.php') ?>