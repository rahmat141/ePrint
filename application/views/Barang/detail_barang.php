<div class="content-wrapper">
    <div class="content">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Detail Barang</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

            <table class="table">
                <tr>
                    <th>Nama Barang</th>
                    <td><?php echo $detail->nama ?></td>
                </tr>
                <tr>
                    <th>Keterangan Barang</th>
                    <td><?php echo $detail->keterangan ?></td>
                </tr>
                <tr>
                    <th>Harga Barang</th>
                    <td><?php echo $detail->harga ?></td>
                </tr>
                <tr>
                    <th>Stok Barang</th>
                    <td><?php echo $detail->stok ?></td>
                </tr>
                <tr>
                    <th>Kategori Barang</th>
                    <td><?php echo $detail->kategori ?></td>
                </tr>
                <tr>
                    <th>Foto</th>
                    <td><img src="<?php echo base_url(); ?>assets/foto/<?php echo $detail->foto; ?>" width="150" height="150"></td>
                </tr>
            </table>
            &emsp;<a href="<?php echo base_url('Barang/index'); ?>" class="btn btn-primary mt-1 mb-2">Back</a>
        </div>
    </div>
</div>