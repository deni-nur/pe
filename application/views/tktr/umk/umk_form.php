<section class="content-header">
  <h1>UMK
    <small>UMK </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data TK dan TR</li>
    <li class="active">UMK</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> UMK</h3>
			<div class="pull-right">
				<a href="<?=site_url('umk') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?=site_url('umk/process') ?>" method="post">
						<div class="form-group">
							<label>Tahun *</label>
                            <input type="hidden" name="id" value="<?=$row->umk_id?>">
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
                            <label>Besaran UMK *</label>
                            <input type="number" name="jml_umk" value="<?=$row->jml_umk ?>" class="form-control" required>
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