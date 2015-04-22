<?php
	require_once'koneksi.inc.php';
?>
<section class='content-header'>
	<h1>Data Supplier <small>Form data Supplier</small></h1>
	<ol class='breadcrumb'>
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Supplier</li>
	</ol>
</section>
<section class='content'>
	<div class='row'>
		<div class='col-xs-12'>
			<div class='box box-success'>
				<div class='box-header'>
					<h3 class='box-title'>Form Data Supplier</h3>
				</div>
				<div class='box-body'>
					<form action='' method='POST' role='form' id='formSupplier'>
						<div class='col-md-6'>
							<div class='form-group'>
								<label>Kode Supplier</label>
								<input type='text' class='form-control ' name='kd-sup' id='kdsup' required placeholder='Kode Supplier' />
							</div>
							<div class='form-group'>
								<label>Nama Supplier</label>
								<input type='text' name='nama-supplier' id='namasp' required placeholder='Nama Supplier' class='form-control' />
							</div>
							<div class='form-group'>
								<label>Alamat Supplier</label>
								<textarea name='alamatsup' id='almtsup' required class='form-control' ></textarea>
							</div>
						</div>
						<div class='col-md-6'>
							<div class='form-group'>
								<label>Telepon Supplier</label>
								<input type='text' name='tlpSup' id='tlpnsup' required placeholder='Telepon Supplier' class='form-control' />
							</div>'
							<div class='form-group'>
								<label>Atas Nama</label>
								<input type='text' name='an' id='ansup' class='form-control' required placeholder='Atas Nama' />
							</div>
							<button type='submit' class='btn btn-primary' id='tamsup' name='proses' value='inputSup' >Tambah Data</button>
							<!--<button type='submit' class='btn btn-primary' disabled id='editsup' name='proses' value='updateSup' >Ubah Data</button>-->
						</div>
					</form>
				</div>
				<br style='clear:both;' />
			</div>
		</div>
		<div class='col-xs-12'>
			<div class='box box-warning'>
				<div class='box-header'>
					<h3 class='box-title'>Tabel data Supplier</h3>
				</div>
				<div class='box-body table-responsive'>
					<table class='table table-bordered table-stripped'>
						<thead>
							<tr>
								<th width='4%'>#</th>
								<th width='28%'>Nama Supplier</th>
								<th>Alamat</th>
								<th width='20%'>No.Telpon</th>
								<th width='15%'>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$supsql="select nama_supplier,alamat,telepon from tb_supplier order by nama_supplier asc";
								$prosup=$db->prepare($supsql);
								$jumsub=$prosup->fetchColumn();
								$prosup->execute();
								$no=1;
								if($jumsub > 0){
									while($listsup=$prosup->fetch(PDO::FETCH_OBJ)){
										echo"<tr>";
										echo"<td>".$no."</td>";
										echo"<td>".$listsup->nama_supplier."</td>";
										echo"<td>".$listsup->alamat."</td>";
										echo"<td>".$listsup->telepon."</td>";
										echo"<td><a href=''>Edit</a> - <a href=''>Delete</a></td>";
										echo"</tr>";
									}
								}else{
									echo"<tr>";
									echo"<td colspan='5'>Tidak ada Data Supplier</td>";
									echo"</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
