<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/rekening/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Rekening
    <small>Data Rekening</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li class="active">Rekening</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Rekening</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/rekening') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <label>Kode Rekening *</label>
                            <input type="number" name="rek_bank" class="form-control" required>
                        </div>
						<div class="form-group">
                            <label>Nama Bank *</label>
                             <input type="text" name="nama_bank" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pemilik *</label>
                             <input type="text" name="nama_pemilik" class="form-control" required>
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