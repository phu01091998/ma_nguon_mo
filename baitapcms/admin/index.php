<?php include_once('../header.php') ?>
<?php include_once('../model/news.php');
if (isset($_REQUEST['delete'])) {
    $newID = $_REQUEST['id'];
    News::removeNews($newID);
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
            <h5>Bài viết đã đăng <span class="text-info"><?php echo count($lsNews); ?></span></h5>
            <?php foreach ($lsNews as $key => $value) { ?>
                <div class="w-100 px-4 py-1 mb-1 rounded border ">
                    <h6><a href="update.php?id=<?php echo $value->newsid ?>"><?php echo $key + 1 ?>. <?php echo $value->title ?></a></h6>
                    <div class="d-flex justify-content-between w-100">
                        <div class="d">
                            <a class="mr-3" href="update.php?id=<?php echo $value->newsid ?>">Chỉnh sửa</a>
                            <span class="text-danger" style="cursor: pointer;" data-toggle="modal" data-target="#deleteNews<?php echo $key ?>">Xóa</span></div>
                        <span>Chỉnh sửa lần cuối: 2019-12-08</span>
                    </div>

                </div>
                <form action="">
                    <div class="modal fade" id="deleteNews<?php echo $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h4> Delete this News</h4>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id" value="<?php echo $value->newsid ?>" id="">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-danger" name='delete' value="1">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal deleteContact -->

                </form>
            <?php } ?>
        </div>
    </div>
</div>




<?php include_once('../footer.php') ?>