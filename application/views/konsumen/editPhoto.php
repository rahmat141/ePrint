<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Profile Picture</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('konsumen/index/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Profile Picture</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <?php foreach ($konsumenData as $k) : ?>
        <div class="content">
            <form action="<?php echo base_url() . 'Konsumen/updateProfile'; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <center><img src="<?php echo base_url() ?>/assets/foto/<?php echo $k->gambar ?>" height="200" width="200" style="border-radius: 50%"></center>
                </div>
        </div>
        <div class="col-sm-4">
            <div class="custom-file">
                <label>Foto</label>
                <input type="file" class="custom-file-input" id="image" name="file">
                <input type="hidden" class="custom-file-input" id="image" name="potolama" value="<?php echo $k->gambar ?>">

                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-left:10px;">Save</button>
        </form>
    <?php endforeach; ?>
</div>



</div>
</div>