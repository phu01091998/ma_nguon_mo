<?php include_once('../header.php') ?>
<?php include_once('../model/news.php') ?>
<?php $lsNews = News::getListNews(); ?>
<?php $lsCatogry = Catogry::getListCatogry(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 pt-5 pl-4 text-white " style="background: #23282d; height: 100vh">
            <h6 class="mb-5"><a href="../index.php" style="color: #fff!important;">View webside</a></h6>
            <h6 class="my-4">Chuyên mục</h5>
                <ul style="list-style: none; padding: 0px; margin: 0;">
                    <?php foreach ($lsCatogry as $key => $value) { ?>
                        <li>> <?php echo $value->name ?></li>
                    <?php } ?>
                    <li>> Thêm chuyên mục</li>
                </ul>
                <input type="text" class="w-75 d-block my-2">
                <button type="submit" class="btn p-1">Thêm</button>
                <h6 class="my-5"><a href="add.php" style="color: #fff!important;">Thêm bài viết</a></h6>
                <h6><a href="" style="color: #fff!important;">Thư viện</a></h6>
        </div>
        <div class="col-10 pt-5">
            <h5>Bài viết đã đăng <span class="text-info"><?php echo count($lsNews);?></span></h5>
            <?php foreach ($lsNews as $key => $value) { ?>
                <div class="w-100 px-4 py-1 mb-1 rounded border ">
                    <h6><a href="update.php?id=<?php echo $value->newsid?>"><?php echo $key+1 ?>. <?php echo $value->title ?></a></h6>
                    <div class="d-flex justify-content-between w-100">
                        <div class="d">
                            <a class="mr-3" href="update.php?id=<?php echo $value->newsid?>">Chỉnh sửa</a>
                            <a class="text-danger" href="?delete=1&id=<?php echo $value->newsid?>">Xóa</a></div>
                        <span>Chỉnh sửa lần cuối: 2019-12-08</span>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
</div>




<?php include_once('../footer.php') ?>