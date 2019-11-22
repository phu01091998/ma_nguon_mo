<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>
<?php include_once("model/phone.php") ?>
<?php
if (isset($_REQUEST["phoneid"])) {
    $phoneid = $_REQUEST["phoneid"];
    $phone = Phone::searchPhoneByID($phoneid);
}

?>


<br><br><br>
<h1 class="text-info text-center">Chi tiết sản phẩm</h1>
<br>
<div class="container">
    <div class="row m-0 ">
        <div class="col-12 col-lg-5">
            <img src="imgs/<?php echo $phone->image; ?>" alt="" class="img-fluid">
        </div>
        <div class="col-12 col-lg-7 px-3 py-3 bg-light">
            <form action="cartView.php" method="get">
                <div class="w-100 my-2">
                    <h6>tên sản phẩm: <?php echo $phone->phonename; ?></h6>

                </div>
                <div class="w-100 my-2 ">
                    <h6>giá sản phẩm: <?php echo $phone->price; ?> <u>VNĐ</u></h6>

                </div>
                <div class="w-100 my-2 ">
                    <p>mô tả: <?php echo $phone->description; ?></p>

                </div>
                <div class="w-100 my-2 ">
                    Số lượng mua:
                    <input type="number" name="numQuantityDetail" required min="1">
                </div>
                <input type="hidden" name="phoneid" value="<?php echo $phone->phoneid;?>">
                <input type="hidden" name="price" value="<?php echo $phone->price;?>">
                <div class="w-100 ">
                    <button type="submit" class="btn btn-primary" name="addFromDetail">Thêm vào giỏ</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php include_once("footer.php") ?>