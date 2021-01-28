<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">

				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('Barang/index/'); ?>">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>

	<div class="content">

		<div class="container-fluid">
			<div class="row row-cols-1 row-cols-md-3">
				<div class="col mb-4">
					<div class="card">
						<img src="<?= base_url('assets/img/konsumen.jpg') ?>" class="card-img-top" alt="..." height="400">
						<div class="card-body">
							<h5 class="card-title">Jumlah Konsumen</h5>
							<p class="card-text">
								<h1 class=""><?= $countKonsumen->jml ?> <a href="" style="font-size: 20px;" class="text-primary">Konsumen</a></h1>
							</p>
						</div>
					</div>
				</div>
				<div class="col mb-4">
					<div class="card">
						<img src="<?= base_url('assets/img/vendor.png') ?>" class="card-img-top" alt="..." height="400">
						<div class="card-body">
							<h5 class="card-title">Jumlah Pesanan</h5>
							<p class="card-text">
								<h1 class=""><?= $countVendor->jml ?> <a href="" style="font-size: 20px;" class="text-info">Pesanan</a></h1>
							</p>
						</div>
					</div>
				</div>
				<div class="col mb-4">
					<div class="card">
						<img src="<?= base_url('assets/img/barang.png') ?>" class="card-img-top" alt="..." height="400" style="padding: 40px;">
						<div class="card-body">
							<h5 class="card-title">Jumlah Barang</h5>
							<p class="card-text">
								<h1 class=""><?= $countBarang->jml ?> <a href="" style="font-size: 20px;" class="text-warning">Barang</a></h1>
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>


	</div>

</div>

<!-- Modal -->
