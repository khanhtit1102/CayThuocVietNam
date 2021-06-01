<?php 
    $open = "baithuoc";
    require_once __DIR__. "/../../autoload/autoload.php";

    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p =1;
    }

    $sql = "SELECT baithuoc.* , category.name as namecate FROM baithuoc LEFT JOIN category on category.id = baithuoc.id";
    $baithuoc = $db->fetchsql($sql);
    
 ?>

<?php  require_once __DIR__. "/../../layouts/header.php";?>

                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Danh Sách     Bài Thuốc
                                <a href="add.php" class="btn btn-success">Thêm mới</a>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin">Bảng Điều Khiển</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Bài Thuốc
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                            <!--Thong bao loi -->
                            <?php  require_once __DIR__. "/../../../parials/notification.php";?>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12">
                            <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Bài Thuốc</th>
                                        <th>Id Danh Mục</th>
                                        <th>Ảnh</th>
                                        <th>Slug</th>
                                        <th>Nội Dung</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 1; foreach ($baithuoc as $item) :?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $item['tenBaiThuoc'] ?></td>
                                        <td><?php echo $item['id'] ?></td>
                                        <td>
                                            <img src="<?php echo uploads() ?>product/<?php echo $item['anh'] ?>" width="80px" height="80px">
                                        </td>
                                        <td><?php echo $item['slug'] ?></td>
                                        <td>
                                            <ul>
                                                <li>Tên Bệnh: <?php echo $item['tenBenh'] ?></li>
                                                <li>Cách Dùng: <?php echo $item['cachdung'] ?></li>
                                                <li>Tác Dụng: <?php echo $item['tacdung'] ?></li>
                                                <li>Kiêng Kỵ: <?php echo $item['kiengky'] ?></li>
                                            </ul>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-info" href="edit.php?maBaiThuoc=<?php echo $item['maBaiThuoc'] ?>"><i class="fa fa-edit"></i>Sửa</a>
                                            <a class="btn btn-xs btn-danger" href="delete.php?maBaiThuoc=<?php echo $item['maBaiThuoc'] ?>"><i class="fa fa-times"></i>Xóa</a>
                                        </td>
                                    </tr>
                                    <?php $stt++; endforeach ?>
                                </tbody>
                             </table>
                             </div>
                             
                        </div>
                       </div>
                    </div>
                       
<?php  require_once __DIR__. "/../../layouts/footer.php";?>