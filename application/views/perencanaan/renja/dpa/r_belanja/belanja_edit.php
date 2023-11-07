<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/dpa/'.$this->uri->segment(4).'/r_belanja/edit/'.$r_belanja->r_belanja_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Rincian Belanja
    <small>Data Rincian Belanja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Renja</li>
    <li class="active">Rincian Belanja</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?=ucfirst($page) ?> Rincian Belanja</h3>
      <div class="pull-right">
        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa/'.$this->uri->segment(4).'/r_belanja') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Back
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
                
                <div class="form-group">
                    <label>Kode / Nama Rekening *</label>
                    <select name="a_belanja_id" class="form-control" readonly >
                      <option value="<?=$r_belanja->a_belanja_id ?>"><?=$r_belanja->kode_rek ?> - <?=$r_belanja->nama_rek ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pagu Anggaran *</label>
                    <input type="text" name="jumlah" value="<?=$r_belanja->jumlah ?>" class="form-control" required>
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