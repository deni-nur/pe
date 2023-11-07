<section class="content-header">
  <h1>SP/SB
    <small>SP/SB </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data TK dan TR</li>
    <li class="active">SP/SB</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page) ?> SP/SB</h3>
			<div class="pull-right">
				<a href="<?=site_url('spsb') ?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?=site_url('spsb/process') ?>" method="post">
						<div class="form-group">
							<label>Tahun *</label>
                            <input type="hidden" name="id" value="<?=$row->spsb_id?>">
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
                            <label>Nama SP/SB *</label>
                            <input type="text" name="nama_spsb" value="<?=$row->nama_spsb ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Federasi/Komfed </label>
                            <input type="text" name="federasi" value="<?=$row->federasi ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jumlah PUK/PK/SP *</label>
                            <input type="number" name="jml_puk" value="<?=$row->jml_puk ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Anggota *</label>
                            <input type="number" name="jml_anggota" value="<?=$row->jml_anggota ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
							<label>Pencatatan *</label>
							<select name="pencatatan" class="form-control" >
								<option value="">- Pilih -</option>
								<option value="TERCATAT" <?=$row->pencatatan == 'TERCATAT' ? 'selected' : '' ?>>TERCATAT</option>
								<option value="TIDAK TERCATAT" <?=$row->pencatatan == 'TIDAK TERCATAT' ? 'selected' : '' ?>>TIDAK TERCATAT</option>
							</select>
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