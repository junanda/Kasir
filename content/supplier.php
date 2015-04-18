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
					<form action='' method='POST' role='form'>
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
							<button type='submit' class='btn btn-primary' id='tamsup'>Tambah Data</button>
							<button type='submit' class='btn btn-primary' disabled id='editsup' >Ubah Data</button>
						</div>
					</form>
				</div>
				<br style='clear:both;' />
			</div>
		</div>
		<div class='col-xl-12'></div>
	</div>
</section>
