<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/program/'.$this->uri->segment(4).'/ik_program/edit/'.$ik_program->ik_program_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Indikator Program
    <small>Indikator Program</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Renstra</li>
    <li>Program</li>
    <li class="active">Indikator Program</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Indikator Program</h3>
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
                    <label for="name">Indikator Program *</label>
                    </div>
                    <div class="form-group">
                       <textarea name="name" class="form-control" required><?=$ik_program->name ?></textarea>
                    </div>
                    <div>
                    <label for="formulasi">Formulasi </label>
                    </div>
                    <div class="form-group">
                      <textarea name="formulasi" rows="4" class="form-control"><?=$ik_program->formulasi ?></textarea>
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