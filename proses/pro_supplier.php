<?php
	require_once'../koneksi.in.php';
	
	$pro=$_REQUEST['proses'];
	if($pro=='inputSup'){
		$supsql="insert into tb_supplier ()";
	}
