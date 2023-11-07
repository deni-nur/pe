<section class="content-header">
      <h1>Rekening
        <small>Data Rekening</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Master</li>
        <li class="active">Rekening</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $this->view('messages') ?>
    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title"><?=ucfirst($page) ?> Rekening</h3>
    			<div class="pull-right">
    				<a href="<?=site_url('rekening') ?>" class="btn btn-warning btn-flat">
    					<i class="fa fa-undo"></i> Back
    				</a>
    			</div>
    		</div>
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('rekening/process') ?>" method="post">
                            <div class="form-group">
                                <label>Kode Rekening *</label>
                                <input type="hidden" name="id" value="<?=$row->rekening_id?>">
                                <input type="text" name="rek_bank" class="form-control" value="<?=$row->rek_bank ?>" required>
                            </div>
    						<div class="form-group">
                                <label>Nama Bank *</label>
                                 <input type="text" name="nama_bank" class="form-control" value="<?=$row->nama_bank ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Pemilik *</label>
                                 <input type="text" name="nama_pemilik" class="form-control" value="<?=$row->nama_pemilik ?>" required>
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