<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/tujuan/'.$tujuan->tujuan_id.'/sasaran/'.$sasaran->sasaran_id.'/indikator_sasaran_realisasi/'.$indikator_sasaran->indikator_sasaran_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Indikator Sasaran PD
    <small>Indikator Sasaran PD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Cascading RENSTRA</li>
    <li class="active">Realisasi Indikator Sasaran PD</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?=ucfirst($page) ?> Indikator Sasaran PD</h3>
		<div class="pull-right">
			<a href="<?=site_url('portal/'.$this->uri->segment(2).'/sasaran') ?>" class="btn btn-warning btn-flat">
				<i class="fa fa-undo"></i> Back
			</a>
		</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
                    
                    <div class="form-group">
                        <label>Bidang Urusan *</label>
                        <select name="bidang_urusan_id" class="form-control" readonly>
                            <?php foreach($bidang_urusan->result() as $key => $data) { ?>
                                <option value="<?=$data->bidang_urusan_id ?>" <?=$data->bidang_urusan_id == $tujuan->bidang_urusan_id ? "selected" : null ?>><?=$data->uraian_bidang_urusan ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sasaran RPJMD *</label>
                        <select name="sasaran_rpjmd_id" class="form-control" readonly>
                            <?php foreach($sasaran_rpjmd->result() as $key => $data) { ?>
                                <option value="<?=$data->sasaran_rpjmd_id ?>" <?=$data->sasaran_rpjmd_id == $tujuan->sasaran_rpjmd_id ? "selected" : null ?>><?=$data->uraian ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tujuan *</label>
                        <input type="text" name="" value="<?=$tujuan->uraian_tujuan ?>" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Sasaran *</label>
                        <input type="text" name="" value="<?=$sasaran->uraian_sasaran ?>" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Tolok Ukur Indikator *</label>
                        <input type="text" name="uraian_indikator_sasaran" value="<?=$indikator_sasaran->uraian_indikator_sasaran ?>" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                    <table class="table table-striped" id="">
                          <thead>
                          <tr>
                              <th class="font-bold" width="70" style="vertical-align: middle;">Tahun</th>
                              <th class="font-bold" width="100" style="vertical-align: middle;">Target</th>
                              <th class="font-bold" width="100" style="vertical-align: middle;">Realisasi</th>
                              <th class="font-bold" width="100" style="vertical-align: middle;">Satuan</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <td>Target Awal</td>
                              <td><input type='text' class='form-control' name="awal" value="<?=$indikator_sasaran->awal ?>" placeholder='Target' readonly/></td>
                              <td><input type='text' class='form-control' name="r_awal" value="<?=$indikator_sasaran->r_awal ?>" placeholder='Realisasi' /></td>
                              <td><input type='text' class='form-control' name='' value="<?=$indikator_sasaran->satuan ?>" placeholder='Satuan' readonly/></td>
                          </tr>
                          <tr>
                              <td align="center">1</td>
                              <td><input type='text' class='form-control' name="satu" value="<?=$indikator_sasaran->satu ?>" placeholder='Target' readonly/></td>
                              <td><input type='text' class='form-control' name="r_satu" value="<?=$indikator_sasaran->r_satu ?>" placeholder='Realisasi' /></td>
                              <td><input type='text' class='form-control' name="satuan" value="<?=$indikator_sasaran->satuan ?>" placeholder='Satuan' readonly/></td>
                          </tr>
                          <tr>
                              <td align="center">2</td>
                              <td><input type='text' class='form-control' name="dua" value="<?=$indikator_sasaran->dua ?>" placeholder='Target' readonly/></td>
                              <td><input type='text' class='form-control' name="r_dua" value="<?=$indikator_sasaran->r_dua ?>" placeholder='Realisasi' /></td>
                              <td><input type='text' class='form-control' name="" value="<?=$indikator_sasaran->satuan ?>" placeholder='Satuan' readonly/></td>
                          </tr>
                          <tr>
                              <td align="center">3</td>
                              <td><input type='text' class='form-control' name="tiga" value="<?=$indikator_sasaran->tiga ?>" placeholder='Target' readonly/></td>
                              <td><input type='text' class='form-control' name="r_tiga" value="<?=$indikator_sasaran->r_tiga ?>" placeholder='Realisasi' /></td>
                              <td><input type='text' class='form-control' name="" value="<?=$indikator_sasaran->satuan ?>" placeholder='Satuan' readonly/></td>
                          </tr>
                          <tr>
                              <td align="center">4</td>
                              <td><input type='text' class='form-control' name="empat" value="<?=$indikator_sasaran->empat ?>" placeholder='Target' readonly/></td>
                              <td><input type='text' class='form-control' name="r_empat" value="<?=$indikator_sasaran->r_empat ?>" placeholder='Realisasi' /></td>
                              <td><input type='text' class='form-control' name="" value="<?=$indikator_sasaran->satuan ?>" placeholder='Satuan' readonly/></td>
                          </tr>
                          <tr>
                              <td align="center">5</td>
                              <td><input type='text' class='form-control' name="lima" value="<?=$indikator_sasaran->lima ?>" placeholder='Target' readonly/></td>
                              <td><input type='text' class='form-control' name="r_lima" value="<?=$indikator_sasaran->r_lima ?>" placeholder='Realisasi' /></td>
                              <td><input type='text' class='form-control' name="" value="<?=$indikator_sasaran->satuan ?>" placeholder='Satuan' readonly/></td>
                          </tr>
                          <tr>
                              <td align="center">Akhir</td>
                              <td><input type='text' class='form-control' name="akhir" value="<?=$indikator_sasaran->akhir ?>" placeholder='Target' readonly/></td>
                              <td><input type='text' class='form-control' name="r_akhir" value="<?=$indikator_sasaran->r_akhir ?>" placeholder='Realisasi' /></td>
                              <td><input type='text' class='form-control' name="" value="<?=$indikator_sasaran->satuan ?>" placeholder='Satuan' readonly/></td>
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