<?php
// Error Warning
echo validation_errors('<div class="alert alert-warning">','</div>');

//error upload
if(isset($error_upload)) {
    echo '<div class="alert alert-warning">'.$errors_upload.'</div>';
}

// form open
echo form_open_multipart(base_url('portal/'.$this->uri->segment(2).'/dokren/add'));
?>
<section class="content-header">
  <h1>Dokumen Perencanaan
    <small>Dokumen Perencanaan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Dokumen</li>
    <li class="active">Dokumen Perencanaan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Dokumen Perencanaan</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/dokren') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
                        
	                    <div class="form-group">
	                    <label>Jenis Dokumen *</label>
	                        <select name="jenis_dokren" class="form-control" required>
	                            <option value="">- Pilih -</option>
	                            <option value="Rencana Pembangunan Jangka Menengah Daerah (RPJMD)">Rencana Pembangunan Jangka Menengah Daerah (RPJMD)</option>
	                            <option value="Rencana Kerja Pemerintah Daerah (RKPD)">Rencana Kerja Pemerintah Daerah (RKPD)</option>
	                            <option value="Indikator Kinerja Utama SKPD (IKU SKPD)">Indikator Kinerja Utama SKPD (IKU SKPD)</option>
	                            <option value="Rencana Strategis (RENSTRA)">Rencana Strategis (RENSTRA)</option>
	                            <option value="Rencana Kerja (RENJA)">Rencana Kerja (RENJA)</option>
	                            <option value="Rencana Kerja Tahunan (RKT)">Rencana Kerja Tahunan (RKT)</option>
	                            <option value="Rencana Aksi Kinerja (RAK)">Rencana Aksi Kinerja (RAK)</option>
	                            <option value="Perjanjian Kinerja (PK)">Perjanjian Kinerja (PK)</option>
	                            <option value="Pohon Kinerja">Pohon Kinerja</option>
	                            <option value="SK PPTK">SK PPTK</option>
	                            <option value="Lain Lain">Lain Lain</option>
	                        </select>
	                    </div>
	                    <div class="form-group">
                            <label>Nama Dokumen *</label>
                            <input type="text" name="nama_dokren" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Upload Dokumen *</label>
                            <input type="file" name="upload_dokren" class="form-control" required>
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