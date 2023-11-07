<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/sasaran_rpjmd/'.$sasaran_rpjmd->sasaran_rpjmd_id.'/indikator_sasaran_rpjmd_edit/'.$indikator_sasaran_rpjmd->indikator_sasaran_rpjmd_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Indikator Sasaran RPJMD
    <small>Indikator Sasaran RPJMD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Sasaran RPJMD</li>
    <li class="active">Indikator Sasaran RPJMD</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?=ucfirst($page) ?> Indikator Sasaran RPJMD</h3>
		<div class="pull-right">
			<a href="<?=site_url('portal/'.$this->uri->segment(2).'/sasaran_rpjmd') ?>" class="btn btn-warning btn-flat">
				<i class="fa fa-undo"></i> Back
			</a>
		</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
                    
                    <div class="form-group">
                        <label>Sasaran RPJMD *</label>
                        <input type="text" name="" value="<?=$sasaran_rpjmd->uraian ?>" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Tolok Ukur Indikator *</label>
                        <input type="text" name="uraian_indikator_sasaran_rpjmd" value="<?=$indikator_sasaran_rpjmd->uraian_indikator_sasaran_rpjmd ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <table class="table table-striped" id="">
                          <thead>
                          <tr>
                              <th class="font-bold" width="70" style="vertical-align: middle;">Tahun</th>
                              <th class="font-bold" width="100" style="vertical-align: middle;">Target</th>
                              <th class="font-bold" width="100" style="vertical-align: middle;">Satuan</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <td>Target Awal</td>
                              <td><input type='text' class='form-control' name="awal" value="<?=$indikator_sasaran_rpjmd->awal ?>" placeholder='Target' /></td>
                              <td><input type='text' class='form-control' name='' value="<?=$indikator_sasaran_rpjmd->satuan ?>" placeholder='Satuan' /></td>
                          </tr>
                          <tr>
                              <td align="center">1</td>
                              <td><input type='text' class='form-control' name="satu" value="<?=$indikator_sasaran_rpjmd->satu ?>" placeholder='Target' /></td>
                              <td><input type='text' class='form-control' name="satuan" value="<?=$indikator_sasaran_rpjmd->satuan ?>" placeholder='Satuan' /></td>
                          </tr>
                          <tr>
                              <td align="center">2</td>
                              <td><input type='text' class='form-control' name="dua" value="<?=$indikator_sasaran_rpjmd->dua ?>" placeholder='Target' /></td>
                              <td><input type='text' class='form-control' name="" value="<?=$indikator_sasaran_rpjmd->satuan ?>" placeholder='Satuan' /></td>
                          </tr>
                          <tr>
                              <td align="center">3</td>
                              <td><input type='text' class='form-control' name="tiga" value="<?=$indikator_sasaran_rpjmd->tiga ?>" placeholder='Target' /></td>
                              <td><input type='text' class='form-control' name="" value="<?=$indikator_sasaran_rpjmd->satuan ?>" placeholder='Satuan' /></td>
                          </tr>
                          <tr>
                              <td align="center">4</td>
                              <td><input type='text' class='form-control' name="empat" value="<?=$indikator_sasaran_rpjmd->empat ?>" placeholder='Target' /></td>
                              <td><input type='text' class='form-control' name="" value="<?=$indikator_sasaran_rpjmd->satuan ?>" placeholder='Satuan' /></td>
                          </tr>
                          <tr>
                              <td align="center">5</td>
                              <td><input type='text' class='form-control' name="lima" value="<?=$indikator_sasaran_rpjmd->lima ?>" placeholder='Target' /></td>
                              <td><input type='text' class='form-control' name="" value="<?=$indikator_sasaran_rpjmd->satuan ?>" placeholder='Satuan' /></td>
                          </tr>
                          <tr>
                              <td align="center">Akhir</td>
                              <td><input type='text' class='form-control' name="akhir" value="<?=$indikator_sasaran_rpjmd->akhir ?>" placeholder='Target' /></td>
                              <td><input type='text' class='form-control' name="" value="<?=$indikator_sasaran_rpjmd->satuan ?>" placeholder='Satuan' /></td>
                          </tr>
                          </tbody>
                      </table>
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