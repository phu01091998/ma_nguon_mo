<?php

class Contact
{
    #Begin properties
    var $id;
    var $name;
    var $email;
    var $phone;
    var $userID;
    #end properties
    #Construct function
    function __construct($id, $name, $email, $phone, $userID)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->userID = $userID;
    }
    #Member function
    static function connect()
    {
        $con = new mysqli("localhost", "root", "", "ContactManager", "3306");
        $con->set_charset("utf8");
        if ($con->connect_error) {
            die("ket noi that bai. chi tiet" . $con->connect_error);
        }
        return $con;
    }
    #Mock data
    /**
     * Lấy toàn bộ các liên hệ có trong CSDL theo user id
     */

    static function getListFromDB($userid)
    {

        //b1: Tao ket noi
        $con = new mysqli("localhost", "root", "", "contactmanager", "3306");
        $con->set_charset("utf8");
        if ($con->connect_error) {
            die("ket noi that bai. chi tiet" . $con->connect_error);
        }
        //b2: Thao tac voi csdl: Crud
        $sql = "SELECT * FROM `contact` where userid ='$userid'";
        $result = $con->query($sql);
        $lsContact = array();
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $contact = new Contact($row["contactid"], $row["name"], $row["email"], $row["phone"], $row["userid"]);
                array_push($lsContact, $contact);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsContact;
    }

    static function createContactDB($name, $email, $phone, $labelid, $userid)
    {
        //b1: Tao ket noi

        $con = Contact::connect();
        //b2: Thao tac voi csdl: Crud
        $sql = "INSERT INTO `contact` (`contactid`, `name`, `email`, `phone`, `userid`) VALUES (NULL, '$name', '$email', '$phone', '$userid')";
        $con->query($sql);
        $sql2 = "INSERT INTO label_contact (labelid,contactid)  SELECT '$labelid' , contactid FROM contact WHERE contact.name='$name'";
        $con->query($sql2);
        //b3: giai phong ket noi
        $con->close();
        //
    }

    static function removeContactDB($id)
    {
        //b1: Tao ket noi

        $con = Contact::connect();
        //b2: Thao tac voi csdl: Crud
        $sql1 = "DELETE FROM label_contact WHERE contactid ='$id'";
        $con->query($sql1);
        //
        $sql = "DELETE FROM `contact` WHERE `contact`.`contactid` = '$id'";
        $con->query($sql);

        //b3: giai phong ket noi
        $con->close();
        //
    }
    static function editContactDB($id, $name, $email, $phone)
    {
        //b1: Tao ket noi

        $con = Contact::connect();
        //b2: Thao tac voi csdl: Crud
        $sql = "UPDATE `contact` SET `name` = '$name', `email` = '$email',`phone` = '$phone' WHERE `contact`.`contactid` = '$id'";
        $con->query($sql);

        //b3: giai phong ket noi
        $con->close();
        //
    }
    static function searchContactDB($search = null, $userid)
    {
        //b1: Tao ket noi
        $con = Contact::connect();
        $lsContact = array();
        if ($search == null) {
            $lsContact = Contact::getListFromDB($userid);
            return $lsContact;
        }
        //b2: Thao tac voi csdl: Crud
        $sql = "select * from contact where userid='$userid' and concat(name,phone,email) like '%$search%'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $contact = new Contact($row["contactid"], $row["name"], $row["email"], $row["phone"], $row["userid"]);
                array_push($lsContact, $contact);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsContact;
    }
    static function paginationFromDB($start = 0, $mount = 3)
    {
        //b1: Tao ket noi
        $con = new mysqli("localhost", "root", "", "ContactManager", "3306");
        $con->set_charset("utf8");
        if ($con->connect_error) {
            die("ket noi that bai. chi tiet" . $con->connect_error);
        }
        //b2: Thao tac voi csdl: Crud
        $sql = "SELECT * FROM `contact` LIMIT $start, $mount";
        $result = $con->query($sql);
        $lsContact = array();
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $contact = new Contact($row["ID"], $row["Name"], $row["Email"], $row["Phone"], $row["UserID"]);
                array_push($lsContact, $contact);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsContact;
    }
}
