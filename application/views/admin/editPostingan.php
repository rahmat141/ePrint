<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Postingan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <?= $this->session->flashdata('pesan') ?>
                <form action="<?= base_url('admin/updatePostingan') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kategori</label>
                        <input class="form-control" type="text" name="kategori" aria-label="default input example" value="<?= $postingan->nama_kategori ?>" disabled>
                        <input class="form-control" type="text" name="idposting" aria-label="default input example" value="<?= $postingan->id_posting ?>" hidden>
                        <input class="form-control" type="text" name="idkategori" aria-label="default input example" value="<?= $postingan->id_kategori ?>" hidden>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis</label>
                        <input class="form-control" type="text" name="jenis" placeholder="ex: T-Shrit Impostor" value="<?= $postingan->jenis ?>" aria-label="default input example" value="<?= $postingan->jenis ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Caption</label>
                        <input class="form-control" type="text" name="caption" placeholder="Caption" value="<?= $postingan->caption ?>" aria-label="default input example">
                    </div>
                    <!-- <div class="form-group col-6">

                    <label for="exampleInputEmail1">Gambar</label>
                    <input class="form-control" type="file" name="gambar" aria-label="default input example">
                    
                    
                </div> -->

                    <div class="row">
                        <div class="col-auto">
                            <label for="exampleInputEmail1">Gambar</label>
                            <input class="form-control" type="file" name="gambar" aria-label="default input example">
                        </div>
                        <div class="col-auto" style="margin-top: 9px;color: white;">
                            <a class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Gambar Lain</a>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary mt-5">Ubah</button>
                    <br><br><br><br><br><br>
                </form>
            </div>



        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Gambar Lain</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/uploadGambarLain') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar ke-2</label>
                    <input class="form-control" type="file" id="formFile" name="gambar">
                    <input class="form-control" type="text" id="idposting" name="idposting" value="<?= $this->uri->segment('3'); ?>" hidden>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->