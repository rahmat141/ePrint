<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">

				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
						<li class="breadcrumb-item active">Tambah Postingan</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>

	<div class="content">
		<div class="container-fluid">
            <div class="container">
            <?= $this->session->flashdata('pesan') ?>
            <form action="<?= base_url('admin/addPostingan') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori</label>
                    <select class="form-select" name="kategori" aria-label="Default select example">
                        <option selected>-Pilih Kategori-</option>
                        <?php $id=0; foreach ($namaKategori as $key => $value) { $id++; ?>
                            <option value="<?= $id; ?>"><?= $value['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Jenis</label>
                <input class="form-control" type="text" name="jenis" placeholder="ex: T-Shrit Impostor" aria-label="default input example">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Caption</label>
                <input class="form-control" type="text" name="caption" placeholder="Caption" aria-label="default input example">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Gambar</label>
                <input class="form-control" type="file" name="gambar" aria-label="default input example">
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                <br><br><br><br><br><br>
                </form>
            </div>
            
                
            
		</div>
	</div>

</div>

<!-- Modal -->

