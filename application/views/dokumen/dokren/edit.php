<?php
// Error Warning
echo validation_errors('<div class="alert alert-warning">','</div>');

//error upload
if(isset($error_upload)) {
    echo '<div class="alert alert-warning">'.$errors_upload.'</div>';
}

// form open
echo form_open_multipart(base_url('portal/'.$this->uri->segment(2).'/dokren/edit/'.$dokren->dokren_id));
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
            <option value="Rencana Pembangunan Jangka Menengah Daerah (RPJMD)" <?php if($dokren->jenis_dokren=="Rencana Pembangunan Jangka Menengah Daerah (RPJMD)") { echo "selected"; } ?>>Rencana Pembangunan Jangka Menengah Daerah (RPJMD)</option>
            <option value="Rencana Kerja Pemerintah Daerah (RKPD)" <?php if($dokren->jenis_dokren=="Rencana Kerja Pemerintah Daerah (RKPD)") { echo "selected"; } ?>>Rencana Kerja Pemerintah Daerah (RKPD)</option>
            <option value="Indikator Kinerja Utama SKPD (IKU SKPD)" <?php if($dokren->jenis_dokren=="Indikator Kinerja Utama SKPD (IKU SKPD)") { echo "selected"; } ?>>Indikator Kinerja Utama SKPD (IKU SKPD)</option>
            <option value="Rencana Strategis (RENSTRA)" <?php if($dokren->jenis_dokren=="Rencana Strategis (RENSTRA)") { echo "selected"; } ?>>Rencana Strategis (RENSTRA)</option>
            <option value="Rencana Kerja (RENJA)" <?php if($dokren->jenis_dokren=="Rencana Kerja (RENJA)") { echo "selected"; } ?>>Rencana Kerja (RENJA)</option>
            <option value="Rencana Kerja Tahunan (RKT)" <?php if($dokren->jenis_dokren=="Rencana Kerja Tahunan (RKT)") { echo "selected"; } ?>>Rencana Kerja Tahunan (RKT)</option>
            <option value="Rencana Aksi Kinerja (RAK)" <?php if($dokren->jenis_dokren=="Rencana Aksi Kinerja (RAK)") { echo "selected"; } ?>>Rencana Aksi Kinerja (RAK)</option>
            <option value="Perjanjian Kinerja (PK)" <?php if($dokren->jenis_dokren=="Perjanjian Kinerja (PK)") { echo "selected"; } ?>>Perjanjian Kinerja (PK)</option>
            <option value="Pohon Kinerja" <?php if($dokren->jenis_dokren=="Pohon Kinerja") { echo "selected"; } ?>>Pohon Kinerja</option>
            <option value="SK PPTK" <?php if($dokren->jenis_dokren=="SK PPTK") { echo "selected"; } ?>>SK PPTK</option>
            <option value="Lain Lain" <?php if($dokren->jenis_dokren=="Lain Lain") { echo "selected"; } ?>>Lain Lain</option>
        </select>
    </div>
    <div class="form-group">
        <label>Nama Dokumen *</label>
        <input type="text" name="nama_dokren" value="<?=$dokren->nama_dokren ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Upload Dokumen *</label>
        <input type="file" name="upload_dokren" class="form-control">
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