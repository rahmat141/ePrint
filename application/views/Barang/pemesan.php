<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Pemesan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Barang/index/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Pemesan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <?php echo $this->session->flashdata('message'); ?>

        <!-- Button trigger modal -->

        <table class="table mt-3">
            <tr>
                <th>NO</th>
                <th>Nama Konsumen</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Harga Barang</th>
                <th>Status</th>
                <th>
                    <center>Action</center>
                </th>
            </tr>
            <?php $no = 1;
            foreach ($pemesan as $ps) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $ps['namakonsumen'] ?></td>
                    <td><?= $ps['namabarang'] ?></td>
                    <td><?= $ps['jumlahbarang'] ?></td>
                    <td><?= $ps['hargabarang'] ?></td>
                    <td><?= $ps['statuspemesanan'] ?></td>
                    <td>
                        <center>
                            <a href="<?= base_url('Barang/detailPesanan/') . $ps['idpesanan'] ?>" class="btn btn-success btn-sm">Detail</a>&emsp;
                            <?php if ($ps['statuspemesanan'] == 'Pending') : ?>
                                <a href="<?= base_url('Barang/accPesanan/') . $ps['idpesanan'] ?>" class="btn btn-primary btn-sm">Konfirmasi</a>&emsp;
                                <a href="<?= base_url('Barang/tolakPesanan/') . $ps['idpesanan'] ?>" class="btn btn-danger btn-sm">Tolak Pesanan</a>&emsp;
                            <?php endif; ?>
                        </center>
                    </td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </table>
    </div>
</div>