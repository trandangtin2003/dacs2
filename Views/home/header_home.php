    <!-- Services Start -->
    <div class="container-fluid bg-light py-6 px-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div class="service-item bg-green d-flex flex-column align-items-center text-center">
                    <!-- Brand -->
                    <div class="col-md-6">
                        <a class="navbar-brand" href="#">
                            <div id="dong_ho">
                                <div id="thoi_gian">
                                    <div>
                                        <span id="gio" name="gio">00</span><span>Giờ</span>
                                    </div>
                                    <div>
                                        <span id="phut">00</span><span>Phút</span>
                                    </div>
                                    <div>
                                        <span id="giay">00</span><span>Giây</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php  if(isset($_SESSION['login'])){ ?>
            <div class="col-lg-4 col-md-6">
                <div class="service-item bg-green rounded d-flex flex-column align-items-center text-center">
                    <ul id="navmenu">
                        <li>
                            <a  href="?php act=home ?>">
                                <button type="button" class="custom-select">
                                    <p><b>ALL</b></p>
                                </button>
                            </a>
                        </li>
                        <li>
                            <a  href="?mod=home&act=list_cn&MaQuyen=1&pick=1">
                                <button type="button" class="custom-select">
                                    <p ><b>sưu tập</b></p>
                                </button>
                            </a>
                        </li>
                        <li>
                            <a  href="?mod=home&act=list_cn&MaQuyen=2&pick=2">
                                <button type="button" class="custom-select">
                                    <p ><b>của tôi</b></p>
                                </button>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <?php } ?>
            <?php  
                if(isset($_SESSION['pick'])){
                    switch ($_SESSION['pick']) {
                        case "1":
                            $pick="1";
                            break;
                        case "2":
                                $pick="2";
                            break;
                    }
                    $act="?mod=home&act=list_cn&MaQuyen=$pick&pick=$pick";
                    $price_min="price_min_cn";
                    $price_max="price_max_cn";
                    $search="search_cn";
                }
                else{
                    $act="?mod=home";
                    $price_min="price_min";
                    $price_max="price_max";
                    $search="search";
                }
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="service-item bg-green rounded d-flex flex-column align-items-center text-center input-group ml-auto  search-box" style="width: 100%; max-width: 300px;">
                   
                    <form action="<?= $act ?>" method="post">
                        <div class="input-group-append">
                            <input type="text" class="form-control" placeholder="Tìm kiếm món ăn..." name="<?= $search ?>"/>                           
                                <button class="input-group-text text-secondary"><i
                                        class="fa fa-search"></i></button>
                                        <div class="result"></div>
                        </div>
                    </form>            
                </div>
            </div>
            
            <div class="container gia">
                <div class="row">
                    <div class="col-sm-12">
                    <div id="slider-range"></div>
                    </div>
                </div>
                <div class="row slider-labels">
                    <form action="<?= $act ?>" method="post">
                        <div class="col-xs-6 caption_gia">
                        <input id="price_min" name="<?= $price_min ?>" type="number" hidden />
                        <strong>Giá :</strong> <span id="slider-range-value1" name="min"></span>,000 VND <strong> đến </strong> 
                        <input id="price_max" name="<?= $price_max ?>" type="number" hidden />
                        <span id="slider-range-value2" name="max"></span>,000 VND
                        <button class="custom-select" type="submit">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->