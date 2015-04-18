<?php
class Database{
	public $koneksi;
	public $selectDB;
	public $query;
	public $result;
	public $row;
	public $jumlah;
	public $asoc;
	
	function database(){
		$namaSer='localhost';
		$username='root';
		$password='triadpass';
		$dbName='kasir';
		
		$this->koneksi=mysql_connect($namaSer,$username,$password)or die('Pesan Error '.mysql_error());
		
		$this->selectDB=mysql_select_db($dbName,$this->koneksi);
		if(!$this->selectDB){
			echo"Gagal";
		}
	}
	
	function query($query){
		$this->result=mysql_query($query)or die("ada kesalahan :".mysql_error());
	}
	
	function tampil(){
		$this->row=mysql_fetch_array($this->result);
		return $this->row;
	}
	
	function view(){
		$this->row=mysql_fetch_object($this->result);
		return $this->row;
	}
	function assoc(){
		$this->asoc=mysql_fetch_assoc($this->result);
		return $this->asoc;
	}
	function getJumlah(){
		$this->jumlah=mysql_num_rows($this->result);
		return $this->jumlah;
	}
	function get($table){
		$this->result=mysql_query("SELECT * FROM ".$table);
	}
	
	function getJumlahFromTable($table){
		$this->get($table);
		return $this->getJumlah();
	}
	
	function insert($database,$data){
		$row=array();
		$nilai=array();
		foreach($data as $kolom=>$value){
			$row[]=$kolom;
			$nilai[]="'".$value."'";
		}
		
		$this->result=$this->query("INSERT INTO ".$database."(".implode(',' ,$row) .") VALUES (".implode(',' , $nilai) .")"); 
	}
	
	function update($table,$data,$where){
		foreach($data as $kolom=>$row){
			$set[]=$kolom."='".$row."'";
		}
		$set=implode(',' ,$set);
		$query="UPDATE ".$table." SET ".$set." WHERE ".$where;
		$this->query($query);
	}
	
	function hapus($table,$where){
		$this->query("DELETE FROM ".$table." WHERE ".$where);	
	}
}
