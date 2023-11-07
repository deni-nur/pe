<section class="content-header">
      <h1>Program
        <small>Data Program</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Master</li>
        <li>DPA</li>
        <li class="active">Program</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Program</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/program/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
                        <!-- <th width="5%">No</th> -->
                        <th>Bidang Urusan / Program</th>
						<th width="13%">Actions</th>
					</tr>
                    <?php $i = 0; $no = 0; 
                        foreach($renstra->result() as $key => $data_rens) {
                        foreach($program->result() as $key2 => $data_prog) {
                            if($data_rens->b_urusan == $data_prog->b_urusan) {
                            ++$i;
                        if($i==1) { ?>
                    <tr>
                        <th colspan="3"><?=$data_rens->k_urusan ?> <?=$data_prog->b_urusan ?></th>
                    </tr>
                    <?php } ?>
				</thead>
				<tbody>
                    <tr>
                        <!-- <td><?=++$no; ?>.</td> -->
                        <td><?=$data_rens->k_urusan ?>.<?=$data_prog->kode_rek ?> <?=$data_prog->nama_program ?>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/program/'.$data_prog->program_id.'/ik_program') ?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus"></i> Indikator Program
                            </a>
                        </td>
                        <td>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/program/edit/'.$data_prog->program_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_program" data-programid="<?=$data_prog->program_id?>" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>        
                <?php }} $i=0; } ?>
				</tbody>
			</table>
		</div>
	</div>

</section>

<script>
    $(document).on('click', '#del_program', function() {
    if (confirm('Apakah anda yakin?')) {
        var program_id = $(this).data('programid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('program/del_program')?>',
            dataType : 'json',
            data : {'program_id' : program_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Program');
                }
            }
        })
    }
})
</script>