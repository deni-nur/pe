<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/tujuan/'.$tujuan->tujuan_id.'/sasaran/'.$sasaran->sasaran_id.'/program/edit/'.$program->program_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Program PD
    <small>Program PD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Cascading RENSTRA</li>
    <li class="active">Program PD</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Program PD</h3>
        <div class="pull-right">
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/program') ?>" class="btn btn-warning btn-flat">
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
                        <select name="tujuan_id" class="form-control" readonly>
                                <option value="<?=$tujuan->tujuan_id ?>"><?=$tujuan->uraian_tujuan ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sasaran *</label>
                        <input type="text" name="uraian_sasaran" value="<?=$sasaran->uraian_sasaran ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Kode Program *</label>
                        <input type="text" name="kode_program" value="<?=$program->kode_program ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Program *</label>
                        <input type="text" name="nama_program" value="<?=$program->nama_program ?>" class="form-control" required>
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