<?php 
	$open = "baithuoc";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id_binhluan = intval(getInput('id_binhluan'));

    $Deletebinhluan = $db->fetchID("binhluan",$id_binhluan,"id_binhluan");
    if (empty($Deletebinhluan)) {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("binhluan");
        
    }

    $num = $db->delete("binhluan",$id_binhluan,"id_binhluan");
    if($num >0)
    {
    	$_SESSION['success'] = "Xóa thành công";
        redirectAdmin("binhluan");
    }
    else
    {
    	$_SESSION['error'] = "Xóa thất bại";
        redirectAdmin("binhluan");
    }
 ?>