<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//error upload
if(isset($error_upload)) {
	echo '<div class="alert alert-warning">'.$errors_upload.'</div>';
}

// form open
echo form_open_multipart(base_url('portal/'.$this->uri->segment(2).'/ttd/edit/'.$ttd->ttd_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Pejabat
    <small>Penandatangan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li class="active">Pejabat Penandatangan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Pejabat Penandatangan</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/ttd') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                        <label>Pejabat Penandatangan *</label>
                        <select name="pegawai_id" class="form-control" >
							<option value="">- Pilih -</option>
							<?php foreach($pegawai->result() as $pegawai) { ?>
								<option value="<?=$pegawai->pegawai_id?>"<?php if($ttd->pegawai_id==$pegawai->pegawai_id) { echo "selected"; } ?>><?=$pegawai->name ?></option>
							<?php } ?>
						</select>
                        </div>
                        <div class="form-group">
                        <label>Jabatan Dalam Penandatangan </label>
                        	<input type="text" name="jabatan_ttd" value="<?=$ttd->jabatan_ttd ?>" class="form-control" placeholder="Boleh di KOSONGKAN">
                        </div>
                        <div class="form-group">
                        	<label>Image TTE</label>
                        	<input type="file" name="foto" class="form-control">
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
<?php echo form_close() ?>