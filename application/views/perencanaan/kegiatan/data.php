<section class="content-header">
  <h1>Kegiatan PD
    <small>Kegiatan PD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Cascading Renstra</li>
    <li class="active">Kegiatan PD</li>
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
            <h3 class="box-title">Data Kegiatan PD</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th rowspan="2" width="30%">Indikator</th>
                        <th colspan="7">Target</th>
                        <th colspan="5">Pagu</th>
                        <th rowspan="2" width="13%">Actions</th>
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
                    </tr>
                    <?php foreach($program->result() as $key3 => $data_program)
                        if($data_sasaran->uraian_sasaran == $data_program->uraian_sasaran) {
                            ++$i;
                            if($i==1) { ?>
                    <?php } ?>
                    <tr>
                        <th colspan="13">[PROGRAM] <?=$data_program->nama_program ?></th>
                        <th><a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_tujuan->tujuan_id.'/sasaran/'.$data_sasaran->sasaran_id.'/program/'.$data_program->program_id.'/kegiatan/add') ?>" class="btn btn-primary btn-xs" title="Kegiatan">
                                <i class="fa fa-plus"></i>
                            </a>
                        </th>
                    </tr>
                    <?php foreach($kegiatan->result() as $key4 => $data_kegiatan)
                        if($data_program->nama_program == $data_kegiatan->nama_program ) {
                            ++$i;
                            if($i==1) { ?>
                    <?php } ?>
                    <tr>
                        <th colspan="13">[KEGIATAN] <?=$data_kegiatan->nama_kegiatan ?></th>
                        <th>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_tujuan->tujuan_id.'/sasaran/'.$data_sasaran->sasaran_id.'/program/'.$data_program->program_id.'/kegiatan/'.$data_kegiatan->kegiatan_id.'/indikator_kegiatan_add') ?>" class="btn btn-info btn-xs" title="Indikator Kegiatan">
                            <i class="fa fa-plus"></i>
                        </a>  
                        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_tujuan->tujuan_id.'/sasaran/'.$data_sasaran->sasaran_id.'/program/'.$data_program->program_id.'/kegiatan/edit/'.$data_kegiatan->kegiatan_id) ?>" class="btn btn-warning btn-xs" title="Update">
                            <i class="fa fa-pencil"></i> 
                        </a>
                        <button id="del_kegiatan" data-kegiatanid="<?=$data_kegiatan->kegiatan_id?>" class="btn btn-xs btn-danger" title="Delete">
                            <i class="fa fa-trash"></i> 
                        </button>
                        </th>
                    </tr>
                    <?php 
                    foreach($indikator_kegiatan->result() as $key5 => $data_ik_kegiatan) {
                        if($data_kegiatan->nama_kegiatan == $data_ik_kegiatan->nama_kegiatan) {
                            ++$i;
                            if($i==1) { ?>
                    
                    <?php } ?>
                </thead>
                <tbody>
                       <tr>
                            <tr>
                            <td><?=$data_ik_kegiatan->uraian_indikator_kegiatan ?></td>
                            <td><?=$data_ik_kegiatan->awal ?> <?=$data_ik_kegiatan->satuan ?></td>
                            <td><?=$data_ik_kegiatan->satu ?> <?=$data_ik_kegiatan->satuan ?></td>
                            <td><?=$data_ik_kegiatan->dua ?> <?=$data_ik_kegiatan->satuan ?></td>
                            <td><?=$data_ik_kegiatan->tiga ?> <?=$data_ik_kegiatan->satuan ?></td>
                            <td><?=$data_ik_kegiatan->empat ?> <?=$data_ik_kegiatan->satuan ?></td>
                            <td><?=$data_ik_kegiatan->lima ?> <?=$data_ik_kegiatan->satuan ?></td>
                            <td><?=$data_ik_kegiatan->akhir ?> <?=$data_ik_kegiatan->satuan ?></td>
                            <td><?=indo_bil($data_ik_kegiatan->pagu_satu) ?></td>
                            <td><?=indo_bil($data_ik_kegiatan->pagu_dua) ?></td>
                            <td><?=indo_bil($data_ik_kegiatan->pagu_tiga) ?></td>
                            <td><?=indo_bil($data_ik_kegiatan->pagu_empat) ?></td>
                            <td><?=indo_bil($data_ik_kegiatan->pagu_lima) ?></td>
                            <td>
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_sasaran->tujuan_id.'/sasaran/'.$data_program->sasaran_id.'/program/'.$data_program->program_id.'/kegiatan/'.$data_kegiatan->kegiatan_id.'/indikator_kegiatan_edit/'.$data_ik_kegiatan->indikator_kegiatan_id) ?>" class="btn btn-warning btn-xs" title="Update">
                                    <i class="fa fa-pencil"></i> 
                                </a>
                                <button id="del_indikator_kegiatan" data-indikatorkegiatanid="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>" class="btn btn-xs btn-danger" title="Delete">
                                    <i class="fa fa-trash"></i> 
                                </button>
                            </td>
                        </tr> 
                        <?php }}} $i=0; }}} $a=0; }}} ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    $(document).on('click', '#del_kegiatan', function() {
    if (confirm('Apakah anda yakin?')) {
        var kegiatan_id = $(this).data('kegiatanid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('kegiatan/del_kegiatan')?>',
            dataType : 'json',
            data : {'kegiatan_id' : kegiatan_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Kegiatan PD');
                }
            }
        })
    }
});

    $(document).on('click', '#del_indikator_kegiatan', function() {
    if (confirm('Apakah anda yakin?')) {
        var indikator_kegiatan_id = $(this).data('indikatorkegiatanid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('kegiatan/del_indikator_kegiatan')?>',
            dataType : 'json',
            data : {'indikator_kegiatan_id' : indikator_kegiatan_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Indikator Kegiatan PD');
                }
            }
        })
    }
});
</script>