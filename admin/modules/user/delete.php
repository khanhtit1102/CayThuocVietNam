<?php 
    $open = "users";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));

    $Deleteusers = $db->fetchID("users",$id,"id");
    if (empty($Deleteusers)) {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectusers("users");
        
    }

    $num = $db->delete("users",$id,"id");
    if($num >0)
    {
        $_SESSION['success'] = "Xóa thành công";
        redirectusers("users");
    }
    else
    {
        $_SESSION['error'] = "Xóa thất bại";
        redirectusers("users");
    }
 ?>