<section class="content-header">
      <h1>Konfigurasi
        <small>Konfigurasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Perencanaan</li>
        <li class="active">Konfigurasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title"><?=ucfirst($page) ?> Konfigurasi</h3>
    			<div class="pull-right">
    				<a href="<?=site_url('konfigurasi') ?>" class="btn btn-warning btn-flat">
    					<i class="fa fa-undo"></i> Back
    				</a>
    			</div>
    		</div>
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-12">
    					<form action="<?=site_url('konfigurasi/process') ?>" method="post">
    						
                            <div class="form-group col-md-4">
                                <label>Nama Website *</label>
                                <input type="hidden" name="id" value="<?=$row->konfigurasi_id?>">
                                <input type="text" name="namaweb" value="<?=$row->namaweb ?>" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Tag Line *</label>
                                <input type="text" name="tagline" value="<?=$row->tagline ?>" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Email *</label>
                                <input type="email" name="email" value="<?=$row->email ?>" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Website *</label>
                                <input type="text" name="website" value="<?=$row->website ?>" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Telepon *</label>
                                <input type="number" name="telepon" value="<?=$row->telepon ?>" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Alamat *</label>
                                <textarea name="alamat" class="form-control" rows="3" required><?=$row->alamat ?></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Facebook *</label>
                                <input type="text" name="facebook" value="<?=$row->facebook ?>" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Instagram *</label>
                                <input type="text" name="instagram" value="<?=$row->instagram ?>" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Twitter *</label>
                                <input type="text" name="twitter" value="<?=$row->twitter ?>" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Youtube *</label>
                                <input type="text" name="youtube" value="<?=$row->youtube ?>" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Logo *</label>
                                <?php if($page == 'edit') {
                                    if($row->image != null) { ?>
                                        <div style="margin-bottom: 5px" >
                                            <img src="<?=base_url('uploads/images/'.$row->image) ?>" style="width: 80%" >
                                        </div>
                                    <?php 
                                }
                            } ?>
                            <input type="file" name="image" class="form-control">
                            </div>
                            
                            <div class="form-group col-md-12">
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