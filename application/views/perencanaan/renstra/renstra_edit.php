<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/renstra/edit/'.$renstra->renstra_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>RENSTRA
    <small>RENSTRA</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li class="active">RENSTRA</li>
  </ol>
</section>

    <!-- Main content -->
    <section class="content">

    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title"><?=ucfirst($page) ?> RENSTRA</h3>
    			<div class="pull-right">
    				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/renstra') ?>" class="btn btn-warning btn-flat">
    					<i class="fa fa-undo"></i> Back
    				</a>
    			</div>
    		</div>
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-4 col-md-offset-4">
                            <div class="form-group">
                                <label>Tujuan *</label>
                                <select name="rpjmd_id" class="form-control" readonly >
                                    <?php foreach($rpjmd->result() as $key => $data) { ?>
                                        <option value="<?=$data->rpjmd_id?>" <?=$data->rpjmd_id == $renstra->rpjmd_id ? "selected" : null ?>><?=$data->tujuan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sasaran *</label>
                                <select name="" class="form-control" readonly>
                                    <?php foreach($rpjmd->result() as $key => $data) { ?>
                                        <option value="<?=$data->rpjmd_id?>" <?=$data->rpjmd_id == $renstra->rpjmd_id ? "selected" : null ?>><?=$data->sasaran ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kode Urusan *</label>
                                <input type="text" name="k_urusan" value="<?=$renstra->k_urusan ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Bidang Urusan *</label>
                                <select name="b_urusan" class="form-control">
                                    <option value="">- Pilih -</option>
                                    <option value="Urusan Pemerintahan Bidang Tenaga Kerja" <?php if($renstra->b_urusan=="Urusan Pemerintahan Bidang Tenaga Kerja") { echo "selected"; } ?>>Urusan Pemerintahan Bidang Tenaga Kerja</option>
                                    <option value="Urusan Pemerintahan Bidang Transmigrasi" <?php if($renstra->b_urusan=="Urusan Pemerintahan Bidang Transmigrasi") { echo "selected"; } ?>>Urusan Pemerintahan Bidang Transmigrasi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sasaran PD *</label>
                                <textarea name="sasaran" class="form-control" rows="3" required><?=$renstra->sasaran ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Bidang Penanggung Jawab *</label>
                                <input type="text" name="p_jawab" value="<?=$renstra->p_jawab ?>" class="form-control" required>
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