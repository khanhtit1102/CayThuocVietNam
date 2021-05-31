<?php  

    require_once __DIR__. "/autoload/autoload.php"; 
   // unset($_SESSION['cart']);

     if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p =1;
    }

    $sql = "SELECT baithuoc.* FROM baithuoc ORDER BY maBaiThuoc DESC";
    $databaithuoc = $db->fetchJone('baithuoc',$sql,$p,4,true);

    if(isset($databaithuoc['page']))
    {
        $sotrang = $databaithuoc['page'];
        unset($databaithuoc['page']);
    }
?>
<h3 class="title-main"><a href="">Bài Thuốc</a> </h3>
                <div class="showitem clearfix" style="margin-top: 10px; margin-bottom: 10px;">
                    <?php foreach ($databaithuoc as $item) :?>
                        <div class="col-md-3 item-product bor">
                            <a href="chi-tiet-bai-thuoc.php?id=<?php echo $item['maBaiThuoc'] ?>">
                                <img src="<?php echo uploads() ?>product/<?php echo $item['anh'] ?>" class="" width="100%" height="180">
                            </a>
                            <div class="info-item">
                                <a href="chi-tiet-cay-thuoc.php?id=<?php echo $item['maBaiThuoc'] ?>"><?php echo $item['tenBaiThuoc'] ?>        
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?> 
                </div>    
                <div class="pull-right">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                    <?php for($i=1; $i<=$sotrang;$i++): ?>
                                        <?php 
                                            if(isset($_GET['page']))
                                            {
                                                $p=$_GET['page'];
                                            }
                                            else
                                            {
                                                $p=1;
                                            }
                                         ?>
                                         <li class="<?php echo($i==$p) ?'active' :'' ?>">
                                               <a href="?page=<?php echo $i ; ?>"><?php echo $i; ?></a>
                                         </li>
                                    <?php endfor; ?>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                            </ul>
                        </nav>
                    </div>