<?php
	class Awal{
		private $db;
		private $username;
		private $password;
		
		function __construct($user=null,$pass=null){
			$this->username=$user;
			$this->password=md5($pass);
			$this->db = new database();
		}
		
		function login(){
			$this->db->query("select kode_pengguna, nama_pengguna from tb_pengguna where username='".$this->username."' and password='".$this->password."'");
			$jml=$this->db->getJumlah();
			if($jml>0){
				$data=$this->db->view();
				$_SESSION['id']=$data->kode_pengguna;
				$_SESSION['nama']=$data->nama_pengguna;
				$_SESSION['login']=true;
				$this->alertOrJump(true,true,'Selamat Datang '.$_SESSION['nama'],'beranda.php');
			}else{
				$this->logOut();
			}
		}
		
		function is_login(){
			if(!empty($_SESSION['nama']) and $_SESSION['login']){
				return true;
			}else{
				return false;
			}
		}
		
		function alertOrJump($Alrt=true, $jmp=true, $sam,$almt){
			print"<script>";
				if($Alrt){
					print "alert('".$sam."');";
				}
				if($jmp){
					print "location.href='".$almt."';";
				}
			print"</script>";
		}
		
		function logOut(){
			session_destroy();
			$this->alertOrJump(false, true, '', 'index.php');
		}
	}
