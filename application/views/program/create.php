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
                <h1 class="h3 mb-4 text-gray-800">Program Kerja</h1>
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
                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="">Program Kerja</label>
                                        <input type="text" name="program_kerja" placeholder="Program Kerja" id="program_kerja" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="tujuan">Tujuan</label>
                                        <input type="text" name="tujuan" placeholder="Tujuan" id="tujuan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Indikator</label>
                                        <input type="text" name="indikator" id="indikator" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Waktu</label>
                                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                                    </div>
									<div class="form-group">
                                        <label for="">Tempat</label>
                                        <input type="text" name="tempat" id="tempat" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Target Program</label>
                                        <textarea name="sasaran" placeholder="Sasaran" id="sasaran" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Penanggung Jawab</label>
                                        <input type="text" name="penanggung_jawab" placeholder="Penanggung Jawab" id="penanggung_jawab" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Upload Gambar</label>
                                        <input type="file" name="gambar" id="gambar" class="form-control-file">
                                    </div>
                                        <!-- <div class="form-group">
                                            <label>Dokumen Surat</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="dokumen" class="custom-file-input">
                                                    <label class="custom-file-label">Pilih dokumen</label>
                                                </div>
                                            </div> -->
                                        <small class="text-danger">Dokumen surat, bisa berupa doc, docx, pdf, jpg, dan png.</small>
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
</div>