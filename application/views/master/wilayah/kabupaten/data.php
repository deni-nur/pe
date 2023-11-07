<section class="content-header">
  <h1>Kabupaten
    <small>Data Kabupaten</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li>Wilayah</li>
    <li class="active">Kabupaten</li>
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
			<h3 class="box-title">Data Kabupaten</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/kabupaten/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Provinsin / Kabupaten</th>
                        <th width="15%">Actions</th>
                    </tr>
                    <?php $i = 0; $no =0;
                        foreach($provinsi->result() as $key => $data_prov) {
                        foreach($kabupaten->result() as $key1 => $data_kab) {
                            if($data_prov->provinsi_id == $data_kab->provinsi_id) { 
                                ++$i;
                                if($i==1) { ?>
                    <tr>
                        <th colspan="3"><?=$data_kab->nama_provinsi ?></th>
                    </tr>
                    <?php } ?>
                </thead>
                <tbody>
                    <tr>
                        <td><?=++$no; ?>.</td>
                        <td><?=$data_kab->name ?></td>
                        <td>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kabupaten/edit/'.$data_kab->kabupaten_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_kabupaten" data-kabupatenid="<?=$data_kab->kabupaten_id?>" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>   
                        </td>
                    </tr>   
                    <?php }} $i=0; } ?>
                </tbody>
            </table>
		</div>
</section>

<script>
    $(document).on('click', '#del_kabupaten', function() {
    if (confirm('Apakah anda yakin?')) {
        var kabupaten_id = $(this).data('kabupatenid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('kabupaten/del_kabupaten')?>',
            dataType : 'json',
            data : {'kabupaten_id' : kabupaten_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Kabupaten');
                }
            }
        })
    }
})
</script>