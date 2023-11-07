<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/dpa/'.$this->uri->segment(4).'/belanja_pergeseran/'.$belanja->belanja_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Belanja Pergeseran Sub Kegiatan PD
    <small>Belanja Pergeseran Sub Kegiatan PD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Penganggaran</li>
    <li>DPA</li>
    <li>Sub Kegiatan</li>
    <li class="active">Belanja Pergeseran Sub Kegiatan PD</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Belanja Pergeseran Sub Kegiatan PD</h3>
        <div class="pull-right">
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa/'.$this->uri->segment(4).'/belanja') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                    
                    <div class="form-group">
                        <label>Sub Kegiatan *</label>
                        <input type="text" name="" value="<?=$dpa->nama_subkeg ?>" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Belanja *</label>
                        <select name="a_belanja_id" class="form-control" required readonly>
                            <option value="">- Pilih -</option>
                            <?php foreach ($a_belanja->result() as $key => $data) { ?>
                                <option value="<?=$data->a_belanja_id ?>" <?=$data->a_belanja_id==$belanja->a_belanja_id ? "selected" : null ?>><?=$data->kode_rek ?> <?=$data->nama_rek ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pagu Anggaran *</label>
                        <input type="number" name="pagu_belanja" value="<?=$belanja->pagu_belanja ?>" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Pagu Pergeseran *</label>
                        <input type="number" name="pagu_pergeseran" value="<?=$belanja->pagu_pergeseran ?>" class="form-control" required>
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