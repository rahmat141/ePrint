<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Pesanan</a></li>
                        <li class="breadcrumb-item active">Detail Pesanan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Rincian Pesanan</li>
                </ul>
                <?php
                $no = 1;
                foreach ($pesanan as $ps) { ?>


                    
                    <table class="table" style="width:100%;">
                        <!-- row -->
                        
                        
                        <tbody>
                        

                            <tr>
                            <td><h4 class="badge badge-primary" >Pesanan <?= $no++ ?></h4></td>
                            <td></td>
                            </tr>

                            <tr>
                                <th scope="row" style="width: 30%;">Nama Pembeli</th>
                                <td scope="row" style="width: 70%;"><?= $ps['username'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 30%;">Nama Barang</th>
                                <td scope="row" style="width: 70%;"><?= $ps['nama_kategori'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 30%;">Desain Produk</th>
                                <?php if ($ps['desain_produk'] == 'tidak upload desain') { ?>
                                    <td scope="row" style="width: 70%;"><?= $ps['desain_produk'] ?></td>
                                <?php }else{ ?>
                                    <td scope="row" style="width: 70%;"><img src="<?php echo base_url('assets/foto/bukti_bayar/'.$ps['desain_produk']) ?>"></td>
                                <?php } ?>
                                
                            </tr>
                            <tr>
                                <th scope="row" style="width: 30%;">Ukuran</th>
                                <td scope="row" style="width: 70%;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="lihatUkuran" data-s="<?= $ps['ukuran_s'] ?>" data-m="<?= $ps['ukuran_m'] ?>" data-l="<?= $ps['ukuran_l'] ?>" data-xl="<?= $ps['ukuran_xl'] ?>" data-xxl="<?= $ps['ukuran_xxl'] ?>" data-xxxl="<?= $ps['ukuran_3xl'] ?>">
                                        Lihat Ukuran
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 30%;">Jumlah Barang</th>
                                <td scope="row" style="width: 70%;"><?= $ps['jumlah_barang'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 30%;">Harga Paket</th>
                                <td scope="row" style="width: 70%;"><?= $ps['harga_paket'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 30%;">Total Harga</th>
                                <td scope="row" style="width: 70%;"><?= $ps['total_harga'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 30%;">Status Bayar</th>
                                <td scope="row" style="width: 70%;">
                                    <?php if ($ps['id_bayar'] != 0) { ?>
                                        Sudah Bayar 
                                    <?php } else { ?>
                                        Belum Bayar
                                    <?php } ?>
                                </td>
                            </tr>

                        </tbody>
                        <!-- row -->
                    </table>
                    <br><br>
                <?php } ?>
            </div>
        </div>
    </div>


</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ukuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_view">
                <table class="table table-striped" id="table">
                    <tr>
                        <td>Ukuran S</td>
                        <td>Ukuran M</td>
                        <td>Ukuran L</td>
                        <td>Ukuran XL</td>
                        <td>Ukuran XXL</td>
                        <td>Ukuran 3XL</td>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>