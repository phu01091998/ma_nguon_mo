<?php include_once('../header.php') ?>
<?php include_once('../model/news.php');

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["fileToUpload"]["name"] != "")
        move_uploaded_file(
            $_FILES["fileToUpload"]["tmp_name"],
            "../image-upload/".$_FILES["fileToUpload"]["name"]
        );
}

?>

<?php $lsNews = News::getListNews(); ?>
<?php $lsCatogry = Catogry::getListCatogry(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 pt-5 pl-4 text-white " style="background: #23282d;">
            <h6 class="mb-5"><a href="../index.php" style="color: #fff!important;">View webside</a></h6>
            <h6 class="my-4">Chuyên mục</h5>
                <ul style="list-style: none; padding: 0px; margin: 0;">
                    <?php foreach ($lsCatogry as $key => $value) { ?>
                        <li>> <?php echo $value->catogryName ?></li>
                    <?php } ?>
                    <li>> Thêm chuyên mục</li>
                </ul>
                <input type="text" class="w-75 d-block my-2 rounded">
                <button type="submit" class="btn p-1">Thêm</button>
                <h6 class="my-5"><a href="add.php" style="color: #fff!important;">Thêm bài viết</a></h6>
                <h6><a href="library.php" style="color: #fff!important;">Thư viện</a></h6>
        </div>
        <div class="col-10 pt-5">
            <h5 class="ml-1">Thêm mới:</h5>
            <form  method="post" enctype="multipart/form-data"><input type="file" name="fileToUpload" value="">
                <button type="submit" name="uploadFile">Thêm</button></form>
            <hr>
            <h5 class="ml-1">Thư viện</h5>
            <div class="row text-center p-1 mx-1">
                <?php
                $path = "../image-upload/";
                $files = scandir($path);
                foreach ($files as $filename) {
                    if ($filename != "." && $filename != "..") { ?>
                        <div class="img-item m-1 " style="width: 170px;height: 110px"><img src="../image-upload/<?php echo $filename; ?>" alt="" class="w-100 h-100"></div>
                <?php

                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>




<?php include_once('../footer.php') ?>