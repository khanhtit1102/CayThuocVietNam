<?php  
	require_once __DIR__. "/autoload/autoload.php";
	$search_category = intval(getInput('category'));
    $category_name = $db->fetchID('category', $search_category, 'id');
    $keyword = getInput('keyword');
    $keyword = strip_tags($keyword);
    $keyword = addslashes($keyword);

	$sql_caythuoc = "SELECT * FROM caythuoc WHERE id = $search_category and (tenCayThuoc LIKE '%$keyword%' OR tenKhoaHoc LIKE '%$keyword%')";
    $sql_baithuoc = "SELECT * FROM baithuoc WHERE id = $search_category and (tenBaiThuoc LIKE '%$keyword%' OR tacdung LIKE '%$keyword%')";
    $caythuoc = $db->fetchsql($sql_caythuoc);
    $baithuoc = $db->fetchsql($sql_baithuoc);
    $total = 0;
	$total += count($db->fetchsql($sql_caythuoc));
    $total += count($db->fetchsql($sql_baithuoc));
	// $baithuoc = $db->fetchJones("baithuoc",$sql,$total,$p,8,true);
	// $sotrang = $baithuoc['page'];
	// unset($baithuoc['page']);
	$path = $_SERVER['SCRIPT_NAME'];
 ?>

    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section class="box-main1">
                <h3 class="title-main"><a href="#">Tìm kiếm trong "<?php echo $category_name['name'] ?>"</a> </h3> 
        		    <div class="showitem clearfix">
                        <?php if($total != 0): ?>
            		    	<?php if($caythuoc != null):
                            foreach ($caythuoc as $item) :?>
                            <div class="col-md-3 item-product bor">
                               <a href="chi-tiet-cay-thuoc.php?id=<?php echo $item['maCayThuoc'] ?>">
                                    <img src="<?php echo uploads() ?>product/<?php echo $item['anh'] ?>" class="" width="100%" height="180">
                                </a>
                                <div class="info-item">

                                    <a href="chi-tiet-cay-thuoc.php?id=<?php echo $item['maCayThuoc'] ?>"><?php echo $item['tenCayThuoc'] ?></a>
                                </div>
                            </div>
                            <?php endforeach; endif;?>

                            <?php if($baithuoc != null):
                            foreach ($baithuoc as $item) :?>
                            <div class="col-md-3 item-product bor">
                               <a href="chi-tiet-bai-thuoc.php?id=<?php echo $item['maBaiThuoc'] ?>">
                                    <img src="<?php echo uploads() ?>product/<?php echo $item['anh'] ?>" class="" width="100%" height="180">
                                </a>
                                <div class="info-item">

                                    <a href="chi-tiet-bai-thuoc.php?id=<?php echo $item['maBaiThuoc'] ?>"><?php echo $item['tenBaiThuoc'] ?></a>
                                </div>
                            </div>
                            <?php endforeach; endif;?>
                        <?php else: echo "Rất tiếc, không tìm thấy sản phầm nào!"; endif;?>

                    </div>
                    <!-- <nav class="text-center">
                        	<ul class="pagination">
                        		<?php for ($i=1; $i <= $sotrang ; $i++) :?>

                        			<li class="<?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active' : ''?>"><a href="<?php echo $path ?>?id=<?php echo $id ?>&& p=<?php echo $i ?>"><?php echo $i; ?></a></li>
                                    
                        		<?php endfor ; ?>
							</ul>
                    </nav>     -->                    
            </section>
        </div>
    <?php require_once __DIR__. "/layouts/footer.php"; ?>
    