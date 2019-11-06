<?php include_once('header.php') ?>
<?php include_once('nav.php') ?>
<?php include_once('model/user.php') ?>
<?php include_once('model/contact.php') ?>



<?php

$user = unserialize($_SESSION["user"]);
$userid = $user->userid;
$lsFromSearchDB = Contact::getListFromDB($userid);
?>





<div class="container pt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="row align-items-center  ">
                <img src="img/user.png" alt="" class="mx-2" style="width: 15%;">
                <h3 class="mx-2">Danh bạ</h3>
            </div>
            <div class="row ">
                <button data-toggle="modal" data-target="#addBook" class=" ml-2 mt-5 w-75 btn btn-outline-info "><i class="fas fa-plus-circle"></i> Thêm</button>
            </div>
            <div class="row">
                <button class="ml-2 border mt-3 btn w-75 d-block" data-toggle="collapse" data-target="#Nhan">Nhãn</button>

                <div id="Nhan" class="collapse w-100">
                    <ul class="p-0 w-75 ml-2" style="list-style:none!important;">
                        <li class="w-100 border-bottom" style="height: 35px;"><a class="ml-3 pt-2 d-inline-block" href="">A</a></li>
                        <li class="w-100 border-bottom" style="height: 35px;"><a class="ml-3 pt-2 d-inline-block" href="">B</a></li>
                        <li class="w-100 border-bottom" style="height: 35px;"><a class="ml-3 pt-2 d-inline-block" href="">C</a></li>
                        <li class="w-100 border-bottom" style="height: 35px;"><a class="ml-3 pt-2 d-inline-block" href="">D</a></li>
                        <li class="w-100 border-bottom" style="height: 35px;"><a class="ml-3 pt-2 d-inline-block" href="">E</a></li>
                        <li class="w-100 border-bottom" style="height: 35px;"><a class="ml-3 pt-2 d-inline-block" href="">F</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <form class="w-100" action="" method="GET">
                    <div class="input-group w-100">
                        <input class="form-control" value="" name="search" style="" placeholder="Search">
                        <button type="submit" class="btn " style=""><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="row">
                <table class="table mt-5">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <!-- <th>Thao tác</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($lsFromSearchDB as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $value->name ?></td>
                                <td><?php echo $value->phone ?></td>
                                <!-- <td> -->



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
                                <!-- </td> -->
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>



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




























<?php include_once('footer.php') ?>