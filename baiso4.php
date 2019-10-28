<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>
<?php include_once("model/book.php") ?>

<?php
#Code bài số 4
include_once("model/book.php");
if (isset($_REQUEST["addBook"])) {
    // $id = $_REQUEST["id"];
    $title = $_REQUEST["title"];
    $price = $_REQUEST["price"];
    $author = $_REQUEST["author"];
    $year = $_REQUEST["year"];
    Book::addBookToDB($price, $title, $author, $year);
}
if (isset($_REQUEST['id_edit'])) {
    $id = $_REQUEST["id_edit"];
    $title = $_REQUEST["title"];
    $price = $_REQUEST["price"];
    $author = $_REQUEST["author"];
    $year = $_REQUEST["year"];
    Book::editBookDB($id, $price, $title, $author, $year);
}
if (isset($_REQUEST['id_delete'])) {

    Book::removeBookDB($_REQUEST['id_delete']);
}
$ls = Book::getList();
$lsFromDB = Book::getListFromDB();
$keyWord = null;


//pagination
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$mount = 6;
$start = ($page - 1) * $mount;
$con = Book::connect();
$sql = " select COUNT(*) FROM book";
$result =  $con->query($sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $mount);
$lsFromSearchDB = Book::paginationFromDB($start, $mount);
//search
if (isset($_REQUEST["search"])) {
    $keyWord =  $_REQUEST["search"];
    if ($_REQUEST["search"] == "") {
        $keyWord = null;
    }
    $lsFromSearchDB = Book::searchBookDB($keyWord);
}
?>
<div class="container pt-5">
    <button data-toggle="modal" data-target="#addBook" class="btn btn-outline-info float-right"><i class="fas fa-plus-circle"></i> Thêm</button>
    <form action="" method="GET">
        <div class="form-group">
            <input class="form-control" value="<?php echo $keyWord; ?>" name="search" style="max-width: 200px; display:inline-block;" placeholder="Search">
            <button type="submit" class="btn btn-default" style="margin-left:-50px"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <table class="table mt-5">
        <thead class="thead-dark">
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Author</th>
                <th>Year</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lsFromSearchDB as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $value->id ?></td>
                    <td><?php echo $value->title ?></td>
                    <td><?php echo $value->price ?></td>
                    <td><?php echo $value->author ?></td>
                    <td><?php echo $value->year ?></td>
                    <td>


                        <button type="button" data-toggle="modal" data-target="#editBook<?php echo $key ?>" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i> Edit</button>

                        <button type="button" data-toggle="modal" data-target="#confirmDeleteModal<?php echo $key ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        <!-- modal delete_confirm -->
                        <form action="">
                            <div class="modal fade" id="confirmDeleteModal<?php echo $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Delete this book?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-danger" name='id_delete' value="<?php echo $value->id ?>">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal delete_confirm -->

                        </form>
                        <!-- modal editBook -->
                        <div class="modal fade" id="editBook<?php echo $key ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form class="form-horizontal">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add new book</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <fieldset>
                                                <!-- <div class="form-group d-flex">
                                                    <label class="pt-1 col-md-2 control-label" for="Title">ID</label>
                                                    <div class="col-md-10">
                                                        <input id="id" name="id" type="text" placeholder="ID" class="form-control input-md">
                                                    </div>
                                                </div> -->
                                                <div class="form-group d-flex">
                                                    <label class="pt-1 col-md-2 control-label" for="title">Title</label>
                                                    <div class="col-md-10">
                                                        <input id="title" name="title" type="text" value="<?php echo $value->title ?>" placeholder="<?php echo $value->title ?>" class="form-control input-md">
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex">
                                                    <label class="pt-1 col-md-2 control-label" for="price">Price</label>
                                                    <div class="col-md-10">
                                                        <input id="price" name="price" type="text" value="<?php echo $value->price ?>" placeholder="<?php echo $value->price ?>" class="form-control input-md">
                                                    </div>
                                                </div>


                                                <!-- Text input-->
                                                <div class="form-group d-flex">
                                                    <label class="pt-1 col-md-2 control-label" for="author">Author</label>
                                                    <div class="col-md-10">
                                                        <input id="author" name="author" type="text" value="<?php echo $value->author ?>" placeholder="<?php echo $value->author ?>" class="form-control input-md">

                                                    </div>
                                                </div>
                                                <div class="form-group d-flex">
                                                    <label class="pt-1 col-md-2 control-label" for="year">Year</label>
                                                    <div class="col-md-10">
                                                        <input id="year" name="year" type="text" value="<?php echo $value->year ?>" placeholder="<?php echo $value->year ?>" class="form-control input-md">

                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name='id_edit' value="<?php echo $value->id ?>" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- end modal editbook -->
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<div class="container">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="?page=1">First</a></li>
            <li class="page-item <?php if ($page <= 1) {
                                        echo 'disabled';
                                    } ?>">
                <a class="page-link" href="<?php if ($page <= 1) {
                                                echo '#';
                                            } else {
                                                echo "?page=" . ($page - 1);
                                            } ?>">Prev</a>
            </li>

            <?php
            for ($i = $page; $i <= $total_pages && $i <= $page + 10; $i++) {
                ?>
                <li class="page-item <?php if ($i == $page) echo ' active' ?>"><a class="page-link" href="<?php echo "?page=" . $i ?> "><?php echo $i ?></a></li>
            <?php
            }
            ?>
            <li class="page-item <?php if ($page >= $total_pages) {
                                        echo 'disabled';
                                    } ?>">
                <a class="page-link" href="<?php if ($page >= $total_pages) {
                                                echo '#';
                                            } else {
                                                echo "?page=" . ($page + 1);
                                            } ?>">Next</a>
            </li>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $total_pages; ?>">Last</a></li>
        </ul>
    </nav>
</div>
<!-- modal addBook -->
<div class="modal fade" id="addBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <!-- <div class="form-group d-flex">
                            <label class="pt-1 col-md-2 control-label" for="id">ID</label>
                            <div class="col-md-10">
                                <input id="id" name="id" type="text" placeholder="ID" class="form-control input-md">
                            </div>
                        </div> -->
                        <div class="form-group d-flex">
                            <label class="pt-1 col-md-2 control-label" for="title">Title</label>
                            <div class="col-md-10">
                                <input id="title" name="title" type="text" placeholder="Title" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="pt-1 col-md-2 control-label" for="price">Price</label>
                            <div class="col-md-10">
                                <input id="price" name="price" type="text" placeholder="Price" class="form-control input-md">
                            </div>
                        </div>
                        <!-- Select Basic -->
                        <div class="form-group d-flex">
                            <label class="pt-1 col-md-2 control-label" for="year">Year</label>
                            <div class="col-md-10">
                                <select id="year" name="year" class="form-control">
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group d-flex">
                            <label class="pt-1 col-md-2 control-label" for="author">Author</label>
                            <div class="col-md-10">
                                <input id="author" name="author" type="text" placeholder="Author" class="form-control input-md">

                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addBook" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- end modal addbook -->

<?php include_once("footer.php") ?>