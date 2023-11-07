<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/iku/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>IKU
    <small>IKU</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li class="active">IKU</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?=ucfirst($page) ?> IKU</h3>
		<div class="pull-right">
			<a href="<?=site_url('portal/'.$this->uri->segment(2).'/iku') ?>" class="btn btn-warning btn-flat">
				<i class="fa fa-undo"></i> Back
			</a>
		</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
                    
					<div class="form-group">
                        <label>Sasaran *</label>
                        <select name="sasaran_id" class="form-control">
                            <?php foreach($sasaran->result() as $key => $data) { ?>
                                <option value="<?=$data->sasaran_id?>" ><?=$data->uraian_sasaran ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pejabat Penandatangan *</label>
                        <select name="ttd_id" class="form-control">
                            <?php foreach($ttd->result() as $key => $data) { ?>
                                <option value="<?=$data->ttd_id?>" ><?=$data->ttd_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bidang Penanggung Jawab *</label>
                        <textarea name="bidang_pj" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal IKU *</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" name="tanggal_iku" value="<?=date('Y-m-d') ?>" class="form-control" required>
                            </div>
                        </div>
                    <div>

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