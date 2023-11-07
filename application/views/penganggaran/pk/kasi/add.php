<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pk_kasi/add'),' class="form-horizontal"');
?>
<section class="content-header">
      <h1>Perjanjian Kinerja Esselon IV
        <small>Perjanjian Kinerja Esselon IV</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Penganggaran</li>
        <li>Perjanjian Kinerja</li>
        <li class="active">Esselon IV</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Perjanjian Kinerja Esselon IV</h3>
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
                    <label for="nama_pihak_pertama">Pihak Pertama *</label>
                    <div class="input-group">
                        <input type="text" name="nama_pihak_pertama" id="nama_pihak_pertama" class="form-control" required readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-pertama"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="jabatan_pihak_pertama">Jabatan Pihak Pertama *</label>
                        <input type="text" name="jabatan_pihak_pertama" id="jabatan_pihak_pertama" class="form-control">
                    </div>

                    <div class="form-group">
                    <label for="pk_kabid_id">Nama Pihak Kedua *</label>
                        <select name="pk_kabid_id" id="pk_kabid_id" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach($pk_kabid->result() as $key => $data) { ?>
                            <option value="<?=$data->pk_kabid_id ?>"><?=$data->nama_pihak_pertama ?></option>
                        <?php } ?>
                        </select>
                    </div>
                
                    <div class="form-group">
                    <label for="sub_bidang">Nama Sub Bidang *</label>
                        <input type="text" name="sub_bidang" id="sub_bidang" class="form-control">
                    </div>

                    <br>
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

<div>
<div class="modal fade" id="modal-pertama">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Pilih Pihak Pertama</h4>
</div>
<div class="modal-body table-responsive">
    <table class="table table-bordered table-striped" id="example1" >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Action</th>
            </tr>
            <?php $no = 0; foreach($pegawai->result() as $key => $data) { ?>
        </thead>
        <tbody>
            <tr>
                <td width="5%"><?=++$no; ?>.</td>
                <td><?=$data->name ?></td>
                <td><?=$data->jabatan_name ?></td>
                <td class="text-center">
                    <button class="btn btn-xs btn-info" id="select-pertama"
                    data-nama_pihak_pertama="<?=$data->name ?>"
                    data-jabatan_pihak_pertama="<?=$data->jabatan_name ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>



<script>
$(document).ready(function() {
    $(document).on('click', '#select-pertama', function() {
    var nama_pihak_pertama = $(this).data('nama_pihak_pertama');
    var jabatan_pihak_pertama = $(this).data('jabatan_pihak_pertama');
    $('#nama_pihak_pertama').val(nama_pihak_pertama);
    $('#jabatan_pihak_pertama').val(jabatan_pihak_pertama);
    $('#modal-pertama').modal('hide');
  })
})

</script>