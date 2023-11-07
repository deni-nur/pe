<section class="content-header">
      <h1>Belanja Sub Kegiatan
        <small>Data Belanja Sub Kegiatan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Penganggaran</li>
        <li>DPA</li>
        <li>Sub Kegiatan</li>
        <li class="active">Belanja Sub Kegiatan</li>
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
			<h3 class="box-title">Data Belanja Sub Kegiatan</h3>
			<div class="pull-right">
                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa') ?>" class="btn btn-warning">
                    <i class="fa fa-undo"></i> Back
                </a>
                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa/'.$this->uri->segment(4).'/belanja_add') ?>" class="btn btn-success ">
                    <i class="fa fa-user-plus"></i> Create
                </a>
            </div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Belanja</th>
                        <th width="13%">Pagu Murni</th>
                        <!-- <th width="13%">Pagu Pergeseran</th> -->
                        <th width="13%">Pagu Perubahan</th>
                        <th width="13%">Bertambah / Berkurang</th>
                        <th width="13%">Actions</th>
                    </tr> 
                    <?php $no=1; $a=0;
                        foreach($dpa->result() as $key => $data_dpa) {
                        foreach($belanja->result() as $key => $data_belanja) {
                        if($data_dpa->dpa_id == $data_belanja->dpa_id) { 
                            ++$a;
                            if($a==1) { ?>
                    <tr>
                        <th>[SUB KEGIATAN] <?=$data_belanja->nama_subkeg ?></th>
                        <th><?=indo_currency($jumlah_pagu_belanja->jumlah_pagu_belanja) ?></th>
                        <!-- <th><?=indo_currency($jumlah_pagu_pergeseran->jumlah_pagu_pergeseran) ?></th> -->
                        <th><?=indo_currency($jumlah_pagu_perubahan->jumlah_pagu_perubahan) ?></th>
                        <th><?=indo_currency($jumlah_pagu_perubahan->jumlah_pagu_perubahan - $jumlah_pagu_belanja->jumlah_pagu_belanja) ?></th>
                    </tr>
                    <?php } ?>        
                </thead>
                <tbody>
                    
                    <tr>
                        <td><?=$data_belanja->kode_akun ?>.<?=$data_belanja->kode_kelompok ?>.<?=$data_belanja->kode_jenis ?>.<?=$data_belanja->kode_objek ?>.<?=$data_belanja->kode_rincian_objek ?>.<?=$data_belanja->kode_sub_rincian_objek ?> <?=$data_belanja->nama_sub_rincian_objek ?></td>
                        <td><?=indo_currency($data_belanja->pagu_belanja) ?></td>
                        <!-- <td><?=indo_currency($data_belanja->pagu_pergeseran) ?>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa/'.$data_belanja->dpa_id.'/belanja_pergeseran/'.$data_belanja->belanja_id) ?>" class="btn btn-primary btn-xs" title="Belanja Pergeseran">
                                <i class="fa fa-plus"></i> 
                            </a>
                        </td> -->
                        <td>
                            <?=indo_currency($data_belanja->pagu_perubahan) ?>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa/'.$data_belanja->dpa_id.'/belanja_perubahan/'.$data_belanja->belanja_id) ?>" class="btn btn-info btn-xs" title="Belanja Perubahan">
                                <i class="fa fa-plus"></i> 
                            </a>
                        </td>
                        <td><?=indo_currency($data_belanja->pagu_perubahan - $data_belanja->pagu_belanja) ?></td>
                        <td>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa/'.$data_belanja->dpa_id.'/belanja_edit/'.$data_belanja->belanja_id) ?>" class="btn btn-warning btn-xs" title="Update">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_belanja" data-belanjaid="<?=$data_belanja->belanja_id?>" class="btn btn-xs btn-danger" title="Delete">
                                <i class="fa fa-trash"></i> Delete
                        </td>
                    </tr> 
                    <?php }} $a=0; } ?>
                </tbody>
            </table>
		</div>
	</div>

</section>

<script>
    $(document).on('click', '#del_belanja', function() {
    if (confirm('Apakah anda yakin?')) {
        var belanja_id = $(this).data('belanjaid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('dpa/del_belanja')?>',
            dataType : 'json',
            data : {'belanja_id' : belanja_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Belanja Sub Kegiatan PD');
                }
            }
        })
    }
});
</script>