<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>
<?php include_once("nav.php") ?>
<br><br><br>
<h1 class="text-info ">trang giỏ  hàng</h1><hr>
<div class="container">
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
            <tr>
                <td class="d-flex ">
                   <img class="w-25" src="#" alt="ảnh" style="height:50px">
                   <p class="w-75">Tên sản phẩm</p>
                </td>
                <td>10000</td>
                <td><input type="number" name="numQuantityCart"></td>
                <td>10000đ</td>
                <td><a class="btn btn-info py-0" href="#">Xóa</a></td>
            </tr>
            <!-- -- -->
            <tr>
                <td class="d-flex ">
                   <img class="w-25" src="#" alt="ảnh" style="height:50px">
                   <p class="w-75">Tên sản phẩm</p>
                </td>
                <td>10000</td>
                <td><input type="number" name="numQuantityCart"></td>
                <td>10000đ</td>
                <td><a class="btn btn-info py-0" href="#">Xóa</a></td>
            </tr>
            <!-- -- -->
            <tr>
                <td class="d-flex ">
                   <img class="w-25" src="#" alt="ảnh" style="height:50px">
                   <p class="w-75">Tên sản phẩm</p>
                </td>
                <td>10000</td>
                <td><input type="number" name="numQuantityCart"></td>
                <td>10000đ</td>
                <td><a class="btn btn-info py-0" href="#">Xóa</a></td>
            </tr>
            <!-- -- -->



        </table>
        <div class="float-right">
            <h5>Tổng: 100000 đ</h5>
        </div>
    </div>
</div>













<?php include_once("footer.php") ?>