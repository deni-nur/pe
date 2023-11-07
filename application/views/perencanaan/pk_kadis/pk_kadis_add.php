<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('pk_kadis/'.$renstra->renstra_id.'/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Target Indikator Kinerja
    <small>Target Indikator Kinerja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Renstra</li>
    <li class="active">Target Indikator Kinerja</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Target Indikator Kinerja</h3>
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
                        <label>Tahun *</label>
                        <select name="tahun" class="form-control" required>
                            <option value="">- Tahun -</option>
                            <?php
                            $now=date('Y');
                            for ($a=2020;$a<=$now;$a++) { ?>
                            <option value="<?=$a ?>"> <?=$a ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <label for="target">Target Indikator *</label>
                    </div>
                    <div class="form-group input-group">
                        <input type="text" name="ik_sasaran_id" id="ik_sasaran_id">
                        <input type="text" name="awal_target" id="awal_target" value="" class="form-control" readonly autofocus>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-belanja"><i class="fa fa-search"></i>
                            </button>
                        </span>
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