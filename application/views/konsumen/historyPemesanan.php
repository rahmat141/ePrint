<main class="ps-main">
	<div style="text-align: center;padding-top: 20px;">
		<h1>History Pemesanan</h1>
	</div>
	<div class="ps-blog-grid pt-40 pb-80">
		<div class="ps-container">

			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
						<div class="form-row">
							<!-- <table class="table">
								<thead>
									<tr>
									<th scope="col">No.</th>
									<th scope="col">Kategori</th>
									<th scope="col">Jumlah Barang</th>
									<th scope="col">Total harga</th>
									<th scope="col">Status Pesanan</th>
									<th scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>
                                    <?php
									$no = 1;
									foreach ($allPesanan as $pesanan) :
										$hasil_rupiah = 'Rp ' . number_format($pesanan['total_harga'], 2, ',', '.');
									?>
									<tr>
										<th scope="row"><?= $no++ ?></th>
										<td><?= $pesanan['nama_kategori'] ?></td>
										<td><?= $pesanan['jumlah_barang'] ?></td>
										<td><?= $hasil_rupiah ?></td>
										<td><?= $pesanan['status_pesanan'] ?></td>
										<td><a href="" class="btn btn-primary">Cetak Invoice</a></td>
                                    </tr>
                                    <?php endforeach;
									?>
								</tbody>
										
							</table> -->
							<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
							<?= $this->session->userdata('id_user'); ?>
								<thead>
									<tr>
										<th scope="col">No.</th>
										<th scope="col">Jumlah Barang</th>
										<th scope="col">Total harga</th>
										<th scope="col">Status Pesanan</th>
										<th scope="col">Action</th>
								</thead>

								<tbody>
									<?php
									$no = 1;
									foreach ($allPesanan as $pesanan) :
										$hasil_rupiah = 'Rp ' . number_format($pesanan['total_harga'], 2, ',', '.');
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td></td>
											<td><?= $hasil_rupiah ?></td>
											<td><?= $pesanan['status_pesanan'] ?></td>
											<td>
											<a href="" class="btn btn-info">Rincian</a>
											<?php if(strpos($pesanan['status_pesanan'], 'dibatalkan') === FALSE): ?>
											<a href="" class="btn btn-success">Beri Penilaiian</a>
											<a href="" class="btn btn-primary">Cetak Invoice</a>
											<?php endif; ?>
											</td>
										</tr>

									<?php endforeach; ?>
								</tbody>
							</table>


						</div>
					</div>



				</div>







			</div>




		</div>
	</div>
	</div>