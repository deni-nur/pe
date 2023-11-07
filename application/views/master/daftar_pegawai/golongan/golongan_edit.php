<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/golongan/edit/'.$golongan->golongan_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Golongan
    <small>Data Golongan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li class="active">Golongan</li>
  </ol>
</section>

    <!-- Main content -->
    <section class="content">
        <?php $this->view('messages') ?>
    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title"><?=ucfirst($page) ?> Golongan</h3>
    			<div class="pull-right">
    				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/golongan') ?>" class="btn btn-warning btn-flat">
    					<i class="fa fa-undo"></i> Back
    				</a>
    			</div>
    		</div>
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-4 col-md-offset-4">
    						<div class="form-group">
                            <label>Pangkat *</label>
                            <select name="pangkat_id" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach($pangkat as $pangkat) { ?>
                                    <option value="<?=$pangkat->pangkat_id?>"<?php if($golongan->pangkat_id==$pangkat->pangkat_id) { echo "selected"; } ?>><?=$pangkat->pangkat?></option>
                                <?php } ?>
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Golongan *</label>
                                <input type="text" name="gol" value="<?=$golongan->gol?>" class="form-control" required>
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