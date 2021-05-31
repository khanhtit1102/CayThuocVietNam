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

    $sql = "SELECT * FROM binhluan, users WHERE binhluan.id_user = users.id ORDER BY id_binhluan DESC";
    $comments = $db->fetchsql($sql);
 ?>

<?php  require_once __DIR__. "/../../layouts/header.php";?>

                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Danh Sách     Bình luận
                                <!-- <a href="add.php" class="btn btn-success">Thêm mới</a> -->
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin">Bảng Điều Khiển</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Bình luận
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
                                        <th>Tên người bình luận</th>
                                        <th>Nội dung</th>
                                        <th>Ảnh</th>
                                        <th>Bài viết</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 1; foreach ($comments as $comment) :?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $comment['name'] ?></td>
                                        <td><?php echo $comment['noidung'] ?></td>
                                        <td>
                                            <?php if($comment['anh']!='NULL'): ?>
                                                <img src="<?php echo base_url().'/public/uploads/comments/'.$comment['anh']; ?>" width="80px" height="80px">
                                            <?php else: echo "(Không có ảnh)"; endif; ?>
                                        </td>
                                        <td><a href=""></a>
                                            <?php if($comment['maCayThuoc']): echo '<a target="_blank" href="'.base_url().'chi-tiet-cay-thuoc.php?id='.$comment['maCayThuoc'].'">Bài viết</a>'; endif; ?>
                                            <?php if($comment['maBaiThuoc']): echo '<a target="_blank" href="'.base_url().'chi-tiet-bai-thuoc.php?id='.$comment['maBaiThuoc'].'">Bài viết</a>'; endif; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-danger" href="delete.php?id_binhluan=<?php echo $comment['id_binhluan'] ?>"><i class="fa fa-times"></i>Xóa</a>
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