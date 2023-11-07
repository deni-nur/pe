<section class="content-header">
  <h1>Pencaker Menurut Pendidikan
    <small>Pencaker Menurut Pendidikan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data TK Dan TR</li>
    <li>Pencaker </li>
    <li class="active">Pencaker Menurut Pendidikan</li>
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
            <h3 class="box-title">Data Pencaker</h3>
            <div class="pull-right">
                <a href="<?=site_url('pencaker_pd/add') ?>" class="btn btn-success btn-flat">
                    <i class="fa fa-user-plus"></i> Create
                </a>
                <a href="<?=site_url('pencaker_pd/save') ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-user-plus"></i> Create Jumlah
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Tahun</th>
                        <th>Pendidikan</th>
                        <th width="20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no =1;
                foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++ ?>.</td>
                        <td><?=$data->tahun ?></td>
                        <td><?=$data->pendidikan ?></td>
                        <td>
                            <a href="<?=site_url('pencaker_pd/edit/'.$data->pencaker_pd_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <a href="<?=site_url('pencaker_pd/del/'.$data->pencaker_pd_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>   
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>