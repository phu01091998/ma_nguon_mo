<?php include_once('../header.php') ?>
<?php include_once('../model/news.php') ?>

<?php  
if(isset($_REQUEST['update'])){
    $id = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $author = $_REQUEST['author'];
    $dateupdate= date("Y-m-d");
    //$video = $_REQUEST['update'];
    $image = "tt1.jpg";
    $catogryID = $_REQUEST['catogryID'];
    News::editNews($id,$title,$content,$author,$dateupdate,$image,"",$catogryID);
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
                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
                        <input type="hidden" name="author" value="Quốc Phú">
                        <label for="newsName">Tiêu đề</label>
                        <input class="w-100" type="text" name="title" value="<?php echo $value->title; ?>"><br>
                        <label for="content">Nội dung</label>
                        <textarea class="ckeditor" name="content"><?php echo $value->content; ?></textarea>
                        <script>
                            CKEDITOR.replace('content');
                        </script>

                <?php }
                } ?>
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
                <button type="submit" class="btn" name="update">Cập nhập</button>
            </div>
        </div>
        </form>

    </div>
</div>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<!-- <script>
    
editor.resize('100%','600');
</script> -->
<?php include_once('../footer.php') ?>