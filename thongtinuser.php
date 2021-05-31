<?php  

	require_once __DIR__. "/autoload/autoload.php";
	$id = intval(getInput('id'));
	// chi tiet sp

	$user = $db->fetchID("users",$id,"id");
 ?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
           <section class="box-main1" >
                <div class="col-md-6 text-center">
                                <img src="<?php echo base_url() ?>public/frontend/images/user.png" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
                </div>
                <div class="col-md-6 bor" style="margin-top: 30px;padding: 30px;">
                   <ul id="right">
                        <li><h3> Họ tên:<?php echo $user['name'] ?> </h3></li>
                        <li><p> Email:<?php echo $user['email'] ?></p></li>
                        <li><p> Địa Chỉ:<?php echo $user['address'] ?></p></li>
                        <li><p> Số Điện Thoại:<?php echo $user['phone'] ?></p></li>
                   </ul>
                </div>
            </section>
        </div>
    <?php require_once __DIR__. "/layouts/footer.php"; ?>
    