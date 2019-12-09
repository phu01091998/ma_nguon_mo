<?php include_once('header.php') ?>
<?php include_once('model/news.php') ?>

<?php 


$lsNews = News::getListNews(); 
?>
<?php $lsCatogry = Catogry::getListCatogry(); ?>



<!-- header -->
<div class="container-fluid px-5">
    <div class="row bg-light  p-2 " >
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
        <div class="col-9">
            <?php foreach ($lsNews as $key => $value) { ?>
                <div class="row bg-light  p-1 m-2">
                    <div class="col 4">
                        <img src="imgs/<?php echo $value->image; ?>" alt="" class="w-100">
                    </div>
                    <div class="col-8">
                        <h5><a href="detail.php?id=<?php echo $value->newsid ?>"><?php echo $value->title; ?></a></h5>
                        <p><?php echo substr($value->content, 0, 200); ?>...</p>
                        <div class="w-100 d-flex justify-content-between">
                            <h6>Tác giả: <?php echo $value->author; ?></h6>
                            <span>ngày đăng: <?php echo $value->datepost; ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- hot news -->
        <div class="col-3 mt-2">
            <div class="w-100 bg-info p-1 px-3 pt-4 pb-5">
                <h3>Catogry</h3>
                <?php foreach ($lsCatogry as $key => $value) { ?>

                    <h5><?php echo $value->catogryName; ?></h5>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


















































<?php include_once('footer.php') ?>