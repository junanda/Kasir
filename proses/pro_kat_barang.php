<?php
	require_once'../koneksi.inc.php';
	
	$p=$_POST['proses'];
	
	switch($p){
		case"inputkategori":
			$kat="insert into tb_kelompok_barang (nama_kelompok_barang) values (?)";
			$has=$db->prepare($kat);
			$has->bindParam(1,$_POST['cat']);
			$result=$has->execute();
			if($result){
				echo"<script>
					location.href='../beranda.php?p=kategori';
				</script>";
			}else{
				echo"<script>
					alert('error');
					location.href='../beranda.php?p=kategori';
				</script>";
			}
		break;
		case"inputsubkategori":
			$skl="insert into tb_satuan_barang (kode_kelompok_barang,nama_satuan_barang) values (?,?)";
			$ins=$db->prepare($skl);
			$ins->bindParam(1,$_POST['cate']);
			$ins->bindParam(2,$_POST['sub-cat']);
			$hasil=$ins->execute();
			if($hasil){
				echo"<script>
					location.href='../beranda.php?p=kategori';
				</script>";
			}else{
				echo"<script>
					alert('error');
					location.href='../beranda.php?p=kategori';
				</script>";
			}
		break;
		default:
			echo"tidak ada";
		break;
	}
