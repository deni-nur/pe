<section class="content-header">
      <h1>Luar Daerah
        <small>Data Luar Daerah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Master</li>
        <li class="active">Luar Daerah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $this->view('messages') ?>
    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title"><?=ucfirst($page) ?> Luar Daerah</h3>
    			<div class="pull-right">
    				<a href="<?=site_url('ld') ?>" class="btn btn-warning btn-flat">
    					<i class="fa fa-undo"></i> Back
    				</a>
    			</div>
    		</div>
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('ld/process') ?>" method="post">
                            <div class="form-group">
                                <label>Golongan *</label>
                                <input type="hidden" name="id" value="<?=$row->ld_id?>">
                                <select name="golongan_id" class="form-control" >
                                    <option value="">- Pilih -</option>
                                    <?php foreach($golongan->result() as $key => $data) { ?>
                                        <option value="<?=$data->golongan_id?>" <?=$data->golongan_id == $row->golongan_id ? "selected" : null ?>><?=$data->gol ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Provinsi *</label>
                                <select name="provinsi_id" class="form-control" >
                                    <option value="">- Pilih -</option>
                                    <?php foreach($provinsi->result() as $key => $data) { ?>
                                        <option value="<?=$data->provinsi_id?>" <?=$data->provinsi_id == $row->provinsi_id ? "selected" : null ?>><?=$data->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
    						<div class="form-group">
                                <label>Standar Biaya *</label>
                                <input type="number" name="biaya" value="<?=$row->biaya?>" class="form-control" required>
                            </div>
                                                        
    						<div class="form-group">
    							<button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
    								<i class="fa fa-paper-plane"></i> Save</button>
    							<button type="reset" class="btn btn-flat">Reset</button>
    						</div>
                        </form>
    				</div>
    			</div>
    			
    		</div>
    	</div>
    </section>