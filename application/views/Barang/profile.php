<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('konsumen/index/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <?php foreach ($vendordata as $i) : ?>
        <div class="content" style="margin: 50px;">
            <?php echo $this->session->flashdata('message'); ?>

            <form action="<?= base_url('Barang/editProfile'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Username</label>
                        <input type="" class="form-control" name="username" value="<?= $i->username; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $i->email; ?>">
                </div>
                <div class=" form-group">
                    <label for="inputAddress2">Nama Toko</label>
                    <input type="text" class="form-control" name="name" value="<?= $i->nama_lengkap_vendor; ?>">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= $i->alamat; ?>">
                </div>
                <div class="form-group gender">
                    <span class="custom-label"><strong>I am a: </strong></span>
                    <label class="radio-inline">
                        <input type="radio" name="jenis_kelamin" id="gender" value="Laki-laki">Laki-laki
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="jenis_kelamin" id="gender" value="Perempuan">Perempuan
                    </label>
                </div>

                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </form>
        </div>

    <?php endforeach; ?>

</div>
</div>