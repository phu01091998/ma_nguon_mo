<?php include_once("header.php")?>
<?php include_once("nav.php")?>
    <?php
        $masinhvien = $ho =$ten =$ngaysinh =$email =""; 
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $masinhvien= $_REQUEST["txtMaSV"];
            $ho= $_REQUEST["txtHo"];
            $ten= $_REQUEST["txtTen"];
            $ngaysinh= $_REQUEST["dateNgaySinh"];
            $email= $_REQUEST["txtEmail"];
            $email= filter_var($email,FILTER_SANITIZE_EMAIL);

        }
        // filter_var
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "ban da nhap email dung dinh dang";
        }else{
            echo "email nhap chua dung dinh dang";
        }
        // var_dump($_FILES);
        if(isset($_FILES["fileAnhDaiDien"]["tmp_name"]) != ""){
        move_uploaded_file($_FILES['fileAnhDaiDien']["tmp_name"],"C:/xampp\htdocs\uploads/2.jpg");
        }
    ?>
    <form  method="post" enctype="multipart/form-data">
        <div style="margin:10px">
            <div class="">
                <label for="">Mã sinh viên</label>
            </div>
            <div class="">
                <input require type="text" name="txtMaSV" value="<?php echo $masinhvien?>">
            </div>
            <div class="">
                <label for="">Họ</label>
            </div>
            <div class="">
                <input require type="text" name="txtHo" value="<?php echo $ho?>">
            </div>
            <div class="">
                <label for="">Tên</label>
            </div>
            <div class="">
                <input require type="text" name="txtTen" value="<?php echo $ten?>">
            </div>
            <div class="">
                <label for="">Ngày sinh</label>
            </div>
            <div class="">
                <input type="date" name="dateNgaySinh" value="<?php echo $ngaysinh?>">
            </div>
            <div class="">
                <label for="">Email</label>
            </div>
            <div class="">
                <input type="email" name="txtEmail" value="<?php echo $email?>">
            </div>
            <div class="">
                <label for="">Ảnh đại diện</label>
            </div>
            <div class="">
                <input type="file"  name="fileAnhDaiDien" value="Chọn Tệp">
            </div>
            <br>
            <!-- --Submit-- -->
            <div class="">
                <input type="submit" name="btnSubmit" value="Submit">
            </div>
           
        </div>
        




        <?php ?>




    
    </form>












<?php include_once("footer.php")?>