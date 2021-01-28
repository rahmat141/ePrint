<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('konsumen/index/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Password</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <?php foreach ($konsumenData as $i) : ?>
        <div class="content" style="margin: 50px;">
            <?php echo $this->session->flashdata('message'); ?>

            <form action="<?= base_url('Konsumen/editPass'); ?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Old Password</label>
                        <input type="password" class="form-control" name="oldpassword" value="">
                    </div>
                    <?= form_error('oldpassword', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="inputAddress">New Password</label>
                    <input type="password" class="form-control" name="newpassword" value="">
                </div>
                <div class=" form-group">
                    <label for="inputAddress2">Re-type New Password</label>
                    <input type="password" class="form-control" name="newpassword2" value="">
                </div>

                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </form>
        </div>

    <?php endforeach; ?>

</div>
</div>