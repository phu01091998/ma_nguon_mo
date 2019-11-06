<?php

class Contact
{
    #Begin properties
    var $id;
    var $name;
    var $phone;
    var $userID;
    #end properties
    #Construct function
    function __construct($id, $name, $phone, $userID)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->userID = $userID;
    }
    #Member function
    static function connect(){
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
                $contact = new Contact($row["contactid"], $row["name"], $row["phone"], $row["userid"]);
                array_push($lsContact, $contact);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsContact;
    }
   
    static function removeContactDB($id)
    {
         //b1: Tao ket noi
         
         $con = Contact::connect();
         //b2: Thao tac voi csdl: Crud
         $sql = "DELETE FROM `contact` WHERE `contact`.`ID` = $id";
         $con->query($sql);
         
         //b3: giai phong ket noi
         $con->close();
        //
    }
    static function editContactDB($id, $name, $phone)
    {
         //b1: Tao ket noi
         
         $con = Contact::connect();
         //b2: Thao tac voi csdl: Crud
         $sql = "UPDATE `contact` SET `Name` = '$name', `Phone` = '$phone' WHERE `contact`.`ID` = $id";
         $con->query($sql);
         
         //b3: giai phong ket noi
         $con->close();
        //
    }
    static function searchContactDB($search=null,$userid)
    {
         //b1: Tao ket noi
         $con = Contact::connect();
         $lsContact = array();
         if($search==null){
             $lsContact =Contact::getListFromDB($userid);
             return $lsContact;
         }
         //b2: Thao tac voi csdl: Crud
         $sql = "select * from contact where userid='$userid' name like '%$search%'";
         $result = $con->query($sql);    
         if ($result->num_rows > 0) {
 
             while ($row = $result->fetch_assoc()) {
                 $contact = new Contact($row["ID"], $row["Name"], $row["Phone"], $row["UserID"]);
                 array_push($lsContact, $contact);
             }
         }
         //b3: giai phong ket noi
         $con->close();
         return $lsContact;
    }
    static function paginationFromDB($start = 0 , $mount=3)
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
                $contact = new Contact($row["ID"], $row["Name"], $row["Phone"], $row["UserID"]);
                array_push($lsContact, $contact);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsContact;
    }
}
