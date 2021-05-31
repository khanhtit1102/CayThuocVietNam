<?php 
    require_once __DIR__. "/autoload/autoload.php";

    $soCayThuoc     = $db->countNumRows('caythuoc');
    $soBaiThuoc     = $db->countNumRows('baithuoc');
    $soNguoiDung    = $db->countNumRows('users');
    $soBinhLuan     = $db->countNumRows('binhluan');

    require_once __DIR__. "/layouts/header.php";?>

                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Xin chào mừng bạn đến với trang quản trị Admin
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3><?php echo $soCayThuoc ?></h3>

                            <p>Cây thuốc</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cloud"></i>
                        </div>
                        <a href="<?php echo base_url() ?>admin/modules/caythuoc" class="small-box-footer">Quản lý <i class="ion ion-arrow-down-b"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3><?php echo $soBaiThuoc ?></h3>

                        <p>Bài thuốc</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-medkit"></i>
                    </div>
                    <a href="<?php echo base_url() ?>admin/modules/baithuoc" class="small-box-footer">Quản lý <i class="ion ion-arrow-down-b"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?php echo $soNguoiDung ?></h3>

                    <p>Người dùng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url() ?>admin/modules/user" class="small-box-footer">Quản lý <i class="ion ion-arrow-down-b"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $soBinhLuan ?></h3>

                <p>Bình luận</p>
            </div>
            <div class="icon">
                <i class="ion ion-chatbox-working"></i>
            </div>
            <a href="<?php echo base_url() ?>admin/modules/binhluan" class="small-box-footer">Quản lý <i class="ion ion-arrow-down-b"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<?php  require_once __DIR__. "/layouts/footer.php";?>