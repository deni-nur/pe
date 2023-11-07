<section class="content-header">
  <h1>RPJMD
    <small>RPJMD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li class="active">RPJMD</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data RPJMD</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/rpjmd/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No</th>
                        <th>Visi</th>
						<th>Misi</th>
                        <th>Tujuan</th>
                        <th>Sasaran RPJMD</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;
                        foreach($rpjmd->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%"><?=$no++ ?>.</td>
                            <td><?=$data->visi ?></td>
                            <td><?=$data->misi ?></td>
                            <td><?=$data->tujuan ?>
                               <a href="<?=site_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$data->rpjmd_id.'/ik_tujuan_rpjmd') ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-plus"></i> Indikator Tujuan
                                </a> 
                            </td>
                            <td><?=$data->sasaran ?>
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$data->rpjmd_id.'/ik_sasaran_rpjmd') ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-plus"></i> Indikator Sasaran
                                </a>
                            </td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/rpjmd/edit/'.$data->rpjmd_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_rpjmd" data-rpjmdid="<?=$data->rpjmd_id?>" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                            </td>
                        </tr>
                        <?php
                        } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<script>
    $(document).on('click', '#del_rpjmd', function() {
    if (confirm('Apakah anda yakin?')) {
        var rpjmd_id = $(this).data('rpjmdid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('rpjmd/del_rpjmd')?>',
            dataType : 'json',
            data : {'rpjmd_id' : rpjmd_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus RPJMD');
                }
            }
        })
    }
})
</script>