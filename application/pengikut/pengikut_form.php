<section class="content-header">
      <h1>Pengikut
        <small>Pengikut</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>SPT</li>
        <li class="active">Pengikut</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> Pengikut</h3>
			<div class="pull-right">
				<a href="<?=site_url('pengikut') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<?php echo form_open_multipart('pengikut/process') ?>
                    <div class="form-group">
                        <label>Pengikut *</label>
                        <input type="hidden" name="id" value="<?=$row->pengikut_id?>">
                        <select name="pegawai_id" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php foreach($pegawai->result() as $key => $data) { ?>
                            <option value="<?=$data->pegawai_id?>" <?=$data->pegawai_id == $row->pegawai_id ? "selected" : null ?>><?=$data->name?>(<?=$data->jabatan_name?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Surat Tugas *</label>
                        <select name="st_id" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php foreach($st->result() as $key => $data) { ?>
                            <option value="<?=$data->st_id?>" <?=$data->st_id == $row->st_id ? "selected" : null ?>><?=$data->maksud?></option>
                            <?php } ?>
                        </select>
                    </div> -->    
						<div class="form-group">
							<button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
								<i class="fa fa-paper-plane"></i> Save</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
					<?php echo form_close() ?>
				</div>
			</div>
			
		</div>
	</div>
</section>