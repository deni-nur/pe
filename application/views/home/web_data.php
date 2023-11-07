<section class="content-header">
      <h1>Konfigurasi
        <small>Konfigurasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Perencanaan</li>
        <li class="active">Konfigurasi</li>
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
            <h3 class="box-title">Data Konfigurasi</h3>
            <div class="pull-right">
                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/konfigurasi/add') ?>" class="btn btn-success btn-flat">
                    <i class="fa fa-user-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Web</th>
                        <th>Tag Line</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Facebook</th>
                        <th>Instagram</th>
                        <th>Twitter</th>
                        <th>Youtube</th>
                        <th>Logo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                        foreach($konfigurasi->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$data->namaweb ?></td>
                        <td><?=$data->tagline ?></td>
                        <td><?=$data->email ?></td>
                        <td><?=$data->website ?></td>
                        <td><?=$data->telepon ?></td>
                        <td><?=$data->alamat ?></td>
                        <td><?=$data->facebook ?></td>
                        <td><?=$data->instagram ?></td>
                        <td><?=$data->twitter ?></td>
                        <td><?=$data->youtube ?></td>
                        <td>
                            <?php if($data->logo != null) { ?>
                            <img src="<?=base_url('assets/upload/image/'.$data->logo) ?>" width="80" class="img img-thumbnail">
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/konfigurasi/edit/'.$data->konfigurasi_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_konfigurasi" data-konfigurasiid="<?=$data->konfigurasi_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_konfigurasi', function() {
    if (confirm('Apakah anda yakin?')) {
        var konfigurasi_id = $(this).data('konfigurasiid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('konfigurasi/del_konfigurasi')?>',
            dataType : 'json',
            data : {'konfigurasi_id' : konfigurasi_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload('konfigurasi');
                } else {
                    alert('Gagal Konfigurasi');
                }
            }
        })
    }
})
</script>