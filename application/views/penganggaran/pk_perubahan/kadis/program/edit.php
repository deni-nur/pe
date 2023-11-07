<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan/'.$this->uri->segment(4).'/lampiran/'.$this->uri->segment(6).'/program_pk_kadis_edit/'.$program_pk_kadis_perubahan->program_pk_kadis_perubahan_id),' class="form-horizontal"');
?>
<section class="content-header">
      <h1>Perjanjian Kinerja Perubahan Esselon II
        <small>Perjanjian Kinerja Perubahan Esselon II</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Penganggaran</li>
        <li>Perjanjian Kinerja Perubahan</li>
        <li class="active">Esselon II</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Perjanjian Kinerja Perubahan Esselon II</h3>
        <div class="pull-right">
            <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan/'.$this->uri->segment(4).'/lampiran/'.$this->uri->segment(6).'/program_pk_kadis') ?>" class="btn btn-warning">
            <i class="fa fa-undo"></i> Back
          </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
                    <div class="form-group">
                    <label for="program_id">Nama Program *</label>
                    <div class="input-group">
                        <input type="hidden" name="program_id" value="<?=$program_pk_kadis_perubahan->program_id ?>" id="program_id">
                        <input type="text" name="nama_program" value="<?=$program_pk_kadis_perubahan->nama_program ?>" id="nama_program" class="form-control" required readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-program"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="pagu_program">Pagu Anggaran *</label>
                        <input type="number" name="pagu_anggaran" value="<?=$program_pk_kadis_perubahan->pagu_anggaran ?>" id="pagu_program" class="form-control">
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

<div>
<div class="modal fade" id="modal-program">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Pilih Pihak Kedua</h4>
</div>
<div class="modal-body table-responsive">
    <table class="table table-bordered table-striped" id="table1" >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
            <?php $no = 0; foreach($program->result() as $key => $data) { ?>
        </thead>
        <tbody>
            <tr>
                <td width="5%"><?=++$no; ?>.</td>
                <td><?=$data->nama_program ?></td>
                <td class="text-center">
                    <button class="btn btn-xs btn-info" id="select-program"
                    data-program_id="<?=$data->program_id ?>"
                    data-nama_program="<?=$data->nama_program ?>">
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
    $(document).on('click', '#select-program', function() {
    var program_id = $(this).data('program_id');
    var nama_program = $(this).data('nama_program');
    $('#program_id').val(program_id);
    $('#nama_program').val(nama_program);
    $('#modal-program').modal('hide');
  })
})
</script>