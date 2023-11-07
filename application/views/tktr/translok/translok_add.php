<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/translok/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Transmigrasi Lokal
    <small>Data Transmigrasi Lokal</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li>Wilayah</li>
    <li class="active">Transmigrasi Lokal</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<?php $this->view('messages') ?>
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?=ucfirst($page) ?> Sub Kegiatan</h3>
		<div class="pull-right">
			<a href="<?=site_url('portal/'.$this->uri->segment(2).'/translok') ?>" class="btn btn-warning btn-flat">
				<i class="fa fa-undo"></i> Back
			</a>
		</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
                    <div class="form-group">
                        <label>Nama UPT *</label>
                        <input type="text" name="upt" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Desa *</label>
                        <select name="desa_id" class="form-control" >
                            <option value="">- Pilih -</option>
                            <?php foreach($desa->result() as $key => $data) { ?>
                                <option value="<?=$data->desa_id?>" ><?=$data->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah KK *</label>
                        <input type="number" name="kk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Jiwa *</label>
                        <input type="number" name="jiwa" class="form-control" required>
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