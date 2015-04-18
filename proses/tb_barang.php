<?php
	require_once"../koneksi.inc.php";
	$q=$_GET['q'];
	
	switch($q){
		case"tampilData":
			$i=1;
			$query="select a.kode_barang, a.nama_barang, b.nama_kelompok_barang, c.nama_satuan_barang, 
								a.unit_barang, a.size_barang, a.harga_jual, a.harga_beli from tb_barang a inner join tb_kelompok_barang b inner join tb_satuan_barang c
								on a.kode_kelompok_barang=b.kode_kelompok_barang and a.kode_satuan_barang=c.kode_satuan_barang";
			$tampil=$db->prepare($query);
			$tampil->execute();
			if($tampil->rowCount() > 0){
				while($data=$tampil->fetch(PDO::FETCH_OBJ)){
					echo"<tr>";
					echo"<td>".$i." <input type='hidden' id='kodebarang' value='".$data->kode_barang."'/></td>";
					echo"<td>".$data->nama_barang."</td>";
					echo"<td>".$data->nama_kelompok_barang."</td>";
					echo"<td>".$data->nama_satuan_barang."</td>";
					echo"<td>".$data->unit_barang."</td>";
					echo"<td>".$data->size_barang."</td>";
					echo"<td>".$data->harga_beli."</td>";
					echo"<td>".$data->harga_jual."</td>";
					//echo"<td><a id='edB' href='?p=barang&q=edit&kdb=".$data->kode_barang."'>Edit</a> - <a id='hapusBarang' href='proses/tb_barang.php?q=hapus&kd=".$data->kode_barang."'>Hapus</a></td>";
					echo"<td><a id='edB' style='cursor:pointer;' data-id='".$data->kode_barang."' onClick=\"showEdit(".$data->kode_barang.")\">Edit</a> - <a id='hapusBarang' style='cursor:pointer;'>Hapus</a></td>";
					//echo"<td><a id='edB' style='cursor:pointer;' data-id='".$data->kode_barang."'>Edit</a> - <a id='hapusBarang' style='cursor:pointer;'>Hapus</a></td>";
					echo"</tr>";
					$i++;
				}
			}else{
				echo"<tr>";
				echo"<td colspan='9' align='center'><b>Data Barang Tidak Ada....</b></td>";
				echo"</tr>";
			}
		break;
		case"detail":
			$iddet=mysql_escape_string($_GET['id']);
			$query="select a.kode_barang, a.nama_barang, b.nama_kelompok_barang, c.nama_satuan_barang, 
								a.unit_barang, a.size_barang, a.harga_jual, a.harga_beli, a.persen, a.min_stock, a.max_stock, a.stock from tb_barang a inner join tb_kelompok_barang b inner join tb_satuan_barang c
								on a.kode_kelompok_barang=b.kode_kelompok_barang and a.kode_satuan_barang=c.kode_satuan_barang where a.kode_barang=?";
			$detstmt=$db->prepare($query);
			$detstmt->bindParam(1,$iddet);
			$hasil=$detstmt->execute();
			if($hasil){
				$dat=$detstmt->fetch(PDO::FETCH_OBJ);
				echo $dat->kode_barang."|".$dat->nama_kelompok_barang."|".$dat->nama_satuan_barang."|".$dat->unit_barang."|".$dat->size_barang."|".
					 $dat->nama_barang."|".$dat->harga_beli."|".$dat->persen."|".$dat->harga_jual."|".$dat->min_stock."|".$dat->max_stock."|".$dat->stock;
			}
		break;
		case"hapus":
			$kd=mysql_escape_string($_GET['kd']);
			$sql1="delete from tb_barang where kode_barang=?";
			$hap=$db->prepare($sql1);
			$hap->bindParam(1,$kd);
			$berhasil=$hap->execute();
			if($berhasil){
				echo"<script>
					location.href='../beranda.php?p=barang';
				</script>";
			}else{
				echo"<script>
					alert('ERROR');
					location.href='../beranda.php?p=barang';
				</script>";
			}
		break;
		case"ambilKategori":
			$kategori="select kode_kelompok_barang, nama_kelompok_barang from tb_kelompok_barang";
			$katstmt=$db->prepare($kategori);
			$katstmt->execute();
			echo"<option>Pilih Kategori</option>";
			while($cat=$katstmt->fetch(PDO::FETCH_OBJ)){
				echo"<option value='".$cat->kode_kelompok_barang."'>".$cat->nama_kelompok_barang."</option>";
			}
		break;
		case"pilihKategori":
			$id=mysql_escape_string($_GET['id']);
			$sql="select kode_satuan_barang, nama_satuan_barang from tb_satuan_barang where kode_kelompok_barang=?";
			$plhkat=$db->prepare($sql);
			$plhkat->bindParam(1,$id);
			$plhkat->execute();
			
			//echo"<option>Pilih Sub Kategory</option>";
			if($plhkat->rowCount() > 0){
				while($dt=$plhkat->fetch(PDO::FETCH_OBJ)){
					echo"<option value='".$dt->kode_satuan_barang."'>".$dt->nama_satuan_barang."</option>";
				}
			}else{
				echo"<option>Tidak ada Sub Kategory</option>";
			}
		break;
	}
