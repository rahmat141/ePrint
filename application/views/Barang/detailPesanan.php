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
                    <th>Nama Konsumen</th>
                    <td><?= $detail->namakonsumen ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $detail->alamat ?></td>
                </tr>
                <tr>
                    <th>Nama Barang</th>
                    <td><?= $detail->namabarang ?></td>
                </tr>
                <tr>
                    <th>Kategori Barang</th>
                    <td><?= $detail->kategoribarang ?></td>
                </tr>
                <tr>
                    <th>Harga Barang</th>
                    <td><?= $detail->hargabarang ?></td>
                </tr>
                <tr>
                    <th>Jumlah Yang Dipesan</th>
                    <td><?= $detail->jumlahbarang ?></td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td><?= $detail->totalharga ?></td>
                </tr>
                <tr>
                    <th>Status Pesanan</th>
                    <td><?= $detail->statuspemesanan ?></td>
                </tr>
            </table>
            &emsp;<a href="<?php echo base_url('Barang/dataPemesan'); ?>" class="btn btn-primary mt-1 mb-2">Back</a>
        </div>
    </div>
</div>