<section class="content-header">
      <h1>IMTA
        <small>Data IMTA</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Perencanaan</li>
        <li>Renja</li>
        <li class="active">IMTA</li>
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
			<h3 class="box-title">IMTA</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/pad/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="5%">No</th>
                        <th>Uraian</th>
                        <th>Target</th>
                        <th>Realisasi</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>	
					<?php $no=1; foreach ($pad->result() as $key => $data) { ?>				
	                <tr>
	                	<td><?=$no++ ?>.</td>
	                    <td><?=$data->uraian ?></td>
	                    <td><?=indo_currency($data->target) ?></td>
	                    <td><?=indo_currency($data->realisasi) ?>
	                    	<a href="<?=site_url('portal/'.$this->uri->segment(2).'/pad/realisasi/'.$data->pad_id) ?>" class="btn btn-info btn-xs">
					            <i class="fa fa-plus"></i> Realisasi
					        </a>
	                    </td>
	                    <td class="text-center" width="160px">
	                        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pad/edit/'.$data->pad_id) ?>" class="btn btn-warning btn-xs">
	                            <i class="fa fa-pencil"></i> Update
	                        </a>
	                        <button id="del_pad" data-padid="<?=$data->pad_id ?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_pad', function() {
    if (confirm('Apakah anda yakin?')) {
        var pad_id = $(this).data('padid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pad/del_pad')?>',
            dataType : 'json',
            data : {'pad_id' : pad_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Sub Kegiatan');
                }
            }
        })
    }
})
</script>