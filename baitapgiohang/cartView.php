<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>
<?php include_once("model/phone.php") ?>
<?php include_once("model/cart.php") ?>
<br><br><br>

<?php
//khởi tạo:
if (!isset($_SESSION)) {
    session_start();
}
//unset($_SESSION["cart"]);
//kiểm tra tồn tại cart session
///nếu có-> gán vào $lsCartItem 
///else -> khởi tạo = $lsCartItem
$lsCartItem = array();
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = serialize($lsCartItem);
} else {
    $lsCartItem = unserialize($_SESSION["cart"]);
    if (sizeof($lsCartItem) == 0) {
        header("location:product.php");
    }
}

//thêm vào giỏ hàng từ trang chi tiết sản phẩm
if (isset($_REQUEST["addFromDetail"])) {
    $phoneid = $_REQUEST["phoneid"];
    $num = $_REQUEST["numQuantityDetail"];
    $phone = Phone::searchPhoneByID($phoneid);
    //
    $kt = 0;
    foreach ($lsCartItem as $key => $value) {
        if ($value->phoneid == $phoneid) {
            $value->quantity += $num;
            $value->setTotalCost();
            echo $value->quantity;
            $kt = 1;
            break;
        }
    }
    if ($kt != 1) {

        $cartItem = new CartItem($phoneid, $phone->phonename, $phone->image, $phone->price, $num);
        array_push($lsCartItem, $cartItem);
    }
    unset($_SESSION["cart"]);
    $_SESSION["cart"] = serialize($lsCartItem);
    header("location:cartView.php");
}
//thêm vào giỏ hàng từ trang product
if (isset($_REQUEST["addFromProduct"])) {
    $phoneid = $_REQUEST["phoneid"];
    $num = $_REQUEST["numQuantity"];
    $phone = Phone::searchPhoneByID($phoneid);
    //
    $kt = 0;
    foreach ($lsCartItem as $key => $value) {
        if ($value->phoneid == $phoneid) {
            $value->quantity += $num;
            $value->setTotalCost();
            //echo $value->quantity;
            $kt = 1;
            break;
        }
    }
    if ($kt != 1) {

        $cartItem = new CartItem($phoneid, $phone->phonename, $phone->image, $phone->price, $num);
        array_push($lsCartItem, $cartItem);
    }
    unset($_SESSION["cart"]);
    $_SESSION["cart"] = serialize($lsCartItem);
    header("location:cartView.php");
}
// cập nhập giá trị nếu >0
if (isset($_REQUEST["numQuantityUpdate"])) {
    $phoneid = $_REQUEST["phoneID"];
    $num = $_REQUEST["numQuantityUpdate"];
    $phone = Phone::searchPhoneByID($phoneid);
    //
    foreach ($lsCartItem as $key => $value) {
        if ($value->phoneid == $phoneid && $num > 0) {
            $value->quantity = $num;
            $value->setTotalCost();
            //echo $value->quantity;
            break;
        }
    }
    // var_dump($lsCartItem);
    unset($_SESSION["cart"]);
    $_SESSION["cart"] = serialize($lsCartItem);
    header("location:cartView.php");
}
//xóa 1 sản phẩm
if (isset($_REQUEST["delete1Row"])) {
    $phoneid = $_REQUEST["phoneid"];
    foreach ($lsCartItem as $key => $value) {
        if ($value->phoneid == $phoneid) {
            unset($lsCartItem[$key]);
            break;
        }
    }
    unset($_SESSION["cart"]);
    $_SESSION["cart"] = serialize($lsCartItem);
    header("location:cartView.php");
}




?>


<div class="container">
    <div class="w-100 my-5 pl-2">
        <h3>Giỏ hàng</h3>
    </div>
    <div class="table-responsive w-100">
        <table class="table">
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Xóa</th>
            </tr>
            <!-- loop -->
            <?php
            $total = 0;
            foreach ($lsCartItem as $key => $value) { ?>
                <!-- -- -->
                <tr>
                    <td class="d-flex ">
                        <div class="w-25 img-inCart" style="height:80px">
                            <img class="h-100" src="imgs/<?php echo $value->image; ?>" alt="ảnh">
                        </div>
                        <p class="w-75"><?php echo $value->phonename; ?></p>
                    </td>
                    <td><?php echo $value->price; ?></td>
                    <td>
                        <input class="input-quantity" style="width: 35%;" type="number" name="<?php echo $value->phoneid ?>" value="<?php echo $value->quantity; ?>" required min="1" onchange="updateCart(this.name,this.value);">
                    </td>
                    <td><?php echo $value->totalCost; ?></td>
                    <td><a class="btn btn-info py-0" href="?delete1Row=&phoneid=<?php echo $value->phoneid; ?>">Xóa</a></td>
                </tr>
                <!-- -- -->
            <?php $total += $value->totalCost;
            } ?>


        </table>
        <div class="float-right">
            <h5>Tổng: <span class="text-danger"><?php echo $total; ?> đ</span></h5>
        </div>
    </div>
</div>
<script>
    function updateCart(aa, bb) {
        var id = aa;
        var num = bb;
        // setTimeout(function(){
        window.location.href = "cartView.php?numQuantityUpdate=" + num + "&phoneID=" + id;
        // },1000);


    }
</script>












<?php include_once("footer.php") ?>