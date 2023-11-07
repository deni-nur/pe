<section class="content-header">
      <h1>Dasar Hukum
        <small>Dasar Hukum SPPD</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Master</li>
        <li class="active">Dasar Hukum</li>
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
			<h3 class="box-title">Data Dasar Hukum</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/darhum/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>Name Dasar Hukum</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;
                        foreach($darhum as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%"><?=$no++ ?>.</td>
                            <td><?=$data->name ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$data->portal_id.'/darhum/edit/'.$data->darhum_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_darhum" data-darhumid="<?=$data->darhum_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_darhum', function() {
    if (confirm('Apakah anda yakin?')) {
        var darhum_id = $(this).data('darhumid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('darhum/del_darhum')?>',
            dataType : 'json',
            data : {'darhum_id' : darhum_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Dasar Hukum');
                }
            }
        })
    }
})
</script>