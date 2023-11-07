<section class="content-header">
      <h1>UMK
        <small>UMK</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Data TK Dan TR</li>
        <li class="active">UMK</li>
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
            <h3 class="box-title">Data UMK</h3>
            <div class="pull-right">
                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/umk/add') ?>" class="btn btn-success btn-flat">
                    <i class="fa fa-user-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>UMK</th>
                        <th width="20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                   	<?php $no =1;
                        foreach($umk->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%"><?=$no++ ?>.</td>
                            <td><?=indo_currency($data->jml_umk) ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/umk/edit/'.$data->umk_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_umk" data-umkid="<?=$data->umk_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_umk', function() {
    if (confirm('Apakah anda yakin?')) {
        var umk_id = $(this).data('umkid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('umk/del_umk')?>',
            dataType : 'json',
            data : {'umk_id' : umk_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data UMK');
                }
            }
        })
    }
})
</script>