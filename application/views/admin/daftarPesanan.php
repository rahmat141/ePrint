<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(
    'admin'
); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Pesanan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">

        <div class="container-fluid"><?=$this->session->flashdata(
    'pesan'
)?></div>

        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="dataTables_wrapper dt-bootstrap4" id="dataTable_wrapper">
                            <div class="row">
                                <div class="col-sm-12"></div>
                                <table id="example" class="table table-bordered dataTable" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Jumlah Barang</th>
                                            <th>Total Harga</th>
                                            <th>Sisa Bayar</th>
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
        number_format($a['total_harga'], 2, ',', '.');
        $hasil_rupiah_sisa =
        'Rp ' .
        number_format($a['total_harga'] - $a['total_bayar'], 2, ',', '.');?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$a['nama_pemesan']?></td>
                                            <td><?=$a['jmlBarang']?> </td>
                                            <td><?=$hasil_rupiah?> </td>
                                            <td><?=$hasil_rupiah_sisa?> </td>
                                            <?php $status = "";

        if ($a['status_pesanan'] == "kurang") {
            $status = "Pembayaran Pelunasan";
        } else {
            $status = $a['status_pesanan'];
        }
        ?>
                                            <td><?=$status?></td>

                                            <td>


                                                <div class="btn-group">
                                                    <button class="btn btn-info btn-sm" type="button">
                                                        Pilih aksi
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">


                                                        <?php
    if ($a['status_pesanan'] == 'Pembayaran kurang (sedang diproses)') {
            ?>
                                                        <a href="<?=base_url('admin/toltervendor/1/') .
            $a['id_bayar'] . '/' . $a['total_harga']?>" class="dropdown-item bg-success text-white"> Terima</a>
                                                        <a href=" <?=base_url('admin/toltervendor/0/') .
            $a['id_bayar']?>" class="dropdown-item bg-danger text-white">Tolak Pesanan</a>
                                                        <button class="dropdown-item bg-info text-white"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                            id="lihatBukti" data-foto="<?=$a['bukti_bayar'];?>">
                                                            Lihat Bukti Bayar
                                                        </button>

                                                        <button class="dropdown-item bg-warning text-white"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                            id="lihatBukti" data-foto="<?=$a['bukti_dp'];?>">
                                                            Lihat Bukti Pelunasan
                                                        </button>
                                                        <?php } elseif ($a['status_pesanan'] == 'sudah lunas' || $a['status_pesanan'] == 'pending') {
        ?>
                                                        <a href="<?=base_url('admin/toltervendor/1/') .
        $a['id_bayar'] . '/' . $a['total_harga']?>" class="dropdown-item bg-success text-white">Terima</a>
                                                        <a href="<?=base_url('admin/toltervendor/0/') .
        $a['id_bayar']?>" class="dropdown-item bg-danger text-white"> Tolak</a>
                                                        <a href="<?=base_url('admin/toltervendor/5/') .
        $a['id_bayar']?>" class="dropdown-item bg-warning text-white"> Belum Lunas</a>
                                                        <button class="dropdown-item bg-info text-white"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                            id="lihatBukti" data-foto="<?=$a['bukti_bayar'];?>">
                                                            Lihat Bukti Bayar
                                                        </button>

                                                        <?php } elseif ($a['status_pesanan'] == 'sedang diproses') {?>
                                                        <a href="<?=base_url('admin/toltervendor/3/') .
        $a['id_bayar']?>" class="dropdown-item bg-success text-white">Kirim Barang</a>
                                                        <a href="<?=base_url('admin/toltervendor/5/') .
        $a['id_bayar']?>" class="dropdown-item bg-warning text-white"> Lakukan Pelunas</a>
                                                        <?php }?>
                                                        <a href="<?=base_url('admin/detailPesanan/') .
    $a['id_bayar']?>" class="dropdown-item bg-primary text-white">Rincian</a>




                                                    </div>
                                                </div>





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
                                            <th>Sisa Bayar</th>
                                            <th>Status Pesanan</th>
                                            <th>Action</th>
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