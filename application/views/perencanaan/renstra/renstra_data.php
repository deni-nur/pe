<section class="content-header">
  <h1>RENSTRA
    <small>RENSTRA</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li class="active">RENSTRA</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data RENSTRA</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/renstra/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No</th>
                        <th>Sasaran RPJMD</th>
                        <th>Bidang Urusan</th>
                        <th>Sasaran PD</th>
                        <th>Penanggung Jawab</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;
                        foreach($renstra->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%"><?=$no++ ?>.</td>
                            <td><?=$data->sasaran_daerah ?></td>
                            <td><?=$data->b_urusan ?></td>
                            <td><?=$data->sasaran ?>
                                <br>
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/renstra/'.$data->renstra_id.'/ik_sasaran_renstra') ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-plus"></i> Indikator Sasaran
                                </a>
                            </td>
                            <td><?=$data->p_jawab ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/renstra/edit/'.$data->renstra_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_renstra" data-renstraid="<?=$data->renstra_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_renstra', function() {
    if (confirm('Apakah anda yakin?')) {
        var renstra_id = $(this).data('renstraid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('renstra/del_renstra')?>',
            dataType : 'json',
            data : {'renstra_id' : renstra_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Renstra');
                }
            }
        })
    }
})
</script>