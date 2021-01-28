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
                        <li class="breadcrumb-item active">pp</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">

        <div class="container-fluid"><?= $this->session->flashdata(
            'pesan'
        ) ?></div>

        <div class="container-fluid ml-3">

            <table id="example" class="ui celled table" style="width:100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Jumlah Barang</th>
                        <th>Total Harga</th>
                        <th>Status Pesanan</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pesanan as $a):
                        if ($a['status_pesanan'] != "pesanan selesai" && $a['status_pesanan'] != "di dalam keranjang") {
                        $hasil_rupiah =
                            'Rp ' .
                            number_format($a['total_bayar'], 2, ',', '.'); ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $a['nama_pemesan'] ?></td>
                        <td><?= $a['jmlBarang'] ?> </td>
                        <td><?= $hasil_rupiah ?> </td>
                        <td><?= $a['status_pesanan'] ?> </td>
                        <td>
                            <center>
                                <?php 
                                $kurang = substr($a['status_pesanan'], 0, 6);
                                if($a['status_pesanan'] == 'belum lunas'){ 
                                ?>
                                <a href="<?= base_url('admin/toltervendor/1/') .
                                    $a['id_bayar'] ?>" class="btn btn-primary">Terima Pesanan</a>
                                <a href="<?= base_url('admin/toltervendor/0/') .
                                    $a['id_bayar'] ?>" class="btn btn-danger">Tolak Pesanan</a>
                                <?php }elseif($a['status_pesanan'] == 'sudah lunas' || $a['status_pesanan'] == 'pending' || substr($a['status_pesanan'], 0, 6) == $kurang){ 
                                    ?>
                                <a href="<?= base_url('admin/toltervendor/1/') .
                                    $a['id_bayar'] ?>" class="btn btn-primary">Terima Pesanan</a>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="lihatBukti" data-foto="<?= $a['bukti_bayar']; ?>">
                                        Lihat Bukti Bayar
                                    </button>
                                <?php }elseif($a['status_pesanan'] == 'sedang diproses'){?>
                                <a href="<?= base_url('admin/toltervendor/3/') .
                                    $a['id_bayar'] ?>" class="btn btn-success">Kirim Pesanan</a>
                                <?php } ?>
                                <a href="<?= base_url('admin/detailPesanan/') .
                                    $a['id_bayar'] ?>" class="btn btn-info">Rincian Pesanan</a>
                            </center>
                        </td>


                    </tr>
                    
                    <?php
                    }
                    endforeach;
                    ?>
                </tbody>
                <tfoot>
                    <tr>

                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Jumlah Barang</th>
                        <th>Total Harga</th>
                        <th>Status Pesanan</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
            </table>




        </div>


    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bukti Bayar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal_view">
        <img src="" alt="" id='image_bayar' class="rounded mx-auto d-block" width="400px" height="400px">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>