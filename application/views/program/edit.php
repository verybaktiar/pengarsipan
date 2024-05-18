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
				<h1 class="h3 mb-4 text-gray-800">program</h1>
				<div class="card card-success">
					<div class="card-body">
						<?= $this->session->flashdata('message'); ?>
						<div class="row">
							<div class="col-md-3">
								<a href="<?= base_url('program') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
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
										<label for="">program kerja</label>
										<input type="text" value="<?= $program->program_kerja ?>" name="program_kerja" placeholder="program kerja" id="program_kerja" class="form-control">
									</div>
									<div class="form-group">
										<label for="tujuan"></label>
										<input type="text" value="<?= $program->tujuan ?>" name="tujuan" placeholder="tujuan" id="tujuan" class="form-control">
									</div>
									<div class="form-group">
										<label for="">indikator</label>
										<input type="date" value="<?= $program->indikator ?>" name="indikator" id="indikator" class="form-control">
									</div>
									<div class="form-group">
										<label for="">waktu</label>
										<input type="text" value="<?= $program->tanggal ?>" name="tanggal" placeholder="waktu" id="tanggal" class="form-control">
									</div>
									<div class="form-group">
										<label for="">tempat</label>
										<input type="text" value="<?= $program->tempat ?>" name="tempat" placeholder="tempat" id="tempat" class="form-control">
									</div>
									<div class="form-group">
										<label for="">target program</label>
										<textarea name="sasaran" value="<?= $program->sasaran ?>" placeholder="sasaran" id="sasaran" class="form-control"><?= $program->sasaran ?></textarea>
									</div>
									<div class="form-group">
										<label for="">penanggung jawab</label>
										<input type="text" value="<?= $program->penanggung_jawab ?>" name="penanggung_jawab" placeholder="penanggung jawab" id="penanggung_jawab" class="form-control">
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
