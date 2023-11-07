<section class="content-header">
  <h1>Jabatan
    <small>Jabatan Pegawai</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li class="active">Jabatan</li>
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
			<h3 class="box-title">Data Jabatan</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/jabatan/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Jabatan</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				 <?php $no =1;
                    foreach($jabatan as $key => $data) { ?>
                    <tr>
                        <td style="width: 5%"><?=$no++ ?>.</td>
                        <td><?=$data->name ?></td>
                        <td class="text-center" width="160px">
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/jabatan/edit/'.$data->jabatan_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                            <button id="del_jabatan" data-jabatanid="<?=$data->jabatan_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_jabatan', function() {
    if (confirm('Apakah anda yakin?')) {
        var jabatan_id = $(this).data('jabatanid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('jabatan/del_jabatan')?>',
            dataType : 'json',
            data : {'jabatan_id' : jabatan_id},
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