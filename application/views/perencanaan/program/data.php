<section class="content-header">
  <h1>Program PD
    <small>Program PD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Cascading Renstra</li>
    <li class="active">Program PD</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>"></div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Program PD</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th rowspan="2" width="30%">Indikator</th>
                        <th colspan="7">Target</th>
                        <th colspan="5">Pagu</th>
                        <th rowspan="2" width="14%">Actions</th>
                    </tr>
                    <tr>
                        <th>Awal</th>
                        <th>2022</th>
                        <th>2023</th>
                        <th>2024</th>
                        <th>2025</th>
                        <th>2026</th>
                        <th>Akhir</th>
                        <th>2022</th>
                        <th>2023</th>
                        <th>2024</th>
                        <th>2025</th>
                        <th>2026</th>
                    </tr>
                    <?php 
                    $i = 0; $no = 0; $a=0;
                    foreach($bidang_urusan->result() as $key => $data_bid_urusan) {
                    foreach($tujuan->result() as $key1 => $data_tujuan) {
                        if($data_bid_urusan->uraian_bidang_urusan == $data_tujuan->uraian_bidang_urusan) { 
                            ++$a;
                            if($a==1) { ?>
                    <tr>
                        <th colspan="14">[URUSAN] <?=$data_tujuan->uraian_bidang_urusan ?></th>
                    </tr>
                    <tr>
                        <th colspan="14">[TUJUAN] <?=$data_tujuan->uraian_tujuan ?></th>
                    </tr>
                    <?php } ?>
                    <?php 
                        foreach($sasaran->result() as $key2 => $data_sasaran) {
                        if($data_tujuan->uraian_tujuan == $data_sasaran->uraian_tujuan) { ?>
                        
                    <tr>
                        <th colspan="13">[SASARAN] <?=$data_sasaran->uraian_sasaran ?></th>
                        <th><a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_tujuan->tujuan_id.'/sasaran/'.$data_sasaran->sasaran_id.'/program/add') ?>" class="btn btn-primary btn-xs" title="Program">
                                <i class="fa fa-plus"></i>
                            </a>
                        </th>
                    </tr>
                    <?php foreach($program->result() as $key3 => $data_program)
                        if($data_sasaran->uraian_sasaran == $data_program->uraian_sasaran) {
                            ++$i;
                            if($i==1) { ?>
                    <?php } ?>
                    
                    <tr>
                        <th colspan="13">[PROGRAM] <?=$data_program->nama_program ?></th>
                        <th>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_tujuan->tujuan_id.'/sasaran/'.$data_sasaran->sasaran_id.'/program/'.$data_program->program_id.'/indikator_program_add') ?>" class="btn btn-info btn-xs" title="Indikator Program">
                            <i class="fa fa-plus"></i>
                        </a>  
                        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_tujuan->tujuan_id.'/sasaran/'.$data_sasaran->sasaran_id.'/program/edit/'.$data_program->program_id) ?>" class="btn btn-warning btn-xs" title="Update">
                            <i class="fa fa-pencil"></i> 
                        </a>
                        <button id="del_program" data-programid="<?=$data_program->program_id?>" class="btn btn-xs btn-danger" title="Delete">
                            <i class="fa fa-trash"></i> 
                        </button>
                        </th>
                    </tr>
                    <?php 
                    foreach($indikator_program->result() as $key4 => $data_ik_program) {
                        if($data_program->nama_program == $data_ik_program->nama_program) {
                            ++$i;
                            if($i==1) { ?>
                    
                    <?php } ?>
                </thead>
                <tbody>
                        <tr>
                            <tr>
                            <td rowspan="4"><?=$data_ik_program->uraian_indikator_program ?></td>
                            <td><?=$data_ik_program->awal ?> <?=$data_ik_program->satuan ?></td>
                            <td><?=$data_ik_program->satu ?> <?=$data_ik_program->satuan ?></td>
                            <td><?=$data_ik_program->dua ?> <?=$data_ik_program->satuan ?></td>
                            <td><?=$data_ik_program->tiga ?> <?=$data_ik_program->satuan ?></td>
                            <td><?=$data_ik_program->empat ?> <?=$data_ik_program->satuan ?></td>
                            <td><?=$data_ik_program->lima ?> <?=$data_ik_program->satuan ?></td>
                            <td><?=$data_ik_program->akhir ?> <?=$data_ik_program->satuan ?></td>
                            <td rowspan="3"><?=indo_bil($data_ik_program->pagu_satu) ?></td>
                            <td rowspan="3"><?=indo_bil($data_ik_program->pagu_dua) ?></td>
                            <td rowspan="3"><?=indo_bil($data_ik_program->pagu_tiga) ?></td>
                            <td rowspan="3"><?=indo_bil($data_ik_program->pagu_empat) ?></td>
                            <td rowspan="3"><?=indo_bil($data_ik_program->pagu_lima) ?></td>
                            <td>
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_tujuan->tujuan_id.'/sasaran/'.$data_sasaran->sasaran_id.'/program/'.$data_program->program_id.'/indikator_program_realisasi/'.$data_ik_program->indikator_program_id) ?>" class="btn btn-default btn-xs" title="Realisasi">
                                    <i class="fa fa-plus"></i> 
                                </a>
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_sasaran->tujuan_id.'/sasaran/'.$data_program->sasaran_id.'/program/'.$data_ik_program->program_id.'/indikator_program_edit/'.$data_ik_program->indikator_program_id) ?>" class="btn btn-warning btn-xs" title="Update">
                                    <i class="fa fa-pencil"></i> 
                                </a>
                                <button id="del_indikator_program" data-indikatorprogramid="<?=$data_ik_program->indikator_program_id ?>" class="btn btn-xs btn-danger" title="Delete">
                                    <i class="fa fa-trash"></i> 
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="7">Realisasi</th>
                        </tr>
                        <tr>
                            <th>Awal</th>
                            <th>2022</th>
                            <th>2023</th>
                            <th>2024</th>
                            <th>2025</th>
                            <th>2026</th>
                            <th>Akhir</th>
                        </tr>
                        <tr>
                            <td><?=$data_ik_program->r_awal ?> <?=$data_ik_program->satuan ?></td>
                            <td><?=$data_ik_program->r_satu ?> <?=$data_ik_program->satuan ?></td>
                            <td><?=$data_ik_program->r_dua ?> <?=$data_ik_program->satuan ?></td>
                            <td><?=$data_ik_program->r_tiga ?> <?=$data_ik_program->satuan ?></td>
                            <td><?=$data_ik_program->r_empat ?> <?=$data_ik_program->satuan ?></td>
                            <td><?=$data_ik_program->r_lima ?> <?=$data_ik_program->satuan ?></td>
                            <td><?=$data_ik_program->r_akhir ?> <?=$data_ik_program->satuan ?></td>
                        </tr>
                        <?php }}} $i=0; }}} $a=0; }} ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    $(document).on('click', '#del_program', function() {
    if (confirm('Apakah anda yakin?')) {
        var program_id = $(this).data('programid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('program/del_program')?>',
            dataType : 'json',
            data : {'program_id' : program_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Program PD');
                }
            }
        })
    }
});

    $(document).on('click', '#del_indikator_program', function() {
    if (confirm('Apakah anda yakin?')) {
        var indikator_program_id = $(this).data('indikatorprogramid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('program/del_indikator_program')?>',
            dataType : 'json',
            data : {'indikator_program_id' : indikator_program_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Indikator Program PD');
                }
            }
        })
    }
});
</script>