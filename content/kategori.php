<?php
	require_once'koneksi.inc.php';
	$pro='Input';
	$pro2='Tambah';
	$prokat='inputkategori';
	$prosubkat='inputsubkategori';
	$dis1='';
	$dis2='';
	$kdkel='';
	$nmkel='';
	
	if(isset($_GET['q']) &&	$_GET['q']=='editingkel'){
		$pro="Update";
		$prokat="updatekategori";
		$dis2="disabled";
		
		$u="select kode_kelompok_barang,nama_kelompok_barang from tb_kelompok_barang where kode_kelompok_barang=?";
		$pros=$db->prepare($u);
		$pros->bindParam(1,$_GET['id']);
		$pros->execute();
		$nilai=$pros->fetch(PDO::FETCH_OBJ);
	}else if(isset($_GET['q']) and $_GET['q']=='editingsub'){
		$pro2="Ubah";
		$prosubkat="updatesubkategori";
		$dis1="disabled";
		
		$us="select a.kode_satuan_barang, a.nama_satuan_barang, a.kode_kelompok_barang, b.nama_kelompok_barang from tb_satuan_barang a inner join tb_kelompok_barang b where a.kode_kelompok_barang=b.kode_kelompok_barang and kode_satuan_barang=?";
		$prous=$db->prepare($us);
		$prous->bindParam(1,$_GET['id']);
		$prous->execute();
		$subbar=$prous->fetch(PDO::FETCH_OBJ);
	}
	
	
	function hitj($id){
		$dai=new PDO('mysql:host=localhost;dbname=kasir','root','triadpass');
		$sqli="select count(kode_satuan_barang) from tb_satuan_barang where kode_kelompok_barang='".$id."'";
		$dadi=$dai->query($sqli);
		return $dadi->fetchColumn();
	}
	function trku($idk,$no,$row){
		$da=new PDO('mysql:host=localhost;dbname=kasir','root','triadpass');
		$lo="select * from tb_kelompok_barang where kode_kelompok_barang=?";
		$cek=$da->prepare($lo);
		$cek->bindParam(1,$idk);
		$cek->execute();		
		$cetak=$cek->fetch(PDO::FETCH_OBJ);
		echo"<tr>";
		echo"<td ".$row.">".$no."</td>";
		echo"<td colspan='2'>".$cetak->nama_kelompok_barang."</td>";
		echo"<td><a href='?p=kategori&q=editingkel&id=".$cetak->kode_kelompok_barang."'>Edit</a> - <a href='proses/pro_kat_barang.php?proses=delkel&id=".$cetak->kode_kelompok_barang."'>Delete</a></td>";
		echo"</tr>";
		
		  $li="select kode_satuan_barang,nama_satuan_barang from tb_satuan_barang where kode_kelompok_barang=?";
		$cece=$da->prepare($li);
		$cece->bindParam(1,$idk);
		$cece->execute();
		if($cece->columnCount()>0){
			$a=1;
			while($satuan=$cece->fetch(PDO::FETCH_OBJ)){
				echo"<tr>";
				echo"<td width='5%'>".$no.".".$a."</td>";
				echo"<td>".$satuan->nama_satuan_barang."</td>";
				echo"<td><a href='?p=kategori&q=editingsub&id=".$satuan->kode_satuan_barang."'>Edit</a> - <a href='proses/pro_kat_barang.php?proses=delsub&id=".$satuan->kode_satuan_barang."'>Delete</a></td>";
				echo"</tr>";
				$a++;
			}
		}	
		
		$da=null;
	}
?>
<section class="content-header">
 <h1>
   Kategory Barang
   <small>Form Category</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Kategory Barang</li>
  </ol>
</section>
<section class='content'>
	<div class='row'>
		<div class='col-md-6'>
			<div class='box box-primary'>
				<div class='box-header'>
					<h3 class='box-title'>Form Kategori Barang</h3>
				</div>
				<form role='form' action='proses/pro_kat_barang.php' method='POST'>
					<div class='box-body'>
						<input type='hidden' name='kode_kel_ba' value='<?php echo (isset($nilai->kode_kelompok_barang)? $nilai->kode_kelompok_barang:"");?>' />
						<div class='form-group'>
							<label>Nama Kategory</label>
							<input type='text' id="cat" class='form-control' name='cat' placeholder='Enter Name Category' value='<?php echo (isset($nilai->nama_kelompok_barang)? $nilai->nama_kelompok_barang:"");?>' required />
						</div>
					</div>
					<div class='box-footer'>
						<button class='btn btn-primary' type='submit' name='proses' value='<?=$prokat?>' <?php echo $dis1;?> ><?=$pro?></button>
					</div>
				</form>
			</div>
		</div>
		<div class='col-md-6'>
			<div class='box box-success'>
				<div class='box-header'>
					<h3 class='box-title'>Form Sub-Kategori Barang</h3>
				</div>
				<form role='form' action='proses/pro_kat_barang.php' method='POST'>
					<div class='box-body'>
						<input type='hidden' name='kode_sat_ba' value='<?php echo (isset($subbar->kode_satuan_barang)? $subbar->kode_satuan_barang:"");?>' />
						<div class='form-group'>
							<label>Kategory</label>
							<select class='form-control' name='cate' id='cate'>
								<?php
									$subk="select kode_kelompok_barang, nama_kelompok_barang from tb_kelompok_barang";
									$tam=$db->prepare($subk);
									$tam->execute();
									echo"<option value='".(isset($subbar->kode_kelompok_barang)?$subbar->kode_kelompok_barang:"")."'>".(isset($subbar->nama_kelompok_barang)?$subbar->nama_kelompok_barang:"Pilih Kategori Barang")."</option>";
									while($sub=$tam->fetch(PDO::FETCH_OBJ)){
										echo"<option value='".$sub->kode_kelompok_barang."'>".$sub->nama_kelompok_barang."</option>";
									}
								?>
							</select>
						</div>
						<div class='form-group'>
							<label>Nama Sub-Kategori</label>
							<input type='text' name='sub-cat' id='sub-cat' class='form-control' placeholder='Enter Name Sub Category' required value='<?php echo (isset($subbar->nama_satuan_barang) ? $subbar->nama_satuan_barang:"");?>'/>
						</div>
					</div>
					<div class='box-footer'>
						<button class='btn btn-primary' type='submit' name='proses' value='<?=$prosubkat?>' <?php echo $dis2;?> ><?=$pro2?></button>
					</div>
				</form>
			</div>
		</div>
		<div style='clear:both;'></div>
		<div class='col-xs-12'>
			<div class='box box-warning'>
				<div class='box-header'>
					<h3 class='box-title'>Tabel Data Kategori dan Sub-Kategori</h3>
				</div>
				<div class='box-body table-responsive'>
					<table class='table table-bordered table-striped'>
						<thead>
							<tr>
								<th width='5%' align='center'>#</th>
								<th colspan='2'>Kategori/Sub-Kategori</th>
								<th width='15%'>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$kaka=array();
								$tb="select kode_kelompok_barang,nama_kelompok_barang from tb_kelompok_barang";
								$katb=$db->prepare($tb);
								$katb->execute();
								while($da=$katb->fetch(PDO::FETCH_OBJ)){
									$kaka[$da->kode_kelompok_barang]=$da->nama_kelompok_barang;
								}
								$i=1;
								foreach($kaka as $kdb=>$namb){
									trku($kdb,$i,'rowspan='.(hitj($kdb)+1));
									$i++;
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
