<?php
	class Admin{
		private $nama;
		
		function __construct(){
			$this->db=new database();
			$this->status=new awal();
			//if($this->status->is_login()==false){
			//	echo"<script>
			//		alert('Ma'af Anda tidak memiliki akses Untuk melakukan proses ini');
			//		location.href='index.php';
			//	</script>";
			//}
		}
		
		function getNama(){
			return $this->nama;
		}
		
		function content($isi){
			switch($isi){
				case 'dashboard':
					require_once "content/dashboard.php";
				break;
				case'barang':
					require_once"content/barang.php";
				break;
				case'kategori':
					require_once"content/kategori.php";
				break;
				case'keluar':
					$this->status->logOut();
				break;
				case'supplier':
					require_once"content/supplier.php";
				break;
				default:
					echo"<script>
						alert('ma\'af Halaman yang anda tuju tidak ada');
					</script>";
				break;
			}
		}
	}
