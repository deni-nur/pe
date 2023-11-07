<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/rpjmd/edit/'.$rpjmd->rpjmd_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>RPJMD
    <small>RPJMD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li class="active">RPJMD</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?=ucfirst($page) ?> RPJMD</h3>
		<div class="pull-right">
			<a href="<?=site_url('portal/'.$this->uri->segment(2).'/rpjmd') ?>" class="btn btn-warning btn-flat">
				<i class="fa fa-undo"></i> Back
			</a>
		</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
                    <div class="form-group">
                        <label>Visi *</label>
                        <textarea name="visi" class="form-control" rows="3" required><?=$rpjmd->visi ?></textarea>
                    </div>
                    <div class="form-group">
						<label>Misi *</label>
						<textarea name="misi" class="form-control" rows="3" required><?=$rpjmd->misi ?></textarea>
					</div>
                    <div class="form-group">
                        <label>Tujuan *</label>
                        <textarea name="tujuan" class="form-control" rows="3" required><?=$rpjmd->tujuan ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Sasaran *</label>
                        <textarea name="sasaran" class="form-control" rows="3" required><?=$rpjmd->sasaran ?></textarea>
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