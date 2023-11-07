<section class="content-header">
      <h1>Pengikut
        <small>Pengikut</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>SPT</li>
        <li class="active">Pengikut</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Pengikut</h3>
			<div class="pull-right">
				<a href="<?=site_url('pengikut/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>Pengikut</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				 <?php $no =1;
					foreach($row->result() as $key => $data) { ?>
					<tr>
						<td style="width: 5%"><?=$no++ ?>.</td>
						<td style="width: 70%"><?=$data->pengikut_name ?> (<?=$data->jabatan_name?>)</td>
						<td class="text-center" width="160px">
	    					<a href="<?=site_url('pengikut/edit/'.$data->pengikut_id) ?>" class="btn btn-success btn-xs">
	    					<i class="fa fa-pencil"></i> Update
	    					</a>
	    					<a href="<?=site_url('pengikut/del/'.$data->pengikut_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
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