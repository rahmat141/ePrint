<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">

				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
						<li class="breadcrumb-item active">Tambah Barang</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>

	<div class="content">
		<div class="container-fluid">
            <div class="container">
            <?= $this->session->flashdata('pesan') ?>
            <form action="<?= base_url('admin/addBarang') ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Barang</label>
                    <select class="form-select" name="kategori" aria-label="Default select example">
                        <option selected>-Pilih Kategori-</option>
                        <?php $id=0; foreach ($namaKategori as $key => $value) { $id++; ?>
                            <option value="<?= $id; ?>"><?= $value['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Paket</label>
                <input class="form-control" type="text" name="paket" placeholder="Paket" aria-label="default input example">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Kelas</label>
                    <select class="form-select" name="kelas" aria-label="Default select example">
                        <option selected>-Pilih kelas-</option>
                        <option value="Sultan">Sultan</option>
                        <option value="Medium">Medium</option>
                        <option value="Reguler">Reguler</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Jenis Bahan</label>
                <input class="form-control" type="text" name="jenisBahan" placeholder="Jenis Bahan" aria-label="default input example">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Jenis Bordir</label>
                <input class="form-control" type="text" name="jenisBordir" placeholder="Jenis Bordir" aria-label="default input example">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">kategori Jersey (optional)</label>
                <input class="form-control" type="text" name="kategoriJersey" placeholder="kategori Jersey" aria-label="default input example">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Jenis Sablon</label>
                <input class="form-control" type="text" name="jenisSablon" placeholder="Jenis Sablon" aria-label="default input example">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Ketebalan</label>
                <input class="form-control" type="text" name="ketebalan" placeholder="Ketebalan" aria-label="default input example">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Harga Paket</label>
                <input class="form-control" type="number" name="harga" placeholder="Rp." aria-label="default input example">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Keterangan</label>
                <input class="form-control" type="text" name="keterangan" placeholder="Keterangan" aria-label="default input example">
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                <br><br><br><br><br><br>
                </form>
            </div>
            
                
            
		</div>
	</div>

</div>

<!-- Modal -->

