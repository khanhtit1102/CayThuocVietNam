<?php 
    $open = "caythuoc";
    require_once __DIR__. "/../../autoload/autoload.php";

    /** lay ra danh muc sp*/
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
            "mota" => postInput("mota"),

          
        ];

        $error =[];
        // neu de trong thi thong bao
        if(postInput('tenCayThuoc')=='')
        {
            $error['tenCayThuoc'] = "Mời bạn nhập đầy đủ danh mục";
        }
        if(postInput('id')=='')
        {
            $error['id'] = "Mời bạn chọn tên cây thuốc";
        }

        if(! isset($_FILES['anh']))
        {
            $error['anh'] = "Mời bạn chọn hình ảnh";
        }

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

            $id_insert = $db->insert("caythuoc",$data);
            if($id_insert)
            {   
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success'] = "Thêm cây thuốc mới thành công";
                 redirectAdmin("caythuoc");
            }
            else
            {
                $_SESSION['error'] = "Thêm cây thuốc mới không thành công";
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
                                    <label for="exampleInputEmail1">Tên Cây Thuốc</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên cây thuốc" name="tenCayThuoc">
                                    <?php if(isset($error['tenCayThuoc'])): ?>
                                        <p class="text-danger"><?php echo $error['tenCayThuoc'] ?></p>       
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giới</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Giới" name="gioi">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bộ</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bộ" name="bo">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ" name="ho">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tông</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tông" name="tong">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chi</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Chi" name="chi">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Loài</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Loài" name="loai">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="anh">
                                     <?php if(isset($error['anh'])): ?>
                                        <p class="text-danger"><?php echo $error['anh'] ?></p>       
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung</label>
                                    <textarea class="form-control" name="mota" cols="30" rows="10"></textarea>
                                </div>
                                

                                <button type="submit" class="btn btn-success">Lưu</button>
                            </form>
                        </div>
                    </div>
<?php  require_once __DIR__. "/../../layouts/footer.php";?>