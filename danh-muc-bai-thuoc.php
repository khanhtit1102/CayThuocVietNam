<?php  

	require_once __DIR__. "/autoload/autoload.php";
	$id = intval(getInput('id'));

	$CategoryName = $db->fetchID("category",$id,"id");

	if(isset($_GET['p']))
	{
		$p = $_GET['p'];
	}
	else
	{
		$p =1 ;
	}

	$sql = "SELECT * FROM baithuoc WHERE id =$id ";
	$total = count($db->fetchsql($sql));

	$baithuoc = $db->fetchJones("baithuoc",$sql,$total,$p,8,true);
	$sotrang = $baithuoc['page'];
	unset($baithuoc['page']);
	$path = $_SERVER['SCRIPT_NAME'];
 ?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section class="box-main1">
                <h3 class="title-main"><a href=""><?php echo $CategoryName['name'] ?></a> </h3> 
        		    <div class="showitem clearfix">
        		    	<?php foreach ($baithuoc as $item) :?>
                        <div class="col-md-3 item-product bor">
                           <a href="chi-tiet-bai-thuoc.php?id=<?php echo $item['maBaiThuoc'] ?>">
                                <img src="<?php echo uploads() ?>product/<?php echo $item['anh'] ?>" class="" width="100%" height="180">
                            </a>
                            <div class="info-item">

                                <a href="chi-tiet-bai-thuoc.php?id=<?php echo $item['maBaiThuoc'] ?>"><?php echo $item['tenBaiThuoc'] ?></a>

                            </div>
                           
                        </div>
                    <?php endforeach ?>
                    </div>
                    <nav class="text-center">
                        	<ul class="pagination">
                        		<?php for ($i=1; $i <= $sotrang ; $i++) :?>

                        			<li class="<?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active' : ''?>"><a href="<?php echo $path ?>?id=<?php echo $id ?>&& p=<?php echo $i ?>"><?php echo $i; ?></a></li>
                                    
                        		<?php endfor ; ?>
							</ul>
                    </nav>                        
            </section>
        </div>
    <?php require_once __DIR__. "/layouts/footer.php"; ?>
    