<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/kelompok/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Kelompok
    <small>Kelompok</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li>Neraca Belanja</li>
    <li class="active">Kelompok</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Kelompok</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/kelompok') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">

						<div class="form-group">
							<label>Akun *</label>
							<select name="akun_id" class="form-control">
								<option value="">Pilih</option>
								<?php foreach($akun->result() as $key => $data) { ?>
									<option value="<?=$data->akun_id ?>"><?=$data->kode_akun ?>. <?=$data->nama_akun ?></option>
								<?php } ?>
							</select>
						</div>
                        <div class="form-group">
							<label>Kode Kelompok *</label>
							<input type="text" name="kode_kelompok" class="form-control" required>
						</div>
                        <div class="form-group">
                            <label>Nama Kelompok *</label>
                            <textarea name="nama_kelompok" class="form-control" rows="3" required></textarea>
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