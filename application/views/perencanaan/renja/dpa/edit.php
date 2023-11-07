<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/dpa/edit/'.$dpa->dpa_id),' class="form-horizontal"');
?>
<section class="content-header">
   <h1>Dokumen Pelaksanaan Anggaran
    <small>Data DPA</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Renja</li>
    <li class="active">DPA</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page) ?> DPA</h3>
            <div class="pull-right">
                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                        
                        <div class="form-group">
                        <label for="subkeg">Sub Kegiatan *</label>
                        <input type="hidden" name="subkeg_id" id="subkeg_id" value="<?=$dpa->subkeg_id ?>">
                        <textarea name="nama_subkeg" id="nama_subkeg" rows="5" class="form-control" required autofocus><?=$dpa->nama_subkeg ?></textarea>
                        <span class="input-group-btn btn-group-vertical">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-subkeg"><i class="fa fa-search"></i>
                            </button>
                        </span>
                        </div>

                        <div class="form-group">
                        <label for="indikator">Indikator *</label>
                            <textarea name="indikator" id="indikator" class="form-control" readonly><?=$dpa->indikator ?></textarea>
                        </div>

                        <div class="form-group">
                        <label for="target">Target *</label>
                            <input type="text" name="target" id="target" value="<?=$dpa->target ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                        <label for="satuan">Satuan *</label>
                            <input type="text" name="satuan" id="satuan" value="<?=$dpa->satuan ?>" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                        <label for="pagu">Pagu Anggaran *</label>
                            <input type="number" name="pagu" id="pagu" value="<?=$dpa->pagu ?>" class="form-control" required>
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