<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pk_kabid/'.$this->uri->segment(4).'/lampiran_edit/'.$lampiran_pk_kabid->lampiran_pk_kabid_id),' class="form-horizontal"');
?>
<section class="content-header">
      <h1>Perjanjian Kinerja Esselon III
        <small>Perjanjian Kinerja Esselon III</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Penganggaran</li>
        <li>Perjanjian Kinerja</li>
        <li class="active">Esselon III</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Perjanjian Kinerja Esselon III</h3>
        <div class="pull-right">
            <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pk_kabid/'.$this->uri->segment(4).'/lampiran') ?>" class="btn btn-warning">
            <i class="fa fa-undo"></i> Back
          </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
                    <div class="form-group">
                    <label for="indikator_program_id">Sasaran Program *</label>
                    <div class="input-group">
                        <input type="hidden" name="indikator_program_id" value="<?=$lampiran_pk_kabid->indikator_program_id ?>" id="indikator_program_id">
                        <input type="text" name="uraian_indikator_program" value="<?=$lampiran_pk_kabid->uraian_indikator_program ?>" id="uraian_indikator_program" class="form-control" required readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-program"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="indikator_kegiatan_id">Indikator Kinerja *</label>
                    <div class="input-group">
                        <input type="hidden" name="indikator_kegiatan_id" value="<?=$lampiran_pk_kabid->indikator_kegiatan_id ?>" id="indikator_kegiatan_id">
                        <input type="text" name="uraian_indikator_kegiatan" value="<?=$lampiran_pk_kabid->uraian_indikator_kegiatan ?>" id="uraian_indikator_kegiatan" class="form-control" required readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-kegiatan"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="satuan">Satuan *</label>
                        <input type="text" name="satuan" id="satuan" value="<?=$lampiran_pk_kabid->satuan ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                    <label for="target">Target Tahunan *</label>
                        <input type="text" name="target_tahunan" value="<?=$lampiran_pk_kabid->target_tahunan ?>" id="target" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="triw_1">Triwulan 1 </label>
                        <input type="text" name="triwulan_1" value="<?=$lampiran_pk_kabid->triwulan_1 ?>" id="triw_1" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="triw_2">Triwulan 2 </label>
                        <input type="text" name="triwulan_2" value="<?=$lampiran_pk_kabid->triwulan_2 ?>" id="triw_2" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="triw_3">Triwulan 3 </label>
                        <input type="text" name="triwulan_3" value="<?=$lampiran_pk_kabid->triwulan_3 ?>" id="triw_3" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="triw_4">Triwulan 4 </label>
                        <input type="text" name="triwulan_4" value="<?=$lampiran_pk_kabid->triwulan_4 ?>" id="triw_4" class="form-control">
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
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Pilih Program</h4>
</div>
<div class="modal-body table-responsive">
    <table class="table table-bordered table-striped" id="example1" >
        <thead>
            <tr>
                <th>Indikator</th>
                <th>Target Awal</th>
                <th>Target 2022</th>
                <th>Target 2023</th>
                <th>Target 2024</th>
                <th>Target 2025</th>
                <th>Target 2026</th>
                <th>Target Akhir</th>
            </tr>
            <?php 
            $i = 0; $no = 0; $a=0;
            foreach($program->result() as $key => $data_program) {
            foreach($indikator_program->result() as $key1 => $data_ik_program) {
                if($data_program->nama_program == $data_ik_program->nama_program) {
                    ++$i;
                    if($i==1) { ?>
            <tr>
                <th colspan="8">[PROGRAM] <?=$data_program->nama_program ?></th>
            </tr>
            <?php } ?>
        </thead>
        <tbody>
            <tr>
                <td><?=$data_ik_program->uraian_indikator_program ?></td>
                <td><?=$data_ik_program->awal ?> <?=$data_ik_program->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-program"
                    data-indikator_program_id="<?=$data_ik_program->indikator_program_id ?>"
                    data-uraian_indikator_program="<?=$data_ik_program->uraian_indikator_program ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_program->satu ?> <?=$data_ik_program->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-program"
                    data-indikator_program_id="<?=$data_ik_program->indikator_program_id ?>"
                    data-uraian_indikator_program="<?=$data_ik_program->uraian_indikator_program ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_program->dua ?> <?=$data_ik_program->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-program"
                    data-indikator_program_id="<?=$data_ik_program->indikator_program_id ?>"
                    data-uraian_indikator_program="<?=$data_ik_program->uraian_indikator_program ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_program->tiga ?> <?=$data_ik_program->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-program"
                    data-indikator_program_id="<?=$data_ik_program->indikator_program_id ?>"
                    data-uraian_indikator_program="<?=$data_ik_program->uraian_indikator_program ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_program->empat ?> <?=$data_ik_program->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-program"
                    data-indikator_program_id="<?=$data_ik_program->indikator_program_id ?>"
                    data-uraian_indikator_program="<?=$data_ik_program->uraian_indikator_program ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_program->lima ?> <?=$data_ik_program->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-program"
                    data-indikator_program_id="<?=$data_ik_program->indikator_program_id ?>"
                    data-uraian_indikator_program="<?=$data_ik_program->uraian_indikator_program ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_program->akhir ?> <?=$data_ik_program->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-program"
                    data-indikator_program_id="<?=$data_ik_program->indikator_program_id ?>"
                    data-uraian_indikator_program="<?=$data_ik_program->uraian_indikator_program ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td>
                   
                </td>
            </tr>
            <?php } $i=0; } $a=0; } ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>

