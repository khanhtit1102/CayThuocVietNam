<?php  

    require_once __DIR__. "/autoload/autoload.php"; 

?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section id="slide" class="text-center" >
                <img src="<?php echo base_url() ?>public/frontend/images/Thuoc_1.png" class="img-thumbnail">
            </section>
            <section class="box-main1">
                <?php require_once __DIR__. "/indexCayThuoc.php"; ?>
                
                <br/>

                <?php require_once __DIR__. "/indexBaiThuoc.php"; ?>
            </section>
        </div>
    <?php require_once __DIR__. "/layouts/footer.php"; ?>
    