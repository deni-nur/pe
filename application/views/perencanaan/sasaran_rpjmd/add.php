<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/sasaran_rpjmd/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Sasaran RPJMD
    <small>Sasaran RPJMD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li class="active">Sasaran RPJMD</li>
  </ol>
</section>

    <!-- Main content -->
    <section class="content">

    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title"><?=ucfirst($page) ?> Sasaran RPJMD</h3>
    			<div class="pull-right">
    				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/sasaran_rpjmd') ?>" class="btn btn-warning btn-flat">
    					<i class="fa fa-undo"></i> Back
    				</a>
    			</div>
    		</div>
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-4 col-md-offset-4">

    						<div class="form-group">
    							<label>Uraian *</label>
    							<textarea name="uraian" class="form-control" required></textarea>
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