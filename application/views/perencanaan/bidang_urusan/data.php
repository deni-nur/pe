<section class="content-header">
      <h1>Bidang Urusan
        <small>Bidang Urusan SPPD</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Perencanaan</li>
        <li class="active">Bidang Urusan</li>
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
			<h3 class="box-title">Data Bidang Urusan</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/bidang_urusan/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No</th>
                        <th>Kode</th>
						<th>Uraian</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;
                        foreach($bidang_urusan->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%"><?=$no++ ?>.</td>
                            <td><?=$data->kode ?></td>
                            <td><?=$data->uraian_bidang_urusan ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$data->portal_id.'/bidang_urusan/edit/'.$data->bidang_urusan_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del" data-bidang_urusanid="<?=$data->bidang_urusan_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del', function() {
    if (confirm('Apakah anda yakin?')) {
        var bidang_urusan_id = $(this).data('bidang_urusanid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('bidang_urusan/del')?>',
            dataType : 'json',
            data : {'bidang_urusan_id' : bidang_urusan_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Bidang Urusan');
                }
            }
        })
    }
})
</script>