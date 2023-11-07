<section class="content-header">
  <h1>Pencaker
    <small>Pencaker</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data TK Dan TR</li>
    <li class="active">Pencaker</li>
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
                <a href="<?=site_url('pencaker/add') ?>" class="btn btn-success btn-flat">
                    <i class="fa fa-user-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   	
                </tbody>
            </table>
        </div>
    </div>

</section>