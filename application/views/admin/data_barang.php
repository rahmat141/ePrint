<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Paket Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">



        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            </div>
            <div class="card-body">
            <a href="<?= base_url('admin/tambahBarang/') ?>" class="btn btn-primary mb-3">Tambah Barang</a>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Paket</th>
                            <th>Kelas</th>
                            <th>Jenis Bahan</th>
                            <th>Jenis Bordir</th>
                            <?php if ($this->uri->segment('3') == 7) { ?>
                                <th>Kategori Jersey</th>
                            <?php } ?>
                            <th>Jenis Sablon</th>
                            <th>Ketebalan</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($allDataBarang as $key => $value) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $value['nama_kategori'] ?></td>
                                <td><?= $value['paket'] ?></td>
                                <td><?= $value['kelas'] ?></td>
                                <td><?= $value['jenis_bahan'] ?></td>
                                <td><?= $value['jenis_bordir'] ?></td>
                                <?php
                                if ($this->uri->segment('3') == 7) {
                                    if ($value['kategori_jersey'] == null) { ?>
                                        <td>-</td>
                                    <?php } else { ?>
                                        <td><?= $value['kategori_jersey'] ?></td>
                                <?php }
                                } ?>
                                <td><?= $value['jenis_sablon'] ?></td>
                                <td><?= $value['ketebalan'] ?></td>
                                <td><?= $value['harga'] ?></td>
                                <td><?= $value['keterangan'] ?></td>
                                <td>
                                    <a href="<?= base_url('Admin/editBarang/') . $value['id_pakaiian']; ?>" type="button" class="btn btn-success btn-icon-split" style="width: 70px;">Ubah</a>
                                    <div class="my-2"></div>
                                    <form action="<?= base_url('Admin/deleteBarang/') . $value['id_pakaiian']; ?>" method="post">
                                        <input type="text" value="<?= $value['id_kategori']; ?>" name="refresh" hidden>
                                        <button type="submit" class="btn btn-danger btn-icon-split" style="width:70px;">Hapus</button>
                                        <div class="my-2"></div>
                                    </form>
                                </td>


                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->