<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
	session_start();
	require_once __DIR__. "/../libraries/Database.php";
	require_once __DIR__. "/../libraries/Function.php";
    $db= new Database ;

    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/CayThuocVietNam/public/uploads/");



    $category = $db->fetchAll("category");
    /** 
		lay danh sach sp moi
    */

	$sqlCayThuoc = "SELECT * FROM caythuoc WHERE 1 ORDER BY ID DESC LIMIT 3";
	$sqlBaiThuoc = "SELECT * FROM baithuoc WHERE 1 ORDER BY ID DESC LIMIT 3";

	$cayThuoc = $db->fetchsql($sqlCayThuoc);

	$baiThuoc = $db->fetchsql($sqlBaiThuoc);
 ?>