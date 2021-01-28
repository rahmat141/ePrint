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
							<table class="table">
								<thead>
									<tr>
									<th scope="col">No.</th>
									<th scope="col">Kategori</th>
									<th scope="col">Jumlah Barang</th>
									<th scope="col">Total harga</th>
									<th scope="col" colspan="2">Status Pesanan</th>
									</tr>
								</thead>
								<tbody>
                                    <?php
									$no = 1;
									foreach ($allPesanan as $pesanan): 
										$hasil_rupiah = 'Rp ' . number_format($pesanan['total_harga'],2,',','.');
									?>
									<tr>
										<th scope="row"><?= $no++ ?></th>
										<td><?= $pesanan['nama_kategori'] ?></td>
										<td><?= $pesanan['jumlah_barang'] ?></td>
										<td><?= $hasil_rupiah ?></td>
										<td><?= $pesanan['status_pesanan'] ?></td>
										<td>rincian</td>
                                    </tr>
                                    <?php endforeach;
                                    ?>
								</tbody>
										
							</table>
                            </div>
                    </div>



                </div>







            </div>




        </div>
    </div>
    </div>

