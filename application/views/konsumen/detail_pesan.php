<main class="ps-main">
    <div style="text-align: center;padding-top: 20px;">
        <h1>Detail Pemesanan</h1>
    </div>
    <div class="ps-blog-grid pt-40 pb-80">
        <div class="ps-container">

            <div class="row">



                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="form-row">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Ukuran</th>
                                        <th scope="col">Jumlah Barang</th>
                                        <th scope="col">Harga Paket</th>
                                        <th scope="col">Desain Produk</th>
                                        <th scope="col">Total</th>
                                <tbody>

                                    <?php
                                    $no = 1;
                                    foreach ($detail_pesan as $item) : ?>

                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item['nama_kategori'] ?></td>
                                            <td>

                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalUkuran" id="seen_ukuran" data-s="<?= $item['ukuran_s'] ?>" data-m="<?= $item['ukuran_m'] ?>" data-l="<?= $item['ukuran_l'] ?>" data-xl="<?= $item['ukuran_xl'] ?>" data-xxl="<?= $item['ukuran_xxl'] ?>" data-xxxl="<?= $item['ukuran_3xl'] ?>">
                                                    Lihat Ukuran
                                                </button>

                                            </td>
                                            <td><?= $item['jumlah_barang'] ?></td>
                                            <td><?= $item['harga_paket'] ?></td>
                                            <td>
                                                <?php if ($item['desain_produk'] != 'tidak upload desain') : ?>

                                                    <a href="">
                                                        <img src="<?= base_url('assetsKonsumen/images/desain_konsumen/' . $item['desain_produk']) ?>" class="img-thumbnail" alt="..." width="150">
                                                    </a>

                                                <?php else : ?>

                                                    <?= $item['desain_produk'] ?>

                                                <?php endif; ?>

                                            </td>
                                            <?php $hasil_rupiah = 'Rp ' . number_format($item['total_harga'], 2, ',', '.'); ?>



                                            <td><?= $hasil_rupiah ?></td>

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


    <!-- Modal -->
    <div class="modal fade" id="modalUkuran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ukuran Pesanan</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal_view">

                    <table class="table table-striped" id="table">
                        <tr>
                            <td>UKuran S</td>
                            <td>UKuran M</td>
                            <td>UKuran L</td>
                            <td>UKuran XL</td>
                            <td>UKuran XXL</td>
                            <td>UKuran 3XL</td>
                        </tr>

                        <tr class="center">

                            <td id="s"></td>
                            <td id="m"></td>
                            <td id="l"></td>
                            <td id="xl"></td>
                            <td id="xxl"></td>
                            <td id="3xl"></td>

                        </tr>
                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>