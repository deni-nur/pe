<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('rpjmd/ik_sasaran/'.$rpjmd->rpjmd_id.'/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Indikator Sasaran
    <small>Indikator Sasaran</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>RPJMD</li>
    <li class="active">Indikator Sasaran</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Indikator Sasaran</h3>
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
                    <label for="nama_ik_sasaran">Indikator Sasaran *</label>
                    </div>
                    <div class="form-group">
                       <input type="text" name="nama_ik_sasaran" class="form-control" required>
                    </div>
                    <div>
                    <label for="formulasi">Formulasi</label>
                    </div>
                    <div class="form-group">
                       <textarea name="formulasi" class="form-control"></textarea>
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
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td style="vertical-align:middle;text-align:center">Awal</td>
                                  <td><input type='text' class='form-control' name='awal_target' placeholder='Target' /></td>
                                  <td><input type='text' class='form-control' name='awal_satuan' placeholder='Satuan' /></td>
                              </tr>
                                                            <tr>
                                  <td style="vertical-align:middle;text-align:center">1</td>
                                  <td><input type='text' class='form-control' name='satu_target' placeholder='Target' /></td>
                                  <td><input type='text' class='form-control' name='satu_satuan' placeholder='Satuan' /></td>
                              </tr>
                                                            <tr>
                                  <td style="vertical-align:middle;text-align:center">2</td>
                                  <td><input type='text' class='form-control' name='dua_target' placeholder='Target' /></td>
                                  <td><input type='text' class='form-control' name='dua_satuan' placeholder='Satuan' /></td>
                              </tr>
                                                            <tr>
                                  <td style="vertical-align:middle;text-align:center">3</td>
                                  <td><input type='text' class='form-control' name='tiga_target' placeholder='Target' /></td>
                                  <td><input type='text' class='form-control' name='tiga_satuan' placeholder='Satuan' /></td>
                              </tr>
                                                            <tr>
                                  <td style="vertical-align:middle;text-align:center">4</td>
                                  <td><input type='text' class='form-control' name='empat_target' placeholder='Target' /></td>
                                  <td><input type='text' class='form-control' name='empat_satuan' placeholder='Satuan' /></td>
                              </tr>
                                                            <tr>
                                  <td style="vertical-align:middle;text-align:center">5</td>
                                  <td><input type='text' class='form-control' name='lima_target' placeholder='Target' /></td>
                                  <td><input type='text' class='form-control' name='lima_satuan' placeholder='Satuan' /></td>
                              </tr>
                                                            <tr>
                                  <td style="vertical-align:middle;text-align:center">Akhir</td>
                                  <td><input type='text' class='form-control' name='akhir_target' placeholder='Target' /></td>
                                  <td><input type='text' class='form-control' name='akhir_satuan' placeholder='Satuan' /></td>
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
            </div>
        </div>
        
    </div>
</div>
</section>
<?php echo form_close(); ?>