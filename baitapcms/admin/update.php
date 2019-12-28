<?php include_once('../header.php') ?>
<?php include_once('../model/news.php') ?>
<?php include_once('../model/user.php') ?>

<?php
if (!isset($_SESSION)) {
    session_start();
}
$user = unserialize($_SESSION['user']);
if (isset($_REQUEST['update'])) {
    $id = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $author = $user->userName;
    //var_dump($user);
    $dateupdate = date("Y-m-d");
    $image = "";
    //$video = $_REQUEST['update'];
    if (!isset($_REQUEST['image']) || $_REQUEST['image'] == "") {
        $image = $_REQUEST['lastImage'];
    } else {
        $image = $_REQUEST['image'];
    }
    $catogryID = $_REQUEST['catogryID'];
    News::editNews($id, $title, $content, $author, $dateupdate, $image, "", $catogryID);
}

$lsCatogry = Catogry::getListCatogry();
?>
<?php $lsNews = News::getListNews(); ?>
<h1 class="text-info ">Update bài viết</h1>
<button class="btn tbn-default"><a href="index.php">page Admin</a></button>




<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <?php foreach ($lsNews as $key => $value) {
                if (isset($_REQUEST['id']) && $value->newsid == $_REQUEST['id']) { ?>
                    <form>
                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                        <!-- <input type="hidden" name="author" value="Quốc Phú"> -->
                        <label for="newsName">Tiêu đề</label>
                        <input class="w-100" type="text" name="title" value="<?php echo $value->title; ?>"><br>
                        <label for="content">Nội dung</label>
                        <textarea class="ckeditor" name="content"><?php echo $value->content; ?></textarea>
                        <script>
                            CKEDITOR.replace('content', {
                        height: 300,
                        filebrowserUploadUrl: "../upload.php",
                        filebrowserUploadMethod: "form"
                    });
                        </script>

                <?php $img = $value->image;
                    }
                } ?>
        </div>
        <div class="col-4 pt-1 pl-5 pr-5">
            <div class="w-100 my-4 catogry">
                <h6>Chọn chuyên mục</h6>
                <select name="catogryID" id="" class="w-100">
                    <?php foreach ($lsCatogry as $key => $value) { ?>
                        <option value="<?php echo $value->catogryID; ?>"><?php echo $value->catogryName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <h6>Chọn ảnh đại diện</h6>
            <div class="w-100  img border rounded py-3 px-2 ">
                <button type="button" class="btn" data-toggle="modal" data-target="#lib">Thư viện</button><br>
                <span>hoặc</span>
                <div class="w-100">
                    <div class="custom-file w-75">
                        <input type="file" name="fileToUpload" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <button type="submit" class="btn btn-info mt-1">Upload</button>
                </div>
            </div>
            <div class="w-50 mt-2 mb-4">
                <img src="../image-profile/<?php echo $img ?>" alt="" id="img-show" class="w-100">
            </div>
            <div class="w-100 public">
                <button type="submit" class="btn" name="update">Cập nhập</button>
            </div>
        </div>
        <input type="hidden" name="lastImage" value="<?php echo $img ?>">
        <!-- modal thư viện -->
        <div class="modal fade" id="lib" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="w-100 p-1 px-3">
                        <h6 class="pl-1">Chọn ảnh</h6>
                        <?php
                        $path = "../image-profile/";
                        $files = scandir($path);
                        foreach ($files as $filename) {
                            if ($filename != "." && $filename != "..") { ?>
                                <div class="img-item m-1 d-inline-block" style="width: 180px;height: 110px">
                                    <img src="../image-profile/<?php echo $filename; ?>" alt="" class="w-75 h-75 mr-2">
                                    <input type="radio" name="image" value="<?php echo $filename; ?>" onchange="handleChange1(this.value);">
                                </div>
                        <?php

                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </form>

    </div>
</div>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script>
    function handleChange1(value) {
        console.log(value);
        document.getElementById('img-show').src="../image-upload/"+value;
        console.log(document.getElementById('img-show').src);
    }
</script>
<!-- <script>
    
editor.resize('100%','600');
</script> -->
<?php include_once('../footer.php') ?>