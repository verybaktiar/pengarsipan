<div id="wrapper">
	<!-- Sidebar -->

	<?php $this->load->view('templates/sidebar'); ?>
	<!-- End of Sidebar -->
	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">
		<!-- Main Content -->
		<div id="content">
			<!-- Topbar -->
			<?php $this->load->view('templates/topbar'); ?>

			<!-- End of Topbar -->
			<!-- Begin Page Content -->
			<div class="container-fluid">

				<!-- Page Heading -->
				<h1 class="h3 mb-4 text-gray-800">Dokumentasi Kegiatan
                </h1>
				<div class="card card-success">
					<div class="card-body">
						<?= $this->session->flashdata('message'); ?>
						<div class="row">
							<div class="col-md-3">
								<a href="<?= base_url('dokumentasi') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<div class="text-danger">
									<?php echo validation_errors(); ?>
								</div>
								<form action="" method="post" enctype="multipart/form-data">

									<div class="form-group">
										<label for="">nama kegiatan</label>
										<input type="text" value="<?= $dokumentasi->nama_kegiatan ?>" name="nama_kegiatan" placeholder="nama kegiatan" id="nama_kegiatan" class="form-control">
									</div>
									<div class="form-group">
										<label for="tujuan">tanggal kegiatan</label>
										<input type="date" value="<?= $dokumentasi->tanggal_kegiatan ?>" name="tanggal_kegiatan" placeholder="tanggal_kegiatan" id="tanggal_kegiatan" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Deskripsi Kegiatan</label>
										<input type="text" value="<?= $dokumentasi->deskripsi_kegiatan ?>" name="deskripsi_kegiatan" id="deskripsi_kegiatan" class="form-control">
									</div>
									<div class="form-group">
										<label for="gambar_kegiatan">Gambar Kegiatan Saat Ini</label>
                                        <br>
										<!-- Pastikan bahwa $dokumentasi->gambar_kegiatan adalah path yang benar ke gambar yang tersimpan -->
										<img src="<?= base_url('uploads/' . $dokumentasi->gambar) ?>" alt="Gambar Kegiatan" style="width: 100px; height: auto;">
                                        <br>
										<label for="gambar">Ubah Gambar Kegiatan</label>
										<input type="file" name="gambar" id="gambar" class="form-control">
									</div>

									
									<button type="submit" class="btn btn-primary">Simpan</button>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->
		<!-- modal tambah -->
		<?php $this->load->view('admin/ekstra/modal'); ?>
		<!-- Footer -->
		<?php $this->load->view('templates/copyright') ?>
		<!-- End of Footer -->

	</div>
	<!-- End of Content Wrapper -->

</div>
