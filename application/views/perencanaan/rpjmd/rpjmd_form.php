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
    				<a href="<?=site_url('rpjmd') ?>" class="btn btn-warning btn-flat">
    					<i class="fa fa-undo"></i> Back
    				</a>
    			</div>
    		</div>
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-4 col-md-offset-4">
    					<form action="<?=site_url('rpjmd/process') ?>" method="post">
    						
                            <div class="form-group">
                                <label>Tahun Perencanaan *</label>
                                <input type="hidden" name="id" value="<?=$row->rpjmd_id?>">
                                <select name="tahun" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $now=date('Y');
                                for ($a=2020;$a<=$now;$a++) { ?>
                                <option value="<?=$a ?>" <?=$a == $row->tahun ? "selected" : null ?>><?=$a ?></option>
                                <?php } ?>
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Visi *</label>
                                <textarea name="visi" class="form-control" rows="3" required><?=$row->visi ?></textarea>
                            </div>
                            <div class="form-group">
    							<label>Misi *</label>
    							<textarea name="misi" class="form-control" rows="3" required><?=$row->misi ?></textarea>
    						</div>
                            <div class="form-group">
                                <label>Tujuan *</label>
                                <textarea name="tujuan" class="form-control" rows="3" required><?=$row->tujuan ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Sasaran *</label>
                                <textarea name="sasaran" class="form-control" rows="3" required><?=$row->sasaran ?></textarea>
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