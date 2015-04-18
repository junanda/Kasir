<?php
	require_once"../koneksi.inc.php";
	
	$p=$_POST['proses'];
	
	switch($p){
		case "tambahbarang":
			$sql="insert into tb_barang (kode_barang,nama_barang,kode_kelompok_barang,kode_satuan_barang,harga_jual,harga_beli,unit_barang,size_barang,persen,min_stock,max_stock,stock) 
				  values (?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt=$db->prepare($sql);
			$stmt->bindParam(1,$_POST['kode']);
			$stmt->bindParam(2,$_POST['nama_barang']);
			$stmt->bindParam(3,$_POST['kategori']);
			$stmt->bindParam(4,$_POST['subkategori']);
			$stmt->bindParam(5,$_POST['sprice']);
			$stmt->bindParam(6,$_POST['cprice']);
			$stmt->bindParam(7,$_POST['unit']);
			$stmt->bindParam(8,$_POST['size']);
			$stmt->bindParam(9,$_POST['persen']);
			$stmt->bindParam(10,$_POST['minimum']);
			$stmt->bindParam(11,$_POST['maximum']);
			$stmt->bindParam(12,$_POST['stock']);
			
			$result=$stmt->execute();
			if($result){
				echo"sukses";
			}else{
				echo"error";
			}
		break;
		case "updatebarang":
			$upd="update tb_barang set kode_barang=?, nama_barang=?, kode_kelompok_barang=?, kode_satuan_barang=?, harga_jual=?, harga_beli=?, unit_barang=?, size_barang=?, persen=?, min_stock=?, max_stock=?, stock=? where kode_barang=?";
			$stmtupd=$db->prepare($upd);
			$stmtupd->bindParam(1,$_POST['kode']);
			$stmtupd->bindParam(2,$_POST['nama_barang']);
			$stmtupd->bindParam(3,$_POST['kategori']);
			$stmtupd->bindParam(4,$_POST['subkategori']);
			$stmtupd->bindParam(5,$_POST['sprice']);
			$stmtupd->bindParam(6,$_POST['cprice']);
			$stmtupd->bindParam(7,$_POST['unit']);
			$stmtupd->bindParam(8,$_POST['size']);
			$stmtupd->bindParam(9,$_POST['persen']);
			$stmtupd->bindParam(10,$_POST['minimum']);
			$stmtupd->bindParam(11,$_POST['maximum']);
			$stmtupd->bindParam(12,$_POST['stock']);
			$stmtupd->bindParam(13,$_POST['kode']);
			
			$hasil=$stmtupd->execute();
			if($hasil){
				echo"sukses";
			}else{
				echo"error";
			}
		break;
	}
