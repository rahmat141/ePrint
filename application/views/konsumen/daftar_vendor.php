<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Vendor</h1>
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
    <div class="container-fluid dashboard-content">
        <div class="row">
            <?php foreach ($vendor as $vd) : ?>
                <div class="card ml-2 mr-3 mb-4" style="width: 14rem;">
                    <img src="<?= base_url('assets/foto/') . $vd['gambar'] ?>" class="card-img-top" height="200">
                    <div class="card-body">
                        <h5 class="card-title"><?= $vd['nama_lengkap_vendor'] ?></h5>
                        <p class="card-text"><?= $vd['alamat']  ?></p>
                        <a href="<?= base_url('Konsumen/barangVendor/') . $vd['id_user'] ?>" class="btn btn-primary">Lihat barang</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>