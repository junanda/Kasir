<script>
	function showEdit(id){
		$("#proses").val("updatebarang");
		$("#tinput").html("Update Barang");
		$.ajax({
				url: 'proses/tb_barang.php',
				type: 'GET',
				data: 'q=detail&id='+id,
				success: function(data){
					detail = data.split("|");
					$("#barcode").val(detail[0]);
					$("#kategori").val(detail[1]);
					$("#subkategori").val(detail[2]);
					$("#unit").val(detail[3]);
					$("#size").val(detail[4]);
					$("#nama_barang").val(detail[5]);
					$("#cprice").val(detail[6]);
					$("#persen").val(detail[7]);
					$("#sprice").val(detail[8]);
					$("#minimum").val(detail[9]);
					$("#maximum").val(detail[10]);
					$("#stock").val(detail[11]);
				}
		});
	}
</script>
<section class="content-header">
 <h1>
   Data Barang
   <small>Form data Barang</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Barang</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class='col-xs-12'>
			<div class='box'>
				<div class='box-header'>
					<h3 class='box-title'>Form Barang</h3>
				</div>
				<div class='box-body'>
					<div id="status" style="display:none"></div>
					<form action='' method='POST' role='form' id="formBarang">
						<input type="hidden" name="proses" value="tambahbarang" id="proses">
						<table width='100%'>
							<tr>
								<td>
									<div class='form-group'>
										<label>Barcode</label>
										<input type='text' id="barcode" class='form-control' name='kode' placeholder='Enter Barcode' required />
									</div>
									<div class='form-group'>
										<label>Kategory</label>
										<select class='form-control' name='kategori' id="kategori">
										</select>
									</div>
									<div class='form-group'>
										<label>Sub Category</label>
										<select class='form-control' name='subkategori' id="subkategori">
											<option>Pilih Sub Kategory</option>
										</select>
									</div>
									<div class='form-group'>
										<label>Unit</label>
										<input type='text' class='form-control' id="unit" name='unit' placeholder='Unit' required />
									</div>
									
								</td>
								<td width='5%'></td>
								<td>
									<div class='form-group'>
										<label>Size</label>
										<input type='text' class='form-control' id="size" name='size' placeholder='Size' required />
									</div>
									<div class='form-group'>
										<label>Description/Nama Barang</label>
										<input type='text' class='form-control' name='nama_barang' id="nama_barang" placeholder='Nama barang' required />
									</div>
									<div class='form-group'>
										<label>Cost Price</label>
										<input type='text' class='form-control' name='cprice' id="cprice" placeholder='Cost Price' required />
									</div>
									<div class='form-group'>
										<label>Precentase</label>
										<input type='text' class='form-control' name='persen' id="persen" placeholder='Persen' required style='width:160px;'/>
									</div>
								</td>
								<td width='5%'></td>
								<td>
									<div class='form-group'>
										<label>Selling Price</label>
										<input type='text' class='form-control' name='sprice' id="sprice" placeholder='Selling Price' required />
									</div>
									<div class='form-group'>
										<label>Minimum Stock</label>
										<input type='text' class='form-control' name='minimum' id="minimum" placeholder='Minimum Stock' required />
									</div>
									<div class='form-group'>
										<label>Maximum Stock</label>
										<input type='text' class='form-control' name='maximum' id="maximum" placeholder='Maximum Stock' required />
									</div>
									<div class='form-group'>
										<label>Stock</label>
										<input type='text' class='form-control' name='stock' id="stock" placeholder='Stock' required />
									</div>
								</td>
							</tr>
						</table>
						<button class='btn btn-primary' id="tinput" type="submit">Input Barang</button>
						
					</form>
				</div>
				<br style='clear:both' />
			</div>
			<div class='box'>
				<div class="box-header">
					<h3 class='box-title'>Tabel Data Barang</h3>
					<form role='form'>
						<div class='input-group input-group-sm' style='width:260px; float:right;margin-top:10px;margin-right:10px;'>
							<input class='form-control' type='text' name='cari' placeholder='Cari Nama Barang' />
							<span class='input-group-btn'>
								<button class='btn btn-info btn-flat' type='submit'>Go!</button>
							</span>
						</div>
					</form>
				</div>
				<div class='box-body table-responsive'>
					<table id='example1' class='table table-bordered table-striped'>
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Barang</th>
								<th>Kategory</th>
								<th>Sub kategory</th>
								<th>Unit</th>
								<th>Size</th>
								<th>Cost Price</th>
								<th>Selling Price</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="tb_barang">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
