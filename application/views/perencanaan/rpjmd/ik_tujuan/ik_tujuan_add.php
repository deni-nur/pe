<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('rpjmd/ik_tujuan/'.$rpjmd->rpjmd_id.'/add'),' class="form-horizontal"');
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
              <label>Tahun *</label>
              <div class="form-group">
              <select name="tahun_perencanaan" class="form-control" required>
                  <option value="">- Pilih -</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
              </select>
              </div>
              </div>

                <div>
                    <label for="nama_ik_tujuan">Indikator Tujuan *</label>
                    </div>
                    <div class="form-group">
                       <textarea name="nama_ik_tujuan" class="form-control" required></textarea>
                    </div>
                    <div>
                    <label for="formulasi">Formulasi </label>
                    </div>
                    <div class="form-group">
                      <textarea name="formulasi" rows="4" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                      <label class="col-xs-12 font-bold">Target Indikator</label>
                      <div class="col-xs-12">
                          <table class="table table-striped" id="">
                              <thead>
                              <tr valign="top">
                                  <th class="font-bold" width="100" style="vertical-align: middle;">Tahun</th>
                                  <th class="font-bold" width="100" style="vertical-align: middle;">Target</th>
                                  <th class="font-bold" width="100" style="vertical-align: middle;">Satuan</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php for($i=0; $i < 7; $i++) : ?>
                              <tr>
                                  <td><input type="text" class="form-control" name="tahun[]" placeholder="Tahun"></td>
                                  <td><input type='text' class='form-control' name='target[]' placeholder='Target' /></td>
                                  <td><input type='text' class='form-control' name='satuan[]' placeholder='Satuan' /></td>
                              </tr>
                              <?php endfor; ?>
                              </tbody>
                          </table>
                      </div>
                  </div>

                    <div class="form-group">
                        <button type="submit" name="submit" value="submit" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
            </div>
        </div>
        
    </div>
</div>
</section>
<?php echo form_close(); ?>