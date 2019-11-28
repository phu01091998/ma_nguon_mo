<?php include_once('header.php') ?>
<?php include_once('model/user.php') ?>
<?php include_once('model/contact.php') ?>
<?php include_once('model/label.php') ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
$user = unserialize($_SESSION["user"]);
$username = $user->userName;
?>


<?php
$userid = $user->userid;

if (isset($_REQUEST["addCL"]) && isset($_REQUEST["laCL"])) {

    $listC = $_REQUEST["addCL"];
    $arr =    explode(":", $listC);
    //var_dump($arr);
    $laID = $_REQUEST["laCL"];
    foreach ($arr as $key => $value) {
        //   var_dump($value);
        if ($value != "") {
            Label::addContactlabel($value, $laID);
        }
    }
    header("location:index.php");
}
//
if (isset($_REQUEST["deleteCL"])) {
    $listC = $_REQUEST["deleteCL"];
    $arr =    explode(":", $listC);
    //  var_dump($arr);
    foreach ($arr as $key => $value) {
        //     var_dump($value);
        if ($value != "") {
            Label::removeContactlabel($value);
        }
    }
    header("location:index.php");
}
//
if (isset($_REQUEST["createContact"])) {
    // $id = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];
    $labelID = $_REQUEST["labelID"];
    Contact::createContactDB($name, $email, $phone, $labelID, $userid);
    header("location:index.php");
}
//
if (isset($_REQUEST["createLabel"])) {
    // $id = $_REQUEST["id"];
    $labelName = $_REQUEST["txtnameLabel"];
    Label::createLabel($labelName, $userid);
    header("location:index.php");
}
//
if (isset($_REQUEST['id_edit'])) {
    $id = $_REQUEST["id_edit"];
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];
    $labelID = $_REQUEST["labelID"];
    Contact::editContactDB($id, $name, $email, $phone);
    header("location:index.php");
}
//
if (isset($_REQUEST['editLabel'])) {

    $lbname = $_REQUEST["txtrenameLabel"];
    $lbid = $_REQUEST["editLabel"];
    Label::editLabelDB($lbid, $lbname);
    header("location:index.php");
}
//
if (isset($_REQUEST['id_delete'])) {

    Contact::removeContactDB($_REQUEST['id_delete']);
    header("location:index.php");
}
//
if (isset($_REQUEST['deleteLabel'])) {

    Label::removeLabelDB($_REQUEST['deleteLabel']);
    header("location:index.php");
}

//
$lsContactFromSearchDB = Contact::getListFromDB($userid);
$lsLabelFromDB = Label::getListLabelFromDB($userid);
if (isset($_REQUEST["search"])) {
    $keyWord =  $_REQUEST["search"];
    if ($_REQUEST["search"] == "") {
        $keyWord = null;
    }
    $lsContactFromSearchDB = Contact::searchContactDB($keyWord, $userid);
}
if (isset($_REQUEST["labelid"])) {
    $lsContactFromSearchDB = Label::getContactLabel($_REQUEST["labelid"], $userid);
}

?>





