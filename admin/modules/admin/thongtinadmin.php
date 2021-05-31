<?php 

    $open = "admin";
    require_once __DIR__. "/../../autoload/autoload.php";
    $id = intval(getInput('id'));
    // chi tiet sp

    $admin = $db->fetchID("admin",$id,"id");
 ?>
<?php  require_once __DIR__. "/../../layouts/header.php";?>

                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Chi Tiết     ADMIN
                            </h1>
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
                                        <th>Họ và Tên</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Địa chỉ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $admin['name'] ?></td>
                                        <td><?php echo $admin['email'] ?></td>
                                        <td><?php echo $admin['phone'] ?></td>
                                         <td><?php echo $admin['address'] ?></td>
                                    </tr>
                                </tbody>
                             </table>
                             
                        </div>
                       </div>
                    </div>
                       
<?php  require_once __DIR__. "/../../layouts/footer.php";?>