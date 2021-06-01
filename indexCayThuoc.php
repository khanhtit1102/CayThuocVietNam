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

    $sql = "SELECT caythuoc.* FROM caythuoc ORDER BY maCayThuoc DESC";
    $dataCayThuoc = $db->fetchJone('caythuoc',$sql,$p,4,true);

    if(isset($dataCayThuoc['page']))
    {
        $sotrang = $dataCayThuoc['page'];
        unset($dataCayThuoc['page']);
    }
?>
<h3 class="title-main"><a href="">Cây Thuốc</a> </h3>
                <div class="showitem clearfix" style="margin-top: 10px; margin-bottom: 10px;">
                    <?php foreach ($dataCayThuoc as $item) :?>
                        <div class="col-md-3 item-product bor">
                            <a href="chi-tiet-cay-thuoc.php?id=<?php echo $item['maCayThuoc'] ?>">
                                <?php $anh = explode('|',$item['anh']); ?>
                                <img src="<?php echo uploads() ?>product/<?php echo $anh[0] ?>" class="" width="100%" height="180">
                            </a>
                            <div class="info-item">
                                <a href="chi-tiet-cay-thuoc.php?id=<?php echo $item['maCayThuoc'] ?>"><?php echo $item['tenCayThuoc'] ?>        
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