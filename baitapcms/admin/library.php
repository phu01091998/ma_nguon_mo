<?php include_once('../header.php') ?>
<?php include_once('../model/news.php');

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["fileToUpload"]["name"] != "") {
        $target_dir = "../image-profile/";
        $target_file = $target_dir . $_FILES["fileToUpload"]["name"];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]); //kiểm tra phải img hay k
        if ($check ==false) {
            $uploadOk =0 ;
        }
        //var_dump($uploadOk);
        //file tồn tại
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        //var_dump($uploadOk);
        // không phỏi ảnh phù hợp
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }
        //var_dump($uploadOk);
        if($uploadOk==1){
            move_uploaded_file(
                $_FILES["fileToUpload"]["tmp_name"],
                $target_file
            );
        }
    }
}

?>

<?php $lsNews = News::getListNews(); ?>
<?php $lsCatogry = Catogry::getListCatogry(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 pt-5 pl-4 " style="min-height: 100vh;background: #00000042">
            <h5 class="mb-5"><a href="index.php" style="color: black;">Admin page</a></h5><hr>
            <h6 class="my-4">Chuyên mục</h5>
                <ul style="list-style: none; padding: 0px; margin: 0;">
                    <?php foreach ($lsCatogry as $key => $value) { ?>
                        <li>> <?php echo $value->catogryName ?></li>
                    <?php } ?>
                    <li>Thêm chuyên mục</li>
                </ul>
                <input type="text" class="w-75 d-block my-2 rounded">
                <button type="submit" class="btn p-1">Thêm</button>
                <h6 class="my-5"><a href="add.php" style="color: black;">Thêm bài viết</a></h6>
                <h6><a href="library.php" style="color: black;">Thư viện</a></h6>
        </div>
        <div class="col-10 pt-5">
            <h5 class="ml-1">Thêm mới:</h5>
            <form method="post" enctype="multipart/form-data"><input type="file" name="fileToUpload" value="">
                <button type="submit" name="uploadFile">Thêm</button></form>
            <hr>
            <h5 class="ml-1">Thư viện</h5>
            <div class="row text-center p-1 mx-1">
                <?php
                $path = "../image-profile/";
                $files = scandir($path);
                foreach ($files as $filename) {
                    if ($filename != "." && $filename != "..") { ?>
                        <div class="img-item m-1 " style="width: 170px;height: 110px"><img src="../image-profile/<?php echo $filename; ?>" alt="" class="w-100 h-100"></div>
                <?php

                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>




<?php include_once('../footer.php') ?>