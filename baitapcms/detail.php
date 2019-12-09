<?php include_once('header.php') ?>
<?php include_once('model/news.php') ?>
<?php $lsNews = News::getListNews(); ?>
<?php $lsCatogry = Catogry::getListCatogry(); ?>



<!-- header -->
<div class="container-fluid px-5">
    <div class="row bg-light  p-2 ">
        <div class="d-inline-block col-10">
            <h1 class=""><a href="index.php" style="padding-left: 155px!important; text-decoration: none!important;">Tintuc.org</a></h1>
        </div>
        <div class="col-2 align-items-center">
            <button class="btn btn-default mt-2"><a href="login.php">Login</a></button>
            <button class="btn btn-default mt-2"><a href="logout.php">Logout</a></button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row ">
        <!-- show list news -->
        <div class="w-100 pt-4 pb-5 px-4">
            <?php foreach ($lsNews as $key => $value) { if(isset($_REQUEST['id'])&& $value->newsid==$_REQUEST['id']){ ?>
                
                <h4 class="mt-3"><?php echo $value->title; ?></h4>
                <i class="mb-4">Tác giả: <?php echo $value->author; ?>&emsp; Ngày đăng: <?php echo $value->datepost; ?>
                &emsp; Sửa lần cuối: <?php echo $value->dateupdate; ?></i>
                <p class="my-2 mt-4">&emsp;&emsp;<?php echo $value->content; ?></p>
                <img src="image-upload/<?php echo $value->image; ?>" alt="">
            <?php }} ?>
        </div>
        <!-- hot news -->
    </div>
</div>


















































<?php include_once('footer.php') ?>