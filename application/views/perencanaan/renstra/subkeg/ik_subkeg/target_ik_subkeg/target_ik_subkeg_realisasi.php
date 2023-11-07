<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/subkeg/'.$this->uri->segment(4).'/ik_subkeg/'.$this->uri->segment(6).'/target_ik_subkeg/realisasi/'.$target_ik_subkeg->target_ik_subkeg_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Realisasi Indikator Sub Kegiatan
    <small>Realisasi Indikator Sub Kegiatan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Renstra</li>
    <li class="active">Realisasi Indikator Sub Kegiatan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Realisasi Indikator Sub Kegiatan</h3>
        <div class="pull-right">
            <a href="<?=base_url('portal/'.$this->uri->segment(2).'/subkeg/'.$this->uri->segment(4).'/ik_subkeg/'.$this->uri->segment(6).'/target_ik_subkeg') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
            </a>
        </div>
    </div>
<div class="box-body">
<div class="row">
<div class="col-md-12">
<div class="form-group">
      <label class="col-xs-12 font-bold">Target Indikator</label>
      <div class="col-xs-12">
          <table class="table table-striped" id="">
              <thead>
              <tr valign="top">
                  <th class="font-bold" width="100" style="vertical-align: middle;">Tahun</th>
                  <th class="font-bold" width="100" style="vertical-align: middle;">Target</th>
                  <th class="font-bold" width="100" style="vertical-align: middle;">Realisasi IK Sub Kegiatan</th>
                  <th class="font-bold" width="100" style="vertical-align: middle;">Satuan</th>
                  <th class="font-bold" width="100" style="vertical-align: middle;">Pagu</th>
                  <th class="font-bold" width="100" style="vertical-align: middle;">Realisasi Pagu</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <td><input type="text" class="form-control" name="tahun" value="<?=$target_ik_subkeg->tahun ?>" readonly /></td>
                  <td><input type='text' class='form-control' name='target' value="<?=$target_ik_subkeg->target ?>" readonly /></td>
                  <td><input type='text' class='form-control' name='realisasi_ik_subkeg' value="<?=$target_ik_subkeg->realisasi_ik_subkeg ?>" /></td>
                  <td><input type='text' class='form-control' name='satuan' value="<?=$target_ik_subkeg->satuan ?>" readonly /></td>
                  <td><input type='text' class='form-control' name='pagu' value="<?=$target_ik_subkeg->pagu ?>" readonly /></td>
                  <td><input type='text' class='form-control' name='realisasi_pagu' value="<?=$target_ik_subkeg->realisasi_pagu ?>" /></td>
              </tr>
              
              </tbody>
          </table>

    <div class="col-md-12">
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-success btn-flat">
            <i class="fa fa-paper-plane"></i> Save</button>
        <button type="reset" class="btn btn-flat">Reset</button>
    </div>
</div>
</section>
<?php echo form_close(); ?>