<?php 
    $open = "caythuoc";
    require_once __DIR__. "/../../autoload/autoload.php";

    $maCayThuoc = intval(getInput('maCayThuoc'));

    $EditProduct = $db->fetchID("caythuoc",$maCayThuoc,"maCayThuoc");
    if (empty($EditProduct)) {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("caythuoc");
        
    }
    $category = $db->fetchAll("category");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        $data = 
        [
            "tenCayThuoc" => postInput('tenCayThuoc'),
            "slug" => to_slug(postInput("tenCayThuoc")),
            "id" =>  postInput("id"),
            "gioi" => postInput("gioi"),
            "bo" => postInput("bo"),
            "ho" => postInput("ho"),
            "tong" => postInput("tong"),
            "chi" => postInput("chi"),
            "loai" => postInput("loai"),
            "mota" => postInput("mota")
        ];

        $error =[];
        // neu de trong thi thong bao
       
           
        if(empty($error))
        {
            $data['anh'] = implode("|",$_POST['anh_cu']).'|';
            for ($i=0; $i < count($_FILES['anh']["name"]); $i++) { 
                echo $_FILES['anh']["name"][$i];
                if(isset($_FILES['anh']["name"][$i]))
                {
                    $file_name = $_FILES['anh']["name"][$i];
                    $file_tmp = $_FILES['anh']["tmp_name"][$i];
                    $file_type = $_FILES['anh']["type"][$i];
                    $file_erro = $_FILES['anh']["error"][$i];
                    if($file_erro == 0)
                    {
                        $part= ROOT ."product/";
                        $data['anh'] = $data['anh'].$file_name.'|';
                        move_uploaded_file($file_tmp,$part.$file_name);
                    }
                }
            }
            
            $update = $db->update("caythuoc",$data,array("maCayThuoc"=>$maCayThuoc));
            if($update > 0 )
            {
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success'] = "Cập nhật cây thuốc thành công";
                redirectAdmin("caythuoc");
            }
            else
            {
                $_SESSION['error'] = "Cập nhật cây thuốc không thành công";
                redirectAdmin("caythuoc");
            }
        }
    }


 ?>
<?php  require_once __DIR__. "/../../layouts/header.php";?>

                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Thêm Mới Cây Thuốc
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                                <li>
                                    <i></i>  <a href="">Cây Thuốc</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Sửa
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                            <!--Thong bao loi -->
                            <?php  require_once __DIR__. "/../../../parials/notification.php";?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="" method="POST" enctype="multipart/form-data"s>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                                    <select class="form-control" name="id">
                                        <option value=""> - Mời bạn chọn danh mục sản phẩm - </option>
                                        <?php foreach($category as $item): ?>
                                            <option value="<?php echo $item['id'] ?>" <?php echo $EditProduct['id'] == $item['id'] ? "selected = 'selected'": ''  ?>><?php echo $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if(isset($error['id'])): ?>
                                        <p class="text-danger"><?php echo $error['id'] ?></p>       
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên cây thuốc</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên Cây Thuốc" name="tenCayThuoc" value="<?php echo $EditProduct['tenCayThuoc'] ?>">
                                    <?php if(isset($error['tenCayThuoc'])): ?>
                                        <p class="text-danger"><?php echo $error['tenCayThuoc'] ?></p>       
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giới</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Giới" name="gioi" value="<?php echo $EditProduct['gioi'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bộ</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bộ" name="bo" value="<?php echo $EditProduct['bo'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ" name="ho" value="<?php echo $EditProduct['ho'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tông</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tông" name="tong" value="<?php echo $EditProduct['tong'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chi</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Chi" name="chi" value="<?php echo $EditProduct['chi'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Loài</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Loài" name="loai" value="<?php echo $EditProduct['loai'] ?>">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label><br>
                                    <?php 
                                    $anh = explode('|',$EditProduct['anh']);
                                    for ($i=0; $i < count($anh)-1; $i++):
                                    ?>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="anh_cu[]" value="<?php echo $anh[$i] ?>">
                                        <img src="<?php echo uploads() ?>product/<?php echo $anh[$i] ?>" width="100px" height="100px">
                                        <button type="button" class="btn btn-danger removeImage">Xóa ảnh</button>
                                    </div>
                                    <?php endfor; ?>
                                    <hr>
                                    <div class="form-group">
                                        <br>
                                        <button type="button" class="btn btn-warning addMore">Thêm hình ảnh</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung</label>
                                    <textarea class="form-control" name="mota" cols="30" rows="10"><?php 
                                    echo $EditProduct['mota'] ?></textarea>
                                </div>
                                

                                <button type="submit" class="btn btn-success">Lưu</button>
                            </form>
                        </div>
                    </div>
<?php  require_once __DIR__. "/../../layouts/footer.php";?>