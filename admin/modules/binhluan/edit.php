<?php 
    $open = "baithuoc";
    require_once __DIR__. "/../../autoload/autoload.php";

    $maBaiThuoc = intval(getInput('maBaiThuoc'));

    $EditProduct = $db->fetchID("baithuoc",$maBaiThuoc,"maBaiThuoc");
    if (empty($EditProduct)) {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("baithuoc");
        
    }
    $category = $db->fetchAll("category");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        $data = 
        [
           "tenBaiThuoc" => postInput('tenBaiThuoc'),
            "slug" => to_slug(postInput("tenBaiThuoc")),
            "id" =>  postInput("id"),
            "tenbenh" => postInput("tenBenh"),
            "cachdung" => postInput("cachdung"),
            "tacdung" => postInput("tacdung"),
            "kiengky" => postInput("kiengky")
          
        ];

        $error =[];
        // neu de trong thi thong bao
       
           
        if(empty($error))
        {
           if(isset($_FILES['anh']))
            {
                $file_name = $_FILES['anh']['name'];
                $file_tmp = $_FILES['anh']['tmp_name'];
                $file_type = $_FILES['anh']['type'];
                $file_erro = $_FILES['anh']['error'];

                if($file_erro == 0)
                {
                    $part= ROOT ."product/";
                    $data['anh'] = $file_name;
                }
            }
            
            $update = $db->update("baithuoc",$data,array("maBaiThuoc"=>$maBaiThuoc));
            if($update > 0 )
            {
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success'] = "Cập nhật cây thuốc thành công";
                redirectAdmin("baithuoc");
            }
            else
            {
                $_SESSION['error'] = "Cập nhật cây thuốc không thành công";
                redirectAdmin("baithuoc");
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
                                    <label for="exampleInputEmail1">Tên bài thuốc</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên Bài Thuốc" name="tenBaiThuoc" value="<?php echo $EditProduct['tenBaiThuoc'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Bệnh</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên bệnh" name="tenBenh" value="<?php echo $EditProduct['tenBenh'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cách Dùng</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cách Dùng" name="cachdung" value="<?php echo $EditProduct['cachdung'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tác Dụng</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tác Dụng" name="tacdung" value="<?php echo $EditProduct['tacdung'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kiêng Kỵ</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kiêng Kỵ" name="kiengky" value="<?php echo $EditProduct['kiengky'] ?>">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="anh">
                                    <img src="<?php echo uploads() ?>product/<?php echo $EditProduct['anh'] ?>" width="100px" height="100px">
                                </div>

                              <!--   <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung</label>
                                    <textarea class="form-control" name="mota" cols="30" rows="10"><?php 
                                    echo $EditProduct['mota'] ?></textarea>
                                </div> -->
                                

                                <button type="submit" class="btn btn-success">Lưu</button>
                            </form>
                        </div>
                    </div>
<?php  require_once __DIR__. "/../../layouts/footer.php";?>