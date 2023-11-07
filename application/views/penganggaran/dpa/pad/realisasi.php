<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pad/realisasi/'.$pad->pad_id),' class="form-horizontal"');
?>
<section class="content-header">
      <h1>IMTA
        <small>Data IMTA</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Perencanaan</li>
        <li>Renja</li>
        <li class="active">IMTA</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> IMTA</h3>
        <div class="pull-right">
            <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pad') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
                <div class="form-group">
                    <label for="uraian">Uraian *</label>
                        <textarea name="uraian" id="uraian" rows="5" class="form-control" required autofocus readonly><?=$pad->uraian ?></textarea>
                    </div>

                    <div class="form-group">
                    <label for="target">Target *</label>
                        <input type="number" name="target" id="target" value="<?=$pad->target ?>" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                    <label for="realisasi">Realisasi *</label>
                        <input type="number" name="realisasi" id="realisasi" value="<?=$pad->realisasi ?>" class="form-control" required>
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