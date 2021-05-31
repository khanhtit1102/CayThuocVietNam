<?php 
	$open = "caythuoc";
    require_once __DIR__. "/../../autoload/autoload.php";

    $maCayThuoc = intval(getInput('maCayThuoc'));

    $Deletecaythuoc = $db->fetchID("caythuoc",$maCayThuoc,"maCayThuoc");
    if (empty($Deletecaythuoc)) {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("caythuoc");
        
    }

    $num = $db->delete("caythuoc",$maCayThuoc,"maCayThuoc");
    if($num >0)
    {
    	$_SESSION['success'] = "Xóa thành công";
        redirectAdmin("caythuoc");
    }
    else
    {
    	$_SESSION['error'] = "Xóa thất bại";
        redirectAdmin("caythuoc");
    }
 ?>