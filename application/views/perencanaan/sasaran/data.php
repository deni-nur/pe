<section class="content-header">
  <h1>Sasaran PD
    <small>Sasaran PD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Cascading Renstra</li>
    <li class="active">Sasaran PD</li>
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
            <h3 class="box-title">Data Sasaran PD</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th rowspan="2">Indikator</th>
                        <th colspan="7">Target</th>
                        <th rowspan="2" width="25%">Actions</th>
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
                    <?php 
                    $i = 0; $no = 0; $a=0;
                    foreach($bidang_urusan->result() as $key => $data_bid_urusan) {
                    foreach($tujuan->result() as $key1 => $data_tujuan) {
                        if($data_bid_urusan->uraian_bidang_urusan == $data_tujuan->uraian_bidang_urusan) { 
                            ++$a;
                            if($a==1) { ?>
                    <tr>
                        <th colspan="9">[URUSAN] <?=$data_tujuan->uraian_bidang_urusan ?></th>
                    </tr>
                    <tr>
                        <th colspan="8">[TUJUAN] <?=$data_tujuan->uraian_tujuan ?></th>
                        <th><a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_tujuan->tujuan_id.'/sasaran/add') ?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus"></i> Sasaran
                            </a>
                        </th>
                    </tr>
                    <?php } ?>
                    <?php 
                        foreach($sasaran->result() as $key2 => $data_sasaran) {
                        if($data_tujuan->uraian_tujuan == $data_sasaran->uraian_tujuan) {
                            ++$i;
                            if($i==1) { ?>
                    <tr>
                        <th colspan="8">[SASARAN] <?=$data_sasaran->uraian_sasaran ?></th>
                        <th>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_tujuan->tujuan_id.'/sasaran/'.$data_sasaran->sasaran_id.'/indikator_sasaran_add') ?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus"></i> Indikator Sasaran
                            </a>  
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_tujuan->tujuan_id.'/sasaran/edit/'.$data_sasaran->sasaran_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_sasaran" data-sasaranid="<?=$data_sasaran->sasaran_id?>" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </th>
                    </tr>
                    <?php } ?>
                    <?php 
                    foreach($indikator_sasaran->result() as $key3 => $data_ik_sasaran) {
                        if($data_sasaran->uraian_sasaran == $data_ik_sasaran->uraian_sasaran) {
                            ++$i;
                            if($i==1) { ?>
                    
                    <?php } ?>
                </thead>
                <tbody>
                        <tr>
                            <td rowspan="4"><?=$data_ik_sasaran->uraian_indikator_sasaran ?></td>
                            <td><?=$data_ik_sasaran->awal ?> <?=$data_ik_sasaran->satuan ?></td>
                            <td><?=$data_ik_sasaran->satu ?> <?=$data_ik_sasaran->satuan ?></td>
                            <td><?=$data_ik_sasaran->dua ?> <?=$data_ik_sasaran->satuan ?></td>
                            <td><?=$data_ik_sasaran->tiga ?> <?=$data_ik_sasaran->satuan ?></td>
                            <td><?=$data_ik_sasaran->empat ?> <?=$data_ik_sasaran->satuan ?></td>
                            <td><?=$data_ik_sasaran->lima ?> <?=$data_ik_sasaran->satuan ?></td>
                            <td><?=$data_ik_sasaran->akhir ?> <?=$data_ik_sasaran->satuan ?></td>
                            <td>
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_sasaran->tujuan_id.'/sasaran/'.$data_ik_sasaran->sasaran_id.'/indikator_sasaran_realisasi/'.$data_ik_sasaran->indikator_sasaran_id) ?>" class="btn btn-info btn-xs">
                                    <i class="fa fa-plus"></i> Realisasi
                                </a>
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_sasaran->tujuan_id.'/sasaran/'.$data_ik_sasaran->sasaran_id.'/indikator_sasaran_edit/'.$data_ik_sasaran->indikator_sasaran_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_indikator_sasaran" data-indikatorsasaranid="<?=$data_ik_sasaran->indikator_sasaran_id?>" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> Delete
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
                            <td><?=$data_ik_sasaran->r_awal ?> <?=$data_ik_sasaran->satuan ?></td>
                            <td><?=$data_ik_sasaran->r_satu ?> <?=$data_ik_sasaran->satuan ?></td>
                            <td><?=$data_ik_sasaran->r_dua ?> <?=$data_ik_sasaran->satuan ?></td>
                            <td><?=$data_ik_sasaran->r_tiga ?> <?=$data_ik_sasaran->satuan ?></td>
                            <td><?=$data_ik_sasaran->r_empat ?> <?=$data_ik_sasaran->satuan ?></td>
                            <td><?=$data_ik_sasaran->r_lima ?> <?=$data_ik_sasaran->satuan ?></td>
                            <td><?=$data_ik_sasaran->r_akhir ?> <?=$data_ik_sasaran->satuan ?></td>
                        </tr>
                        <?php }}} $i=0; }} $a=0; }} ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    $(document).on('click', '#del_sasaran', function() {
    if (confirm('Apakah anda yakin?')) {
        var sasaran_id = $(this).data('sasaranid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('sasaran/del_sasaran')?>',
            dataType : 'json',
            data : {'sasaran_id' : sasaran_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Sasaran PD');
                }
            }
        })
    }
});

    $(document).on('click', '#del_indikator_sasaran', function() {
    if (confirm('Apakah anda yakin?')) {
        var indikator_sasaran_id = $(this).data('indikatorsasaranid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('sasaran/del_indikator_sasaran')?>',
            dataType : 'json',
            data : {'indikator_sasaran_id' : indikator_sasaran_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Indikator Sasaran PD');
                }
            }
        })
    }
});
</script>