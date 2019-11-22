<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>
<?php include_once("model/phone.php") ?>
<?php
$lsType = Type::getListType();
$lsPhone = Phone::getListPhone();
// list phone by search
if(isset($_REQUEST["phoneSearch"])){
    $s= $_REQUEST["phoneSearch"];
    $lsPhone= Phone::searchPhone($s);
}
// list phone by type
if(isset($_REQUEST["typeid"])){
    $t= $_REQUEST["typeid"];
    $lsPhone= Phone::getListPhoneByType($t);
}



?>
<br><br><br>

<div class="container-fluid">
    <div class="row">
        <!-- loại sản phẩm -->
        <div class=" col-12 col-md-2 py-3">
            <h3 class="">Thương hiệu</h3>
            <ul class="w-100 p-0 " style="margin-top: 40px;">
                <?php foreach ($lsType as $key => $value) { ?>
                    <li class="loai rounded w-100 py-2 m-0 font-weight-bold" style="font-size: 17px;"><a href="?typeid=<?php echo $value->typeid; ?>" class="pl-3 aaa" style="display: block;"><?php echo $value->typename; ?> </a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-12 col-md-10  py-3 pl-md-0">
            <h3>Danh mục sản phẩm</h3>
            <div class="w-100 mb-5 " style="margin-top: 40px;">
                <form action="" class="">
                    <div class="input-group w-100"><input class="w-100 rounded  py-2 pl-3" type="text" name="phoneSearch" placeholder="Tìm kiếm"><button type="submit" class="btn btn-default " style="margin-left: -43px;z-index: 98;"><i class="fas fa-search"></i></button></div>
                </form>
            </div>
            <!-- loop -->
            <div class="row px-2 py-3">
                <!-- -- -->
                <?php foreach ($lsPhone as $key => $value) { ?>
                    <!-- product -->
                    <div class=" col-6 col-md-4 col-lg-3  mx-0 px-2 mt-4 mb-5">
                        <div class="w-100 d-inline-block bg-white px-3 py-2 m-0 text-center" style="height:220px;"><img src="imgs/<?php echo $value->image; ?>" alt="asdsa" class="w-auto h-100"></div>
                        <div class="row product-name d-block text-center  px-3 py-3 m-0" style="height: 50px;">
                            <h6><?php echo $value->phonename; ?></h6>
                        </div>
                        <div class="row product-price d-block text-center px-3 py-2 m-0" style="height: 50px; overflow: hidden;">
                            <h5>Giá: <?php echo $value->price; ?> đ</h5>
                        </div>
                        <div class="row product-action   px-3 py-2 m-0" style="height: 50px;">
                            <div class="w-50 text-center pl-4"><a href="detail.php?phoneid=<?php echo $value->phoneid;?>" class="rounded-pill btn btn-outline-secondary px-3" style="font-size: 15px;">Chi tiết</a></div>
                            <div class="w-50 text-center pr-4"><a href="cartView.php?addFromProduct=&phoneid=<?php echo $value->phoneid;?>&numQuantity=1" class="rounded-pill  btn-secondary   btn  px-4" style="font-size: 15px;">Mua</a></div>
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