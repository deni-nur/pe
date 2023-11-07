<section class="content-header">
  <h1>Desa
    <small>Data Desa</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li>Wilayah</li>
    <li class="active">Desa</li>
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
			<h3 class="box-title">Data Desa</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/desa/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="5%">No</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>ID</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                    <?php $no =1;
                        foreach($desa->result() as $key1 => $data_desa) { ?>
                        <tr>
                            <td><?=$no++ ?>.</td>
                            <td><?=$data_desa->nama_kecamatan ?></td>
                            <td><?=$data_desa->name ?></td>
                            <td><?=$data_desa->desa_id ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/desa/edit/'.$data_desa->desa_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_desa" data-desaid="<?=$data_desa->desa_id?>" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<script>
    $(document).on('click', '#del_desa', function() {
    if (confirm('Apakah anda yakin?')) {
        var desa_id = $(this).data('desaid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('desa/del_desa')?>',
            dataType : 'json',
            data : {'desa_id' : desa_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Desa');
                }
            }
        })
    }
})
</script>