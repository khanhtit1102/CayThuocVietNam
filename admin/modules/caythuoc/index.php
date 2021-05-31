<?php 
    $open = "caythuoc";
    require_once __DIR__. "/../../autoload/autoload.php";

    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p =1;
    }

    $sql = "SELECT caythuoc.* , category.name as namecate FROM caythuoc LEFT JOIN category on category.id = caythuoc.id";
    $caythuoc = $db->fetchJone('caythuoc',$sql,$p,4,true);

    if(isset($caythuoc['page']))
    {
        $sotrang = $caythuoc['page'];
        unset($caythuoc['page']);
    }
 ?>

<?php  require_once __DIR__. "/../../layouts/header.php";?>

                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Danh Sách     Cây Thuốc
                                <a href="add.php" class="btn btn-success">Thêm mới</a>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin">Bảng Điều Khiển</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Cây Thuốc
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
                                            <th>Tên</th>
                                            <th>Id Danh Mục</th>
                                            <th>Ảnh</th>
                                            <th>Slug</th>
                                            <th>Nội Dung</th>
                                            <th>Action</th>
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                        <?php $stt = 1; foreach ($caythuoc as $item) :?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $item['tenCayThuoc'] ?></td>
                                        <td><?php echo $item['id'] ?></td>
                                        <td>
                                            <img src="<?php echo uploads() ?>product/<?php echo $item['anh'] ?>" width="80px" height="80px">
                                        </td>
                                        <td><?php echo $item['slug'] ?></td>
                                        <td>
                                            <ul>
                                                <li>Giới: <?php echo $item['gioi'] ?></li>
                                                <li>Bộ: <?php echo $item['bo'] ?></li>
                                                <li>Họ: <?php echo $item['ho'] ?></li>
                                                <li>Tông: <?php echo $item['tong'] ?></li>
                                                <li>Chi: <?php echo $item['chi'] ?></li>
                                                <li>Loài: <?php echo $item['loai'] ?></li>
                                            </ul>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-info" href="edit.php?maCayThuoc=<?php echo $item['maCayThuoc'] ?>"><i class="fa fa-edit"></i>Sửa</a>
                                            <a class="btn btn-xs btn-danger" href="delete.php?maCayThuoc=<?php echo $item['maCayThuoc'] ?>"><i class="fa fa-times"></i>Xóa</a>
                                        </td>
                                    </tr>
                                    <?php $stt++; endforeach ?>
                                    </tbody> 
                                </table>
                            </div>
                       </div>
                    </div>
                       
<?php  require_once __DIR__. "/../../layouts/footer.php";?>