<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-2 pl-4 text-main pt-1">
            <div class="row align-items-center w-100  ">
                <h5 class="my-auto ml-3 mr-2 fa fa-bars" data-toggle="collapse" data-target="#Left"></h5>
                <img src="img/contacts_48dp.png" alt="" class="mx-2" style="width: 19%;">
                <h5 class="mx-2 ml-1 my-auto">Contact</h5>
            </div>
        </div>
        <div class="col-md-10 pr-5 pl-4">
            <div class="row pl-3">
                <form class="w-75" action="index.php" method="GET">
                    <div class="input-group w-100">
                        <input class="form-control rounded-right" value="" name="search" style="" placeholder="Search">
                        <button type="submit" class="btn " style="margin-left:-50px; z-index: 99;"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <div class="dropdown my-auto pl-5 w-25">
                    <i class="far fa-question-circle mt-2 mr-3" style="font-size: 20px;"></i>
                    <i class="fas fa-cog mt-2 ml-2" style="font-size: 20px;"></i>
                    <h6 class="float-right btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                        <?php echo $username; ?>
                    </h6>
                    <div class="dropdown-menu text-center " aria-labelledby="dropdownMenuButton">
                        <a href="logout.php" class="dropdown-item btn btn-outline-secondary">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 mt-1 pl-4 collapse show " id="Left">
            <div class="row ">
                <button data-toggle="modal" data-target="#CreateContact" class=" ml-2 mt-4 px-3  btn btn-outline-secondary btn-them" style="font-weight: 600;;"><span class="VfPpkd-Q0XOV mr-1" aria-hidden="true"><svg width="36" height="36" viewBox="0 0 36 36">
                            <path fill="#34A853" d="M16 16v14h4V20z"></path>
                            <path fill="#4285F4" d="M30 16H20l-4 4h14z"></path>
                            <path fill="#FBBC05" d="M6 16v4h10l4-4z"></path>
                            <path fill="#EA4335" d="M20 16V6h-4v14z"></path>
                            <path fill="none" d="M0 0h36v36H0z"></path>
                        </svg></span> Create contact</button>
            </div>
            <div class="row ml-1 mt-4 mb-3">
                <a href="index.php">
                    <h6><i class="fas fa-user mr-4 text-muted"></i>Contact</h6>
                </a>
            </div>
            <div class="row ml-1 mb-3">
                <a href="index.php">
                    <h6><i class="fas fa-history mr-4 text-muted"></i>Frequently contacted</h6>
                </a>
            </div>
            <div class="row ml-1 mb-3">
                <a href="index.php">
                    <h6><i class="far fa-clone mr-4 text-muted"></i>Duplicates</h6>
                </a>
            </div>
            <div class="row border-top border-bottom ml-1 ">
                <div class="text-title w-75 d-block pt-2 pb-1" data-toggle="collapse" data-target="#Nhan">
                    <h6><i class=" text-main fas fa-chevron-down mr-4"></i>Nhãn</h6>
                </div>
                <div id="Nhan" class="collapse show w-100">
                    <ul class="p-0 w-100 " style="margin-bottom:4px!important; list-style:none!important;">
                        <?php foreach ($lsLabelFromDB as $key => $value) {
                            $lbid = $value->id; ?>
                            <div class="">
                                <li class="w-100 hov pt-1" style="height: 35px;"><a class=" pt-2 " href="index.php?labelid=<?php echo $value->id ?>"><i class="fas fa-angle-right ml-1 mr-4"></i><?php echo $value->name; ?></a>
                                    <div class="hide float-right my-auto">
                                        <i data-toggle="modal" data-target="#editLabel<?php echo $key ?>" class=" mr-2 fas fa-pencil-alt"></i>
                                        <i data-toggle="modal" data-target="#deleteLabel<?php echo $key ?>" class="far fa-trash-alt"></i>
                                    </div>

                                </li>
                            </div>
                            <!-- modal deleteLabel -->
                            <form action="">
                                <div class="modal fade" id="deleteLabel<?php echo $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h4> Delete this label?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-danger" name='deleteLabel' value="<?php echo $lbid ?>">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal deleteLabel -->

                            </form>
                            <!-- modal editLabel -->
                            <div class="modal fade" id="editLabel<?php echo $key ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form class="form-horizontal">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Rename</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <input type="text" class="border-only-bottom  border-bottom w-100 " placeholder="<?php echo $value->name; ?>" name="txtrenameLabel">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name='editLabel' value="<?php echo $lbid ?>" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- end modal editLabel -->
                        <?php }
                        ?>
                        <li class="w-100 " style="height: 35px;"><a data-toggle="modal" data-target="#createLabel" class=" pt-2 d-inline-block" href="#"><i class="fas fa-plus  mr-3 pr-1"></i>Create label</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--list contact -->
        <div class="col mr-4">
            <div class="row">
                <form action="/" name="addContacttoLabel">
                    <!-- Collapse -->
                    <div class="btn-group  mt-1 ml-5 pl-3 align-items-center" title="edit label">
                        <div data-toggle="collapse" data-target="#addCL" aria-haspopup="true" aria-expanded="false">
                            <svg width="24" height="24" viewBox="0 0 24 24" class="NSy2Hd RTiFqe undefined">
                                <path fill="none" d="M0 0h24v24H0V0z"></path>
                                <path d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 1.99 2 1.99L16 19c.67 0 1.27-.33 1.63-.84L22 12l-4.37-6.16zM16 17H5V7h11l3.55 5L16 17z"></path>
                            </svg>
                        </div>
                        <div class="collapse mt-2 ml-2" id="addCL">
                            <span> Label </span>
                            <select name="labelID" id="labelID111">
                                <?php foreach ($lsLabelFromDB as $key => $value) { ?>
                                    <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                <?php } ?>
                            </select>

                            <a class="btn btn-outline-primary text-secondary border p-0 px-1 mb-1" id="addContacttoLabel" href="#">Apply</a>
                            <a class="btn btn-outline-secondary  border p-0 px-1 mb-1" id="removeContacttoLabel" href="#">unlabelled</a>

                        </div>
                    </div>
                </form>
                <table class="table borderless  ml-4">
                    <thead class="">
                        <tr class="">
                            <th style="padding-left:43px!important;">Num</th>
                            <th class="pl-5">Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <!-- <th class="text-center " style="padding-right: 127px!important;" >Option</th> -->
                            <!-- <th>Thao tác</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($lsContactFromSearchDB as $key => $value) {
                            $contactid = $value->id;
                            ?>
                            <tr class="hov">
                                <td style="padding-left:14px!important;">
                                    <input type="checkbox" name="contactID" class="chb mr-4" value="<?php echo $value->id; ?>">
                                    <?php echo $key + 1 ?>
                                </td>
                                <td class="pl-5"><?php echo $value->name ?></td>
                                <td class=""><?php echo $value->email ?></td>
                                <td class=""><?php echo $value->phone ?>
                                    <!-- </td> -->
                                    <!-- <td> -->


                                    <!-- <td class="text-center"> -->
                                    <div class="float-right " >
                                        <i data-toggle="modal" data-target="#editContact<?php echo $key ?>" class="hide mr-2 fas fa-pencil-alt"></i>
                                        <i data-toggle="modal" data-target="#deleteContact<?php echo $key ?>" class="hide mr-2 far fa-trash-alt"></i>
                                        <span class="d-inline-block pb-2">:</span>
                                    </div>
                                    <!-- <button type="button" data-toggle="modal" data-target="#editContact<?php echo $key ?>" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i> Edit</button>

                                    <button type="button" data-toggle="modal" data-target="#deleteContact<?php echo $key ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button> -->

                                    <form action="">
                                        <div class="modal fade" id="deleteContact<?php echo $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4> Delete this contact?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-danger" name='id_delete' value="<?php echo $contactid ?>">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal deleteContact -->

                                    </form>
                                    <!-- modal editContact -->
                                    <div class="modal fade" id="editContact<?php echo $key ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form class="form-horizontal">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit contact</h5>
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
                                                                <label class="pt-1 col-md-2 control-label" for="name">Name</label>
                                                                <div class="col-md-10">
                                                                    <input id="name" name="name" type="text" value="<?php echo $value->name ?>" placeholder="<?php echo $value->name ?>" class="form-control input-md">
                                                                </div>
                                                            </div>
                                                            <div class="form-group d-flex">
                                                                <label class="pt-1 col-md-2 control-label" for="email">Email</label>
                                                                <div class="col-md-10">
                                                                    <input id="email" name="email" type="text" value="<?php echo $value->email ?>" placeholder="<?php echo $value->email ?>" class="form-control input-md">
                                                                </div>
                                                            </div>
                                                            <div class="form-group d-flex">
                                                                <label class="pt-1 col-md-2 control-label" for="phone">Phone</label>
                                                                <div class="col-md-10">
                                                                    <input id="phone" name="phone" type="text" value="<?php echo $value->phone ?>" placeholder="<?php echo $value->phone ?>" class="form-control input-md">
                                                                </div>
                                                            </div>
                                                            <!-- Select label -->
                                                            <div class="form-group d-flex">
                                                                <label class="pt-1 col-md-2 control-label" for="labelID">Add Label</label>
                                                                <div class="col-md-10">
                                                                    <select id="label" name="labelID" class="form-control">
                                                                        <?php
                                                                            foreach ($lsLabelFromDB as $key => $value) {
                                                                                ?>
                                                                            <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                                                        <?php
                                                                            }
                                                                            ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name='id_edit' value="<?php echo $contactid ?>" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- end modal editContact -->
                                    <!-- </td> -->
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>


                <script>
                    //labelid
                    var tam = "",
                        tam2 = "index.php?";
                    var e = document.getElementById("labelID111");
                    var addlabel = document.getElementById("addContacttoLabel");
                    var lbCL = e.options[e.selectedIndex].value;
                    e.addEventListener('click', function() {
                        tam = "";
                        var lbCL = e.options[e.selectedIndex].value;
                        tam = "laCL=" + lbCL;
                        tam = tam + "&";
                        var ccc = document.getElementById("addContacttoLabel");

                        ccc.href = tam2 + tam;

                        console.log(ccc.href);
                        //


                    });

                    //contactid
                    var arr = [];
                    var stra = strd = "";
                    var chb = document.querySelectorAll('.chb');
                    var addlabel = document.getElementById("addContacttoLabel");
                    var removelabel = document.getElementById("removeContacttoLabel");

                    chb.forEach((answer, index) => {
                        console.log(answer.value);
                        answer.addEventListener('click', function() {
                            stra = "index.php?";
                            strd = "index.php?"
                            if (answer.checked == 1) {
                                arr.push(answer.value);
                                console.log(arr);
                            } else {
                                for (var i = 0; i < arr.length; i++) {
                                    if (arr[i] === answer.value) {
                                        arr.splice(i, 1);
                                    }
                                    console.log(arr);
                                }
                            }
                            stra = stra + "addCL=";
                            strd = strd + "deleteCL=";
                            for (var i = 0; i < arr.length; i++) {

                                stra = stra + arr[i].toString();
                                stra = stra + ':';
                                //

                                strd = strd + arr[i].toString();
                                strd = strd + ':';
                            }
                            stra = stra + '&';
                            strd = strd + '&';


                            addlabel.href = stra + tam;
                            tam2 = stra;
                            removelabel.href = strd;
                            console.log(addlabel.href);
                            console.log(removelabel.href);



                        });
                    });
                </script>
            </div>

        </div>
    </div>



</div>

<!-- modal createContact -->
<div class="modal fade" id="CreateContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="form-group d-flex">
                            <label class="pt-1 col-md-2 control-label" for="name">Name</label>
                            <div class="col-md-10">
                                <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="pt-1 col-md-2 control-label" for="email">Email</label>
                            <div class="col-md-10">
                                <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="pt-1 col-md-2 control-label" for="phone">Phone</label>
                            <div class="col-md-10">
                                <input id="phone" name="phone" type="text" placeholder="Phone Number" class="form-control input-md">
                            </div>
                        </div>
                        <!-- Select label -->
                        <div class="form-group d-flex">
                            <label class="pt-1 col-md-2 control-label" for="labelID">Add Label</label>
                            <div class="col-md-10">
                                <select id="label" name="labelID" class="form-control">
                                    <?php
                                    foreach ($lsLabelFromDB as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="createContact" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- end modal addbook -->
<!-- Modal create Label -->
<div class="modal fade" id="createLabel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="index.php" class="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create label</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="text" class="border-only-bottom  border-bottom w-100 " name="txtnameLabel">
                    <input type="hidden" name="txtUserID">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="createLabel" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



























<?php include_once('footer.php') ?>