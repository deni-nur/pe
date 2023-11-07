<?php
// Error Warning
echo validation_errors('<div class="alert alert-warning">','</div>');

//error upload
if(isset($error_upload)) {
    echo '<div class="alert alert-warning">'.$errors_upload.'</div>';
}

// form open
echo form_open_multipart(base_url('portal/'.$this->uri->segment(2).'/dokev/add'));
?>
<section class="content-header">
  <h1>Dokumen Evaluasi
    <small>Dokumen Evaluasi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Dokumen</li>
    <li class="active">Dokumen Evaluasi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Dokumen Evaluasi</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/dokev') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
                        
	                    <div class="form-group">
	                    <label>Jenis Dokumen *</label>
	                        <select name="jenis_dokev" class="form-control" required>
	                            <option value="">- Pilih -</option>
	                            <option value="Laporan Progres Kegiatan">Laporan Progres Kegiatan</option>
	                            <option value="Laporan Evaluasi Renja Triwulan">Laporan Evaluasi Renja Triwulan</option>
	                            <option value="Laporan Kinerja (LKj)">Laporan Kinerja (LKj)</option>
	                            <option value="Laporan Keterangan Pertanggungjawaban (LKPJ)">Laporan Keterangan Pertanggungjawaban (LKPJ)</option>
	                            <option value="Laporan Penyelenggaraan Pemerintahan Daerah (LPPD)">Laporan Penyelenggaraan Pemerintahan Daerah (LPPD)</option>
	                            <option value="Lain Lain">Lain Lain</option>
	                        </select>
	                    </div>
	                    <div class="form-group">
                            <label>Nama Dokumen *</label>
                            <input type="text" name="nama_dokev" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Upload Dokumen *</label>
                            <input type="file" name="upload_dokev" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
							<button type="submit" name="submit" class="btn btn-success btn-flat">
								<i class="fa fa-paper-plane"></i> Save</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
				</div>
			</div>
			
		</div>
	</div>
</section>

<?php echo form_close(); ?>