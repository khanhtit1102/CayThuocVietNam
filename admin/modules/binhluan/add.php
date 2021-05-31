<?php 
    $open = "baithuoc";
    require_once __DIR__. "/../../autoload/autoload.php";

    /** lay ra danh muc sp*/
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

        //neu error rỗng = không có lỗi thì ...
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

            $id_insert = $db->insert("baithuoc",$data);
            if($id_insert)
            {   
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success'] = "Thêm bài thuốc mới thành công";
                 redirectAdmin("baithuoc");
            }
            else
            {
                $_SESSION['error'] = "Thêm bài thuốc mới không thành công";
            }
        }
    }
 ?>

<?php  require_once __DIR__. "/../../layouts/header.php";?>

                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Thêm Mới Bài Thuốc
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                                <li>
                                    <i></i>  <a href="">Bài Thuốc</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Thêm Mới
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                            <!--Thong bao loi -->
                            <?php  require_once __DIR__. "/../../../parials/notification.php";?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="" method="POST" enctype="multipart/form-data"s>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục</label>
                                    <select class="form-control" name="id">
                                        <option value=""> - Mời bạn chọn danh mục- </option>
                                        <?php foreach($category as $item): ?>
                                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if(isset($error['id'])): ?>
                                        <p class="text-danger"><?php echo $error['id'] ?></p>       
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Bài Thuốc</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên bài thuốc" name="tenBaiThuoc">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Bệnh</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên Bệnh" name="tenBenh">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cách Dùng</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cách Dùng" name="cachdung">
                                  
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tác Dụng</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tác Dụng" name="tacdung">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kiêng Kỵ</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tông" name="tong">
                                
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="anh">
                                     <?php if(isset($error['anh'])): ?>
                                        <p class="text-danger"><?php echo $error['anh'] ?></p>       
                                    <?php endif ?>
                                </div>
                                <button type="submit" class="btn btn-success">Lưu</button>
                            </form>
                        </div>
                    </div>
<?php  require_once __DIR__. "/../../layouts/footer.php";?>