<?php  
	require_once __DIR__. "/autoload/autoload.php";
    $table = 'caythuoc';
    if (isset($_POST['maCayThuoc'])) {
        $id_user  = $_SESSION['name_id'];
        $maCayThuoc = $_POST['maCayThuoc'];
        $noidung = $_POST['content'];
        $filename = "NULL";
        $message = "Bình luận thành công.";
        // Check image file and upload to server
        if($_FILES['image']["name"] != null){
            
            $target_dir = "public/uploads/comments/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $filename = $_FILES['image']["name"];
                } else {
                    $message = "Bình luận không thành công.";
                }
            }
        }
        // Save to database
        $data = 
        [
           "id_user" => $id_user,
           "maCayThuoc" => $maCayThuoc,
           "noidung" => $noidung,
           "anh" => $filename,
           "comment_at" => date("Y-m-d H:i:s")
        ];
        $db->insert('binhluan', $data);
        echo 
        '
        <div class="alert alert-success alert-dismissible fade in" role="alert"> 
        <strong>Thông báo!</strong> '.$message.'
        </div>
        ';
    }
	$maCayThuoc = intval(getInput('id'));
	// chi tiet sp

	$caythuoc = $db->fetchID($table,$maCayThuoc,"maCayThuoc");
    $sql_Comments = 'SELECT * FROM binhluan, users WHERE maCayThuoc = '.$maCayThuoc.' AND binhluan.id_user = users.id';
    $getComments = $db->fetchsql($sql_Comments);
 ?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>    
        <div class="col-md-9 bor">
           <section class="box-main1" >
                <div class="col-md-6 text-center">
                                <img src="<?php echo uploads() ?>product/<?php echo $caythuoc['anh'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
                </div>
                <div class="col-md-6 bor" style="margin-top: 30px;padding: 30px;">
                   <ul id="right">
                        <li><h3> <?php echo $caythuoc['tenCayThuoc'] ?> </h3></li>
                        <li><h4> Giới:<?php echo $caythuoc['gioi'] ?></h4></li>
                        <li><h4>Bộ:<?php echo $caythuoc['bo'] ?></h4></li>
                        <li><h4>Chi:<?php echo $caythuoc['chi'] ?></h4></li>
                   </ul>
                </div>
            </section>
            <div class="col-md-12 clearfix" id="tabdetail">
                <div class="row">                                    
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
                        <li><a data-toggle="tab" href="#comment">Bình luận </a></li>
                       
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <h3>Nội dung</h3>
                            <p><?php echo $caythuoc['mota'] ?></p>
                        </div>   
                        <div id="comment" class="tab-pane fade in">

                            <?php if($getComments): ?>
                                <?php foreach ($getComments as $comment): ?>
                                    <div class="timeline">
                                        <div>
                                            <i class="fa fa-comments bg-purple"></i>
                                            <div class="timeline-item">
                                                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $comment['comment_at'] ?></span>
                                                <h3 class="timeline-header"><a href="#"><?php echo $comment['name']; ?></a></h3>
                                                <div class="timeline-body">
                                                    <span class="text">
                                                        <?php echo $comment['noidung']; ?>
                                                    </span>
                                                    <br>
                                                    <?php if($comment['anh'] != 'NULL'): ?>
                                                        <img src="<?php echo base_url().'/public/uploads/comments/'.$comment['anh']; ?>" alt="...">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: echo "<h3>Chưa có bình luận nào!</h3></br>"; endif; ?>
                            <?php if(isset($_SESSION['name_id'])): ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="maCayThuoc" value="<?php echo $maCayThuoc ?>">
                                    <div class="form-group">
                                        <label for="writeComment">Viết bình luận</label>
                                        <textarea class="form-control" id="writeComment" required="" name="content"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" accept="image/*" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Gửi bình luận</button>
                                </form>
                            <?php else: echo 'Vui lòng <a href="'.base_url().'dang-nhap.php">đăng nhập</a> để bình luận!'; endif; ?>
                        </div>               
                    </div>
                </div>
            </div>
        </div>
    <?php require_once __DIR__. "/layouts/footer.php"; ?>

    