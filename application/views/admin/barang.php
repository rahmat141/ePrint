<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">

				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url(
																	'Barang/index/'
																); ?>">Home</a></li>
						<li class="breadcrumb-item active">Barang</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>

	<div class="content">
		<div class="container-fluid">
			<a href="<?= base_url('admin/tambahKategori') ?>" class="btn btn-success">Tambah Kategori barang</a>
			<div class="row">
				<?php foreach ($allBarang as $barang) { ?>


					<div class="col-3" style="margin-top: 15px; margin-bottom: 30px;">
						<div class="card" style="width: 18rem;">
							<img src="<?= base_url('assets/img/barang.png') ?>" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title"><?= $barang['nama_kategori'] ?></h5>
								<p class="card-text"></p>
								<a href="<?= base_url('admin/dataBarang/') . $barang['id_kategori'] ?>" class="btn btn-primary">Lihat barang</a>
							</div>
						</div>
					</div>

				<?php } ?>
			</div>



		</div>
	</div>

</div>

<!-- Modal -->