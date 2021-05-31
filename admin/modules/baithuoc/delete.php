<?php 
	$open = "baithuoc";
    require_once __DIR__. "/../../autoload/autoload.php";

    $maBaiThuoc = intval(getInput('maBaiThuoc'));

    $Deletebaithuoc = $db->fetchID("baithuoc",$maBaiThuoc,"maBaiThuoc");
    if (empty($Deletebaithuoc)) {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("baithuoc");
        
    }

    $num = $db->delete("baithuoc",$maBaiThuoc,"maBaiThuoc");
    if($num >0)
    {
    	$_SESSION['success'] = "Xóa thành công";
        redirectAdmin("baithuoc");
    }
    else
    {
    	$_SESSION['error'] = "Xóa thất bại";
        redirectAdmin("baithuoc");
    }
 ?>