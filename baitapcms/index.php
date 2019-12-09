<?php include_once('header.php') ?>
<?php include_once('model/news.php') ?>
<?php include_once('model/user.php') ?>

<?php
$lsNews = News::getListNews();
if (isset($_REQUEST['catogryID'])) {
    $lsNews = News::getListNewsByCatogryID($_REQUEST['catogryID']);
}
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION["user"])) {
    $user = unserialize($_SESSION['user']);
}

//var_dump($user);
?>
<?php $lsCatogry = Catogry::getListCatogry(); ?>



<!-- header -->
<div class="container-fluid mb-3 ">
    <div class="row p-2 " style="background: #6c757d">
        <div class="d-inline-block col-10">
            <h1 class=""><a href="index.php" style="padding-left: 199px!important; text-decoration: none!important; color:#fff">Tintuc.org</a></h1>
        </div>
        <div class="col-2 align-items-center">
            <a class="btn btn-light mt-2" href="login.php" style="color: #000"><?php echo isset($user)&& $user != null ?$user->userName :"Login";?></a>
            <a class="btn btn-light mt-2" href="logout.php" style="color: #000">Logout</a>
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
                        <img src="image-upload/<?php echo $value->image; ?>" alt="" class="w-100">
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
            <div class="w-100 p-1 px-3 pt-4 pb-5" style="background-color: #e6e6e6;">
                <h3 class="pl-3">Chuyên mục</h3>
                <?php foreach ($lsCatogry as $key => $value) { ?>

                    <h5 class="pl-3"><a href="?catogryID=<?php echo $value->catogryID; ?>" style="color: black"><?php echo $value->catogryName; ?></a></h5>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


















































<?php include_once('footer.php') ?>