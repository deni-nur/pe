<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('rpjmd/ik_tujuan/'.$rpjmd->rpjmd_id.'/realisasi/'.$ik_tujuan->ik_tujuan_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Indikator Tujuan
    <small>Indikator Tujuan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>RPJMD</li>
    <li class="active">Indikator Tujuan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Indikator Tujuan</h3>
        <div class="pull-right">
            <a onclick="javascript:history.back()" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
                    <div>
                    <label for="nama_ik_tujuan">Indikator Tujuan *</label>
                    </div>
                    <div class="form-group">
                        <select name="rpjmd_id" class="form-control" required readonly>
                            <option value="<?=$rpjmd->rpjmd_id?>"><?=$ik_tujuan->nama_ik_tujuan ?></option>
                        </select>
                    </div>

                    <div class="form-group grup_target_indikator">
                      <label class="col-xs-12 font-bold">Target Indikator</label>
                      <div class="col-xs-12">
                          <table class="table table-striped" id="table-indikator">
                              <thead>
                              <tr valign="top">
                                  <th class="font-bold" width="50" style="vertical-align: middle;">Tahun</th>
                                  <th class="font-bold" width="100" style="vertical-align: middle;">Target</th>
                                  <th class="font-bold" width="100" style="vertical-align: middle;">Satuan</th>
                                  <th class="font-bold" width="100" style="vertical-align: middle;">Realisasi</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td style="vertical-align:middle;text-align:center">Awal</td>
                                  <td><input type='text' class='form-control' name='awal_target' placeholder='Target' value="<?=$ik_tujuan->awal_target ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='awal_satuan' placeholder='Satuan' value="<?=$ik_tujuan->awal_satuan ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='awal_realisasi' placeholder='Realisasi' value="<?=$ik_tujuan_realisasi->awal_realisasi ?>" /></td>
                              </tr>
                                  <tr>
                                  <td style="vertical-align:middle;text-align:center">1</td>
                                  <td><input type='text' class='form-control' name='satu_target' placeholder='Target' value="<?=$ik_tujuan->satu_target ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='satu_satuan' placeholder='Satuan' value="<?=$ik_tujuan->satu_satuan ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='satu_realisasi' placeholder='Realisasi' value="<?=$ik_tujuan_realisasi->satu_realisasi ?>" /></td>
                              </tr>
                                  <tr>
                                  <td style="vertical-align:middle;text-align:center">2</td>
                                  <td><input type='text' class='form-control' name='dua_target' placeholder='Target' value="<?=$ik_tujuan->dua_target ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='dua_satuan' placeholder='Satuan' value="<?=$ik_tujuan->dua_satuan ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='dua_realisasi' placeholder='Realisasi' value="<?=$ik_tujuan_realisasi->dua_realisasi ?>" /></td>
                              </tr>
                                  <tr>
                                  <td style="vertical-align:middle;text-align:center">3</td>
                                  <td><input type='text' class='form-control' name='tiga_target' placeholder='Target' value="<?=$ik_tujuan->tiga_target ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='tiga_satuan' placeholder='Satuan' value="<?=$ik_tujuan->tiga_satuan ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='tiga_realisasi' placeholder='Realisasi' value="<?=$ik_tujuan_realisasi->tiga_realisasi ?>" /></td>
                              </tr>
                                  <tr>
                                  <td style="vertical-align:middle;text-align:center">4</td>
                                  <td><input type='text' class='form-control' name='empat_target' placeholder='Target' value="<?=$ik_tujuan->empat_target ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='empat_satuan' placeholder='Satuan' value="<?=$ik_tujuan->empat_satuan ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='empat_realisasi' placeholder='Realisasi' value="<?=$ik_tujuan_realisasi->empat_realisasi ?>" /></td>
                              </tr>
                                  <tr>
                                  <td style="vertical-align:middle;text-align:center">5</td>
                                  <td><input type='text' class='form-control' name='lima_target' placeholder='Target' value="<?=$ik_tujuan->lima_target ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='lima_satuan' placeholder='Satuan' value="<?=$ik_tujuan->lima_satuan ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='lima_realisasi' placeholder='Realisasi' value="<?=$ik_tujuan_realisasi->lima_realisasi ?>" /></td>
                              </tr>
                                  <tr>
                                  <td style="vertical-align:middle;text-align:center">Akhir</td>
                                  <td><input type='text' class='form-control' name='akhir_target' placeholder='Target' value="<?=$ik_tujuan->akhir_target ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='akhir_satuan' placeholder='Satuan' value="<?=$ik_tujuan->akhir_satuan ?>" readonly /></td>
                                  <td><input type='text' class='form-control' name='akhir_realisasi' placeholder='Realisasi' value="<?=$ik_tujuan_realisasi->akhir_realisasi ?>" /></td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
                <!-- </form> -->
            </div>
        </div>
        
    </div>
</div>
</section>
<?php echo form_close(); ?>