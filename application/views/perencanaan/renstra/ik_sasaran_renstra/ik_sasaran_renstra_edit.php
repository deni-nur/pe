<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/renstra/'.$this->uri->segment(4).'/ik_sasaran_renstra/edit/'.$ik_sasaran_renstra->ik_sasaran_renstra_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Indikator Sasaran Renstra
    <small>Indikator Sasaran Renstra</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Renstra</li>
    <li class="active">Indikator Sasaran Renstra</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Indikator Sasaran Renstra</h3>
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
                    <label for="name">Indikator Sasaran Renstra *</label>
                    </div>
                    <div class="form-group">
                       <textarea name="name" class="form-control" required><?=$ik_sasaran_renstra->name ?></textarea>
                    </div>
                    <div>
                    <label for="formulasi">Formulasi </label>
                    </div>
                    <div class="form-group">
                      <textarea name="formulasi" rows="4" class="form-control"><?=$ik_sasaran_renstra->formulasi ?></textarea>
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