<div>
<div class="modal fade" id="modal-kegiatan">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Pilih Kegiatan</h4>
</div>
<div class="modal-body table-responsive">
    <table class="table table-bordered table-striped" id="example1" >
        <thead>
            <tr>
                <th>Indikator</th>
                <th>Target Awal</th>
                <th>Target 2022</th>
                <th>Target 2023</th>
                <th>Target 2024</th>
                <th>Target 2025</th>
                <th>Target 2026</th>
                <th>Target Akhir</th>
            </tr>
            <?php 
            $i = 0; $no = 0; $a=0;
            foreach($kegiatan->result() as $key => $data_kegiatan) {
            foreach($indikator_kegiatan->result() as $key1 => $data_ik_kegiatan) {
                if($data_kegiatan->nama_kegiatan == $data_ik_kegiatan->nama_kegiatan) {
                    ++$i;
                    if($i==1) { ?>
            <tr>
                <th colspan="8">[KEGIATAN] <?=$data_kegiatan->nama_kegiatan ?></th>
            </tr>
            <?php } ?>
        </thead>
        <tbody>
            <tr>
                <td><?=$data_ik_kegiatan->uraian_indikator_kegiatan ?></td>
                <td><?=$data_ik_kegiatan->awal ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>"
                    data-satuan="<?=$data_ik_kegiatan->satuan ?>"
                    data-target="<?=$data_ik_kegiatan->awal ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_kegiatan->satu ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>"
                    data-satuan="<?=$data_ik_kegiatan->satuan ?>"
                    data-target="<?=$data_ik_kegiatan->satu ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_kegiatan->dua ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>"
                    data-satuan="<?=$data_ik_kegiatan->satuan ?>"
                    data-target="<?=$data_ik_kegiatan->dua ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_kegiatan->tiga ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>"
                    data-satuan="<?=$data_ik_kegiatan->satuan ?>"
                    data-target="<?=$data_ik_kegiatan->tiga ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_kegiatan->empat ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>"
                    data-satuan="<?=$data_ik_kegiatan->satuan ?>"
                    data-target="<?=$data_ik_kegiatan->empat ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_kegiatan->lima ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>"
                    data-satuan="<?=$data_ik_kegiatan->satuan ?>"
                    data-target="<?=$data_ik_kegiatan->lima ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_kegiatan->akhir ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>"
                    data-satuan="<?=$data_ik_kegiatan->satuan ?>"
                    data-target="<?=$data_ik_kegiatan->akhir ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td>
                   
                </td>
            </tr>
            <?php } $i=0; } $a=0; } ?>
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
    var indikator_program_id = $(this).data('indikator_program_id');
    var nama_program = $(this).data('nama_program');
    var uraian_indikator_program = $(this).data('uraian_indikator_program');
    $('#indikator_program_id').val(indikator_program_id);
    $('#nama_program').val(nama_program);
    $('#uraian_indikator_program').val(uraian_indikator_program);
    
    $('#modal-program').modal('hide');
  })
})

$(document).ready(function() {
    $(document).on('click', '#select-kegiatan', function() {
    var indikator_kegiatan_id = $(this).data('indikator_kegiatan_id');
    var nama_kegiatan = $(this).data('nama_kegiatan');
    var uraian_indikator_kegiatan = $(this).data('uraian_indikator_kegiatan');
    var satuan = $(this).data('satuan');
    var target = $(this).data('target');
    $('#indikator_kegiatan_id').val(indikator_kegiatan_id);
    $('#nama_kegiatan').val(nama_kegiatan);
    $('#uraian_indikator_kegiatan').val(uraian_indikator_kegiatan);
    $('#satuan').val(satuan);
    $('#target').val(target);
    $('#modal-kegiatan').modal('hide');
  })
})
</script>