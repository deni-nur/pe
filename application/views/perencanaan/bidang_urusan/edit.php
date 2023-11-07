<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/bidang_urusan/edit/'.$bidang_urusan->bidang_urusan_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Bidang Urusan
    <small>Bidang Urusan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li class="active">Bidang Urusan</li>
  </ol>
</section>

    <!-- Main content -->
    <section class="content">

    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title"><?=ucfirst($page) ?> Bidang Urusan</h3>
    			<div class="pull-right">
    				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/bidang_urusan') ?>" class="btn btn-warning btn-flat">
    					<i class="fa fa-undo"></i> Back
    				</a>
    			</div>
    		</div>
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-4 col-md-offset-4">

                            <div class="form-group">
                                <label>Urusan *</label>
                                <select name="urusan_id" class="form-control">
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($urusan->result() as $key => $data) { ?>
                                        <option value="<?=$data->urusan_id ?>" <?=$data->urusan_id == $bidang_urusan->urusan_id ? "selected" : null ?>><?=$data->uraian ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kode *</label>
                                <input type="text" name="kode" value="<?=$bidang_urusan->kode ?>" class="form-control" required>
                            </div>
    						<div class="form-group">
    							<label>Uraian *</label>
    							<textarea name="uraian_bidang_urusan" class="form-control" required><?=$bidang_urusan->uraian_bidang_urusan ?></textarea>
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