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

        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Pemesanan</h6>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('admin/tambahPostingan/') ?>" class="btn btn-primary mb-3">Tambah Postingan</a>

                    <div class="table-responsive">
                        <div class="dataTables_wrapper dt-bootstrap4" id="dataTable_wrapper">
                            <div class="row">
                                

                                <table id="example" class="table table-bordered dataTable" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Gambar 1</th>
                                            <th>Gambar 2</th>
                                            <th>Jenis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($postingan as $a) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $a['nama_kategori'] ?></td>
                                                <?php if ($a['gambar'] == null) { ?>
                                                    <td align="center">
                                                        -
                                                    </td>
                                                <?php } else { ?>
                                                    <td align="center">
                                                        <img src="<?= base_url('assetsKonsumen/images/product/') . $a['gambar'] ?>" width="200px" height="200px">
                                                    </td>
                                                <?php } ?>
                                                <?php if ($a['gambar2'] == null) { ?>
                                                    <td align="center">
                                                        -
                                                    </td>
                                                <?php } else { ?>
                                                    <td align="center">
                                                        <img src="<?= base_url('assetsKonsumen/images/product/') . $a['gambar2'] ?>" width="200px" height="200px">
                                                    </td>
                                                <?php } ?>
                                                <td><?= $a['jenis'] ?> </td>
                                                <td>
                                                    <center>
                                                        <a href="<?= base_url('admin/ubahPostingan/') . $a['id_posting'] ?>" class="btn btn-info">Ubah</a>
                                                        <a href="<?= base_url('admin/hapusPostingan/') . $a['id_posting'] ?>" class="btn btn-danger">hapus</a>
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Gambar 1</th>
                                            <th>Gambar 2</th>
                                            <th>Jenis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


</div>

</div>