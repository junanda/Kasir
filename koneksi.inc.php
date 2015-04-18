<?php
	try{
		$db=new PDO("mysql:host=localhost;dbname=kasir","root","triadpass");
	}catch(PDOException $e){
		echo"Error : ".$e->getMessage();
	}

	function showPagging($tbname,$limit=3){
		$dd=new PDO("mysql:host=localhost;dbname=kasir","root","triadpass");
		$sql="select count(*) from ".$tbname."";
		$hasil=$dd->query($sql);
		$total=$hasil->fetchColumn();
		$totalPage=ceil($total/$limit);
	}
