<!DOCTYPE html>
<html>
    <head>
        <title>Cây Thuốc Việt Nam</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>Cây Thuốc Việt</a><b>Cây Thuốc Của Người Việt </b>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if (isset($_SESSION['name_user'])): ?>
                                            <li>Xin Chào : <?php echo $_SESSION['name_user']; ?></li>
                                            <li>
                                                <a href=""><i class="fa fa-user"></i> Tài Khoản <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href="thongtinuser.php?id=<?php echo $_SESSION['name_id'] ?>">Thông Tin</a></li>
                                                    <li><a href="thoat.php"><i class="fa fa-share-square-o"></i> Thoát</a></li>
                                                </ul>
                                            </li>
                                        <?php else : ?>
                                            <li>
                                                <a href="dang-nhap.php"><i class="fa fa-unlock"></i> Đăng Nhập</a>
                                            </li>
                                            <li>
                                                <a href="dang-ky.php"><i class="fa fa-unlock"></i> Đăng Ký</a>
                                            </li>
                                        <?php endif ?> 
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline" method="GET" action="<?php echo base_url() ?>tim-kiem.php">
                                <div class="form-group">
                                    <label>
                                        <select name="category" class="form-control" required="">
                                            <option value="">  Nhập từ khóa  </option>               
                                            <?php foreach ($category as $item) :?>
                                                    <option value="<?php echo $item['id'] ?>"> 
                                                    <?php echo $item['name'] ?>
                                                    </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                    <input type="text" name="keyword" placeholder=" nhập từ khóa " class="form-control" required="">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="index.php">
                                <img src="<?php echo base_url() ?>public/frontend/images/logo.png" >
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>+84 378448101</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->
            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>
                         <div class="home pull-left">
                            <a href="main.php">Giới Thiệu</a>
                        </div>
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                            <ul>
                                <li>
                                    <a href="danh-muc-san-pham.php?id=1"> Cây Thuốc <span class="badge pull-right"></span></a>
                                    <ul>
                                        <?php foreach ($cayThuoc as $item) :?>
                                        <li>
                                            <a href="chi-tiet-cay-thuoc.php?id=<?php echo $item['maCayThuoc'] ?>">
                                                    <p class="name"><?php echo $item['tenCayThuoc']; ?></p >
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                        <li><a href="danh-muc-san-pham.php?id=1"> Khác</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="danh-muc-bai-thuoc.php?id=2"> Bài Thuốc <span class="badge pull-right"></span></a>
                                     <ul>
                                        <?php foreach ($baiThuoc as $item) :?>
                                        <li>
                                            <a href="chi-tiet-bai-thuoc.php?id=<?php echo $item['maBaiThuoc'] ?>">
                                                    <p class="name"><?php echo $item['tenBaiThuoc']; ?></p >
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                        <li><a href="danh-muc-bai-thuoc.php?id=2"> Khác</a></li>
                                    </ul>
                                </li>
                                </ul>
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Cây Thuốc </h3>
                            <ul>
                                <?php foreach ($cayThuoc as $item) :?>
                                    <li class="clearfix">
                                        <a href="">
                                            <img src="<?php echo uploads()?>product/<?php echo $item['anh'] ?>" class="img-responsive pull-left" width="80" height="80">
                                            <div class="info pull-right">
                                                <p class="name"><?php echo $item['tenCayThuoc']; ?></p >
                                                
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                                
                            </ul>
                            <!-- </marquee> -->
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Bài Thuốc </h3>
                          <ul>
                                <?php foreach ($baiThuoc as $item) :?>
                                    <li class="clearfix">
                                        <a href="">
                                            <img src="<?php echo uploads()?>product/<?php echo $item['anh'] ?>" class="img-responsive pull-left" width="80" height="80">
                                            <div class="info pull-right">
                                                <p class="name"><?php echo $item['tenBaiThuoc']; ?></p >
                                                 
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                                
                            </ul>
                        </div>
                    </div>