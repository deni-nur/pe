<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pk_kadis/'.$this->uri->segment(4).'/lampiran_add'),' class="form-horizontal"');
?>
<section class="content-header">
      <h1>Perjanjian Kinerja Esselon II
        <small>Perjanjian Kinerja Esselon II</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Penganggaran</li>
        <li>Perjanjian Kinerja</li>
        <li class="active">PK Esselon II</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Perjanjian Kinerja Esselon II</h3>
        <div class="pull-right">
            <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pk_kadis/'.$this->uri->segment(4).'/lampiran') ?>" class="btn btn-warning">
            <i class="fa fa-undo"></i> Back
          </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
                    <div class="form-group">
                    <label for="sasaran_id">Sasaran Strategis *</label>
                    <div class="input-group">
                        <input type="hidden" name="sasaran_id" id="sasaran_id">
                        <input type="text" name="uraian_sasaran" id="uraian_sasaran" class="form-control" required readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-sasaran"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="indikator_sasaran_id">Indikator Kinerja *</label>
                        <input type="text" name="indikator_sasaran_id" id="indikator_sasaran_id" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                    <label for="satuan">Satuan *</label>
                        <input type="text" name="satuan" id="satuan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                    <label for="target">Target Tahunan *</label>
                        <input type="text" name="target_tahunan" id="target" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="triw_1">Triwulan 1 </label>
                        <input type="text" name="triwulan_1" id="triw_1" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="triw_2">Triwulan 2 </label>
                        <input type="text" name="triwulan_2" id="triw_2" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="triw_3">Triwulan 3 </label>
                        <input type="text" name="triwulan_3" id="triw_3" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="triw_4">Triwulan 4 </label>
                        <input type="text" name="triwulan_4" id="triw_4" class="form-control">
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
<div class="modal fade" id="modal-sasaran">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Pilih Sasaran</h4>
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
            foreach($sasaran->result() as $key => $data_sasaran) {
            foreach($indikator_sasaran->result() as $key1 => $data_ik_sasaran) {
                if($data_sasaran->uraian_sasaran == $data_ik_sasaran->uraian_sasaran) {
                    ++$i;
                    if($i==1) { ?>
            <tr>
                <th colspan="8">[SASARAN] <?=$data_sasaran->uraian_sasaran ?></th>
            </tr>
            <?php } ?>
        </thead>
        <tbody>
            <tr>
                <td><?=$data_ik_sasaran->uraian_indikator_sasaran ?></td>
                <td><?=$data_ik_sasaran->awal ?> <?=$data_ik_sasaran->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-sasaran"
                    data-sasaran_id="<?=$data_sasaran->sasaran_id ?>"
                    data-uraian_sasaran="<?=$data_sasaran->uraian_sasaran ?>"
                    data-indikator_sasaran_id="<?=$data_ik_sasaran->uraian_indikator_sasaran ?>"
                    data-satuan="<?=$data_ik_sasaran->satuan ?>"
                    data-target="<?=$data_ik_sasaran->awal?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_sasaran->satu ?> <?=$data_ik_sasaran->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-sasaran"
                    data-sasaran_id="<?=$data_sasaran->sasaran_id ?>"
                    data-uraian_sasaran="<?=$data_sasaran->uraian_sasaran ?>"
                    data-indikator_sasaran_id="<?=$data_ik_sasaran->uraian_indikator_sasaran ?>"
                    data-satuan="<?=$data_ik_sasaran->satuan ?>"
                    data-target="<?=$data_ik_sasaran->satu ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_sasaran->dua ?> <?=$data_ik_sasaran->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-sasaran"
                    data-sasaran_id="<?=$data_sasaran->sasaran_id ?>"
                    data-uraian_sasaran="<?=$data_sasaran->uraian_sasaran ?>"
                    data-indikator_sasaran_id="<?=$data_ik_sasaran->uraian_indikator_sasaran ?>"
                    data-satuan="<?=$data_ik_sasaran->satuan ?>"
                    data-target="<?=$data_ik_sasaran->dua ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_sasaran->tiga ?> <?=$data_ik_sasaran->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-sasaran"
                    data-sasaran_id="<?=$data_sasaran->sasaran_id ?>"
                    data-uraian_sasaran="<?=$data_sasaran->uraian_sasaran ?>"
                    data-indikator_sasaran_id="<?=$data_ik_sasaran->uraian_indikator_sasaran ?>"
                    data-satuan="<?=$data_ik_sasaran->satuan ?>"
                    data-target="<?=$data_ik_sasaran->tiga ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_sasaran->empat ?> <?=$data_ik_sasaran->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-sasaran"
                    data-sasaran_id="<?=$data_sasaran->sasaran_id ?>"
                    data-uraian_sasaran="<?=$data_sasaran->uraian_sasaran ?>"
                    data-indikator_sasaran_id="<?=$data_ik_sasaran->uraian_indikator_sasaran ?>"
                    data-satuan="<?=$data_ik_sasaran->satuan ?>"
                    data-target="<?=$data_ik_sasaran->empat ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_sasaran->lima ?> <?=$data_ik_sasaran->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-sasaran"
                    data-sasaran_id="<?=$data_sasaran->sasaran_id ?>"
                    data-uraian_sasaran="<?=$data_sasaran->uraian_sasaran ?>"
                    data-indikator_sasaran_id="<?=$data_ik_sasaran->uraian_indikator_sasaran ?>"
                    data-satuan="<?=$data_ik_sasaran->satuan ?>"
                    data-target="<?=$data_ik_sasaran->lima ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_sasaran->akhir ?> <?=$data_ik_sasaran->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-sasaran"
                    data-sasaran_id="<?=$data_sasaran->sasaran_id ?>"
                    data-uraian_sasaran="<?=$data_sasaran->uraian_sasaran ?>"
                    data-indikator_sasaran_id="<?=$data_ik_sasaran->uraian_indikator_sasaran ?>"
                    data-satuan="<?=$data_ik_sasaran->satuan ?>"
                    data-target="<?=$data_ik_sasaran->akhir ?>">
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
    $(document).on('click', '#select-sasaran', function() {
    var target = $(this).data('target');
    var sasaran_id = $(this).data('sasaran_id');
    var uraian_sasaran = $(this).data('uraian_sasaran');
    var uraian_indikator_sasaran = $(this).data('indikator_sasaran_id');
    var satuan = $(this).data('satuan');
    $('#sasaran_id').val(sasaran_id);
    $('#uraian_sasaran').val(uraian_sasaran);
    $('#indikator_sasaran_id').val(uraian_indikator_sasaran);
    $('#satuan').val(satuan);
    $('#target').val(target);
    
    $('#modal-sasaran').modal('hide');
  })
})
</script>