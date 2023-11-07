<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/st/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Surat Tugas
    <small>Surat Tugas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>SPJ</li>
    <li class="active">Surat Tugas</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
     <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page) ?> Surat Tugas</h3>
            <div class="pull-right">
                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/st') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <label>No Surat Tugas</label>
                            <input type="text" name="no_st" value="KP.11.00//Sekret/<?=date('Y') ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="darsur">Dasar Surat </label>
                            <textarea name="darsur" class="form-control" rows="4" ></textarea>
                        </div>
                        <div class="form-group">
                            <label>Maksud *</label>
                            <textarea name="maksud" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <!-- <label> Alamat </label> -->
                            <input type="hidden" name="alamat" class="form-control" value="Sukabumi" readonly>
                        </div>
                        <div class="form-group">
                            <label>Pelaksana *</label>
                            <select name="pegawai_id" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach ($pegawai->result() as $pegawai) { ?>
                                <option value="<?=$pegawai->pegawai_id ?>"><?=$pegawai->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Surat *</label>
                           <input type="date" name="tanggal_surat" value="<?=date('Y-m-d') ?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Pejabat Penandatangan *</label>
                            <select name="ttd_id" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach ($ttd->result() as $ttd) { ?>
                                <option value="<?=$ttd->ttd_id ?>"><?=$ttd->ttd_name ?></option>
                                <?php } ?>
                            </select>
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