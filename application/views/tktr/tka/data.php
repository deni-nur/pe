<section class="content-header">
  <h1>Perusahaan
    <small>Perusahaan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Perusahaan</li>
  </ol>
</section>

<section class="content">
<?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Perusahaan</h3>

</div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Tanggal Berdiri</th>
                    <th>KBLI</th>
                    <th>Kepemilikan</th>
                    <th>Capital Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                foreach($perusahaan->result() as $key => $data) { ?>
                <tr>
                    <td><?=$no++ ?>.</td>
                    <td><?=$data->nama_perusahaan ?>
                        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tka/'.$data->perusahaan_id.'/data_tka') ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-plus"></i> TKA
                        </a>
                    </td>
                    <td><?=$data->alamat ?></td>
                    <td><?=$data->tanggal_berdiri ?></td>
                    <td><?=$data->kbli ?></td>
                    <td><?=$data->kepemilikan ?></td>
                    <td><?=$data->capital_status ?></td>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>
</section>