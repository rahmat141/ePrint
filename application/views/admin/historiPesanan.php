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
                        <th>Jenis Kategori</th>
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
                        if ($a['status_pesanan'] == "pesanan selesai") {
                        $hasil_rupiah =
                            'Rp ' .
                            number_format($a['total_harga'], 2, ',', '.'); ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $a['username'] ?></td>
                        <td><?= $a['nama_kategori'] ?> </td>
                        <td><?= $a['jumlah_barang'] ?> </td>
                        <td><?= $hasil_rupiah ?> </td>
                        <td><?= $a['status_pesanan'] ?> </td>
                        <td>
                            <center>
                                <a href="<?= base_url('admin/detailPesanan/') .
                                    $a['id_pesanan'] ?>" class="btn btn-info">Rincian Pesanan</a>
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
                        <th>Jenis Kategori</th>
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
