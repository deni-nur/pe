<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/ttd_keu/add'),' class="form-horizontal"');
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
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/ttd_keu') ?>" class="btn btn-warning btn-flat">
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
							<?php foreach($pegawai->result() as $key => $data) { ?>
								<option value="<?=$data->pegawai_id?>"><?=$data->name ?></option>
							<?php } ?>
						</select>
                        </div>

                        <div class="form-group">
                        <label>Jabatan Dalam Penandatangan *</label>
                        	<textarea name="jabatan_ttd_keu" class="form-control" rows="3" required></textarea>
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