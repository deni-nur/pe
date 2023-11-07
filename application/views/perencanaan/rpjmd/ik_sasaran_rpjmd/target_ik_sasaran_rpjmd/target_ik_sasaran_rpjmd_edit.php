<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$this->uri->segment(4).'/ik_sasaran_rpjmd/'.$this->uri->segment(6).'/target_ik_sasaran_rpjmd/edit/'.$target_ik_sasaran_rpjmd->target_ik_sasaran_rpjmd_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Target Indikator Sasaran RPJMD
    <small>Target Indikator Sasaran RPJMD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>RPJMD</li>
    <li class="active">Target Indikator Sasaran RPJMD</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Target Indikator Sasaran RPJMD</h3>
        <div class="pull-right">
            <a onclick="javascript:history.back()" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
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
                               
                              <tr>
                                  <td><input type="text" class="form-control" name="tahun" value="<?=$target_ik_sasaran_rpjmd->tahun ?>" /></td>
                                  <td><input type='text' class='form-control' name='target' value="<?=$target_ik_sasaran_rpjmd->target ?>" /></td>
                                  <td><input type='text' class='form-control' name='satuan' value="<?=$target_ik_sasaran_rpjmd->satuan ?>" /></td>
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