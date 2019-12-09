<?php include_once('header.php') ?>
<?php include_once('../model/news.php');

if (isset($_REQUEST['addCatogry'])) {
    $catogryName = $_REQUEST['catogryName'];
    Catogry::addCatogry($catogryName);
}

if (isset($_REQUEST['delete'])) {
    $newID = $_REQUEST['id'];
    News::removeNews($newID);
}
if (isset($_REQUEST['editCatogry'])) {

    $name = $_REQUEST["catoryName"];
    $id = $_REQUEST["editCatogry"];
    Catogry::editCatogry($id, $name);
    header("location:index.php");
}
//
if (isset($_REQUEST['deleteCatogry'])) {

    Catogry::deleteCatogry($_REQUEST['deleteCatogry']);
    header("location:index.php");
}

?>
<?php $lsNews = News::getListNews(); ?>
<?php $lsCatogry = Catogry::getListCatogry(); ?>
<div class="container-fluid">
    <!-- background: #23282d; -->
    <div class="row">
        <div class="col-2 pt-5 pl-4 " style=" min-height: 100vh; background: #00000042">
            <h5 class="mb-5"><a href="../index.php" style="color: black!important;">View webside</a></h5>
            <hr>
            <h6 class="my-4">Chuyên mục</h5>
                <ul style="list-style: none; padding: 0px; margin: 0;">
                    <?php foreach ($lsCatogry as $key => $value) { ?>
                        <li class="show">
                            > <?php echo $value->catogryName ?>
                            <div class="hide float-right my-auto">
                                <i data-toggle="modal" data-target="#editCatogry<?php echo $key ?>" class=" mr-2 fas fa-pencil-alt" style="cursor: pointer; font-size: 12px;"></i>
                                <i data-toggle="modal" data-target="#deleteCatogry<?php echo $key ?>" class="far fa-trash-alt" style="cursor: pointer;font-size: 12px;"></i>
                            </div>
                        </li>
                        <!-- modal deleteCatogry -->
                        <form action="">
                            <div class="modal fade" id="deleteCatogry<?php echo $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="text-danger"> Delete this Catogry?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-danger" name='deleteCatogry' value="<?php echo $value->catogryID ?>">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal deleteCatogry -->

                        </form>
                        <!-- modal editCatogry -->
                        <div class="modal fade" id="editCatogry<?php echo $key ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form class="form-horizontal">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h5 class="d-block text-primary py-3">Rename</h5>

                                            <input type="text" class="border-only-bottom  border-bottom w-100 " value="<?php echo $value->catogryName ?>" name="catoryName">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name='editCatogry' value="<?php echo $value->catogryID ?>" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- end modal editCatogry -->
                    <?php } ?>
                    <li>Thêm chuyên mục</li>
                </ul>
                <form action="" method="get">
                    <input type="text" name="catogryName" class="w-75 d-block my-2 rounded">
                    <button type="submit" name="addCatogry" class="btn p-1">Thêm</button>
                </form>
                <h6 class="my-5"><a href="add.php" style="color: black;">Thêm bài viết</a></h6>
                <h6><a href="library.php" style="color: black;">Thư viện</a></h6>
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