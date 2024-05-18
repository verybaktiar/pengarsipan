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
				<h1 class="h3 mb-4 text-gray-800">Jadwal</h1>
				<div class="card card-success">
					<div class="card-body">
						<?= $this->session->flashdata('message'); ?>
						<div class="row">
							<div class="col-md-3">
								<a href="<?= base_url('jadwal') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<div class="text-danger">
									<?php echo validation_errors(); ?>
								</div>
								<form action="" method="post">
									<div class="form-group">
										<label for="">tanggal</label>
										<input type="date" value="<?= $jadwal->tanggal ?>" name="tanggal" id="tanggal" class="form-control">
									</div>
									<div class="form-group">
										<label for="">kegiatan</label>
										<input type="text" value="<?= $jadwal->kegiatan ?>" name="kegiatan" placeholder="kegiatan" id="kegiatan" class="form-control">
									</div>
									<div class="form-group">
										<label for="">tempat</label>
										<input type="text" value="<?= $jadwal->tempat ?>" name="tempat" placeholder="tempat" id="tempat" class="form-control">
									</div>
									<div class="form-group">
										<label for="">sasaran</label>
										<input type="text" value="<?= $jadwal->tempat ?>" name="sasaran" placeholder="sasaran" id="sasaran" class="form-control">
									</div>
									<div class="form-group">
										<label for="">waktu</label>
										<input type="text" value="<?= $jadwal->waktu ?>" name="waktu" placeholder="waktu" id="waktu" class="form-control">
									</div>
									<div class="form-group">
										<label for="">keterangan</label>
										<textarea name="keterangan" placeholder="keterangan" id="keterangan" class="form-control"><?= $jadwal->keterangan ?></textarea>
									</div>
									<div class="form-group">
										<label for="">penanggung jawab</label>
										<input type="text" value="<?= $jadwal->penanggung_jawab ?>" name="penanggung_jawab" placeholder="penanggung jawab" id="penanggung_jawab" class="form-control">
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
