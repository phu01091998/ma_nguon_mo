<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>
<?php include_once("model/phone.php") ?>
<?php
$lsType = Type::getListType();
$lsPhone = Phone::getListPhone();
// list phone by search
if (isset($_REQUEST["phoneSearch"])) {
    $s = $_REQUEST["phoneSearch"];
    $lsPhone = Phone::searchPhone($s);
}
// list phone by type
if (isset($_REQUEST["typeid"])) {
    $t = $_REQUEST["typeid"];
    $lsPhone = Phone::getListPhoneByType($t);
}



?>
<br><br><br>

<div class="container-fluid">
    <div class="row">
        <!-- loại sản phẩm -->
        <div class=" col-12 col-md-2 py-3">
            <div class="w-100 text-center py-2 bg-warning" data-toggle="collapse" data-target="#loaiCollapse">
                <h6 class="m-0">Thương hiệu</h6>
            </div>
            <ul class="w-100 p-0 pt-4 collapse bg-light show" id="loaiCollapse" style="margin-top: 0px;">
                <?php foreach ($lsType as $key => $value) { ?>
                    <li class="loai rounded w-100 py-2 m-0 font-weight-bold" style="font-size: 13px; text-transform: uppercase;"><a href="?typeid=<?php echo $value->typeid; ?>" class="pl-4 aaa" style="display: block;"><?php echo $value->typename; ?> </a></li>
                <?php } ?>
            </ul>
            <div class="w-100 bg-light text-center pt-5 qc" style="height: 543px;"><h6 class="qcshow text-info" style="display: none;">quảng cáo nè</h6></div>
        </div>
        <div class="col-12 col-md-10 pt-3 pb-0 pl-md-0">
            <div class="w-100 row mb-4 " style="margin-top: 0px;">
            <div class="col-6 col-md-3 pl-5 py-1 title-group"><h6 class="d-inline-block ml-2">Danh mục sản phẩm</h6></div>
                <div class="col-6 col-md-9 search-group">
                    <form action="" class="">
                        <div class="input-group w-100"><input class="w-100 rounded   pl-3" type="text" name="phoneSearch" placeholder="Tìm kiếm"><button type="submit" class="btn btn-default " style="margin-left: -43px;z-index: 98;"><i class="fas fa-search"></i></button></div>
                    </form>
                </div>

            </div>
            <!-- loop -->
            <div class="row px-2 py-0">
                <!-- -- -->
                <?php foreach ($lsPhone as $key => $value) { ?>
                    <!-- product -->
                    <div class=" col-6 col-md-4 col-lg-3  mx-0 px-2 mt-4 mb-4">
                        <div class="w-100 d-inline-block bg-white px-3 py-2 m-0 text-center" style="height:120px;"><img src="imgs/<?php echo $value->image; ?>" alt="asdsa" class="w-auto h-100"></div>
                        <div class="row product-name d-block text-center  px-3 py-2 m-0" style="height: 30px;">
                            <h6 style="font-size:14px;"><?php echo $value->phonename; ?></h6>
                        </div>
                        <div class="row product-price d-block text-center px-3 py-2 m-0" style="height: 25px; overflow: hidden;">
                            <h6 class="text-danger"><span class="text-body">Giá: </span><?php echo $value->price; ?> đ</h6>
                        </div>
                        <div class="row product-action   px-3 py-2 m-0" style="height: 40px;">
                            <div class="w-50 " style="padding-right: 13px;"><a href="detail.php?phoneid=<?php echo $value->phoneid; ?>" class="float-right rounded-pill btn btn-outline-secondary px-2 py-1" style="font-size: 12px;">Chi tiết</a></div>
                            <div class="w-50 " style="padding-left: 13px;"><a href="cartView.php?addFromProduct=&phoneid=<?php echo $value->phoneid; ?>&numQuantity=1" class=" float-left rounded-pill  btn-secondary   btn  px-3 py-1" style="font-size: 12px;">Mua</a></div>
                        </div>
                    </div>
                    <!-- -- -->
                <?php } ?>


            </div>
            <!-- end loop -->
        </div>
    </div>
</div>















































<?php include_once("footer.php") ?>