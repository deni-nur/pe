<section class="content-header">
      <h1>Rekening
        <small>Data Rekening</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Master</li>
        <li class="active">Rekening</li>
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
			<h3 class="box-title">Data Rekening</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/rekening/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th>Nomor Rekening</th>
						<th>Nama Bank</th>
						<th>Nama Pemilik</th>
						<th width="13%">Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php $no=1; foreach ($rekening as $key => $data): ?>
					<tr>
						<td><?=$no++ ?>.</td>
						<td><?=$data->rek_bank ?></td>
						<td><?=$data->nama_bank ?></td>
						<td><?=$data->nama_pemilik ?></td>
						<td>
							<a href="<?=site_url('portal/'.$this->uri->segment(2).'/rekening/edit/'.$data->rekening_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_rekening" data-rekeningid="<?=$data->rekening_id?>" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>
						</td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<script>
    $(document).on('click', '#del_rekening', function() {
    if (confirm('Apakah anda yakin?')) {
        var rekening_id = $(this).data('rekeningid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('rekening/del_rekening')?>',
            dataType : 'json',
            data : {'rekening_id' : rekening_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Rekening');
                }
            }
        })
    }
})
</script>