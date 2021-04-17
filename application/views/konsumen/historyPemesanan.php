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
foreach ($allPesanan as $pesanan):
    $hasil_rupiah = 'Rp ' . number_format($pesanan['total_harga'], 2, ',', '.');
    ?>
																																																																																																				<tr>
																																																																																																					<th scope="row"><?=$no++?></th>
																																																																																																					<td><?=$pesanan['nama_kategori']?></td>
																																																																																																					<td><?=$pesanan['jumlah_barang']?></td>
																																																																																																					<td><?=$hasil_rupiah?></td>
																																																																																																					<td><?=$pesanan['status_pesanan']?></td>
																																																																																																					<td><a href="" class="btn btn-primary">Cetak Invoice</a></td>
																																																																																											                                    </tr>
																																																																																											                                    <?php endforeach;
?>
								</tbody>


							</table> -->


                            <?=$this->session->flashdata('alert')?>

                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                style="width:100%">
                                <!-- <?=$this->session->userdata('id_user');?> -->
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
foreach ($allPesanan as $pesanan):
    $hasil_rupiah = 'Rp ' . number_format($pesanan['total_harga'], 2, ',', '.');
    ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$pesanan['jumlah_barang']?></td>
                                        <td><?=$hasil_rupiah?></td>
                                        <td><?=$pesanan['status_pesanan']?></td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="<?=base_url('konsumen/det_pesanan/' . $pesanan['id_bayar'])?>">
                                                Detail
                                            </a>
                                            <?php if (strpos($pesanan['status_pesanan'], 'dibatalkan') === false): ?>

                                            <?php if ($pesanan['status_pesanan'] == "pesanan dikirim"): ?>

                                            <a href="<?=base_url('konsumen/selesaikan_pesanan/') . $pesanan['id_pesanan']?>"
                                                class="btn btn-success" id="selesai">Selesai</a>

                                            <?php endif;?>

                                            <a href="<?=base_url("konsumen/print_invoice/" . $pesanan['id_bayar'])?>"
                                                class="btn btn-info">Cetak Invoice</a>

                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#exampleModal">
                                                Beri Penilaiian
                                            </button>

                                            <?php endif;?>
                                        </td>
                                    </tr>

                                    <?php endforeach;?>
                                </tbody>
                            </table>




                        </div>
                    </div>



                </div>







            </div>




        </div>
    </div>
    </div>

    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url('konsumen/addNilai')?>" method="POST">
                    <div class="modal-body" id="view_modal_nilai">

                        <div class="form-group">
                            <label>Nama Pemesan
                            </label>
                            <input class="form-control" name="nama" required>
                        </div>

                        <div class="form-group">
                            <label>Penilaiian
                            </label>
                            <textarea class="form-control" rows="5" placeholder="" name="nilai" required></textarea>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
