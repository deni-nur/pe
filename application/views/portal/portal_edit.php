<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/edit/'.$portal->portal_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Portal
    <small>Portal</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Portal</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Portal</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/portal_data') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <label>Tahun Perencanaan *</label>
                            <select name="tahun_perencanaan" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $now=date('Y');
                                for ($a=2021;$a<=$now;$a++) { ?>
                                <option value="<?=$a ?>" <?=$a == $portal->tahun_perencanaan ? "selected" : null ?>><?=$a ?></option>
                                <?php } ?>
                            </select>
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