<section class="content-header">
  <h1>SP/SB
    <small>SP/SB</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data TK Dan TR</li>
    <li class="active">SP/SB</li>
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
            <h3 class="box-title">Data SP/SB</h3>
            <div class="pull-right">
                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/spsb/add') ?>" class="btn btn-success btn-flat">
                    <i class="fa fa-user-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama SP / SB</th>
                        <th>Federasi / Komfed</th>
                        <th>Jumlah PUK / PK / SP</th>
                        <th>Jumlah Anggota</th>
                        <th>Pencatatan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   	<?php $no =1;
                        foreach($spsb->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%"><?=$no++ ?>.</td>
                            <td><?=$data->nama_spsb ?></td>
                            <td><?=$data->federasi ?></td>
                            <td><?=indo_bil($data->jml_puk) ?></td>
                            <td><?=indo_bil($data->jml_anggota) ?></td>
                            <td><?=$data->pencatatan ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/spsb/edit/'.$data->spsb_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_spsb" data-spsbid="<?=$data->spsb_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_spsb', function() {
    if (confirm('Apakah anda yakin?')) {
        var spsb_id = $(this).data('spsbid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('spsb/del_spsb')?>',
            dataType : 'json',
            data : {'spsb_id' : spsb_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data SP/SB');
                }
            }
        })
    }
})
</script>