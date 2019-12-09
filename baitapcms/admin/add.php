<?php include_once('../header.php') ?>
<?php include_once('../model/news.php'); 

if(isset($_REQUEST['add'])){
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $author="Quốc Phú";
    $datepost= date("Y-m-d");
    //$image = $_REQUEST['file'];
    $image = "tt1.jpg";
    $catogryID = $_REQUEST['catogryID'];
    News::createNews($title,$content,$author,$datepost,$datepost,$image,"",$catogryID);
    //header("location:update.php")
}
$lsCatogry = Catogry::getListCatogry();

?>
<h1 class="text-info ">Trang thêm bài viết</h1>
<button class="btn tbn-default"><a href="index.php">page Admin</a></button>




<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <form>
                <label for="title">Tiêu đề</label>
                <input class="w-100"  type="text" name="title"><br>
                <label for="content">Nội dung</label>
                <textarea class="ckeditor" name="content"></textarea>
                <script>
                    CKEDITOR.replace('content');
                </script>
           
        </div>
        <div class="col-4 pt-5 pl-5">
            <div class="w-100 my-4 catogry">
                <h6>Chọn chuyên mục</h6>
                <select name="catogryID" id="">
                    <?php foreach ($lsCatogry as $key => $value) { ?>
                        <option value="<?php echo $value->catogryID; ?>"><?php echo $value->catogryName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="w-100 mb-5 img">
                <h6>Chọn ảnh/video</h6>
                <input type="file" name="file" style="padding: 5px;">
            </div>
            <div class="w-100 public">
                <button type="submit" class="btn" name="add">Đăng bài</button>
            </div>
        </div>
        </form>

    </div>
</div>
<?php include_once('../footer.php') ?>