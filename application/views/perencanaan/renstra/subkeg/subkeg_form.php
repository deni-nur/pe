<section class="content-header">
      <h1>Sub Kegiatan
        <small>Data Sub Kegiatan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Perencanaan</li>
        <li>Renja</li>
        <li class="active">Sub Kegiatan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $this->view('messages') ?>
    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title"><?=ucfirst($page) ?> Sub Kegiatan</h3>
    			<div class="pull-right">
    				<a href="<?=site_url('subkeg') ?>" class="btn btn-warning btn-flat">
    					<i class="fa fa-undo"></i> Back
    				</a>
    			</div>
    		</div>
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('subkeg/process') ?>" method="post">
                            <div class="form-group">
                                <label>Nama Kegiatan *</label>
                                <input type="hidden" name="id" value="<?=$row->subkeg_id?>">
                                <select name="kegiatan_id" class="form-control" >
                                    <option value="">- Pilih -</option>
                                    <?php foreach($kegiatan->result() as $key => $data) { ?>
                                        <option value="<?=$data->kegiatan_id?>" <?=$data->kegiatan_id == $row->kegiatan_id ? "selected" : null ?>><?=$data->nama_kegiatan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kode Rekening *</label>
                                <input type="text" name="kode_rek" value="<?=$row->kode_rek?>" class="form-control" required>
                            </div>
    						<div class="form-group">
                                <label>Nama Sub Kegiatan *</label>
                                 <textarea name="nama_subkeg" class="form-control" required=""><?=$row->nama_subkeg ?></textarea>
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