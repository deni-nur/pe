<section class="content-header">
      <h1>Pejabat
        <small>Penandatangan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Master</li>
        <li class="active">Pejabat Penandatangan</li>
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
			<h3 class="box-title">Data Pejabat Penandatangan</h3>
			<div class="pull-right">
				<a href="<?=site_url('ttd/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th width="20%">Nama Pegawai</th>
						<th>Pangkat / Gol</th>
						<th>Jabatan</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				 <?php $no =1;
					foreach($row->result() as $key => $data) { ?>
					<tr>
						<td style="width: 5%"><?=$no++ ?>.</td>
						<td><?=$data->ttd_name ?></td>
						<td><?=$data->pangkat ?><?=$data->gol ?></td>
						<td><?=$data->jabatan_ttd ?></td>
						<td class="text-center" width="160px">
	    						<a href="<?=site_url('ttd/edit/'.$data->ttd_id) ?>" class="btn btn-warning btn-xs">
	    							<i class="fa fa-pencil"></i> Update
	    						</a>
	    						<a href="<?=site_url('ttd/del/'.$data->ttd_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
	    							<i class="fa fa-trash"></i> Delete
	    						</a>
						</td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>

</section>