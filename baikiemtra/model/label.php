
<?php
class Label
{
    var $id;
    var $name;
    var $userid;

    function __construct($id, $name, $userid)
    {
        $this->id = $id;
        $this->name = $name;
        $this->userid = $userid;
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

    static function getListLabelFromDB($userid)
    {

        //b1: Tao ket noi
        $con = new mysqli("localhost", "root", "", "contactmanager", "3306");
        $con->set_charset("utf8");
        if ($con->connect_error) {
            die("ket noi that bai. chi tiet" . $con->connect_error);
        }
        //b2: Thao tac voi csdl: Crud
        $sql = "SELECT * FROM `label` where userid ='$userid'";
        $result = $con->query($sql);
        $lsContact = array();
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $contact = new Label($row["labelid"], $row["name"], $row["userid"]);
                array_push($lsContact, $contact);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsContact;
    }
    static function createLabel($name, $userid)
    {
        $con = Label::connect();
        $sql = "INSERT INTO `label` (`labelid`, `name`, `userid`) VALUES (NULL, '$name', '$userid')";
        $con->query($sql);

        //b3: giai phong ket noi
        $con->close();
        //
    }
    static function getContactLabel($labelid = null, $userid)
    {


        $con = Contact::connect();
        $lsContact = array();
        if ($labelid == null) {
            $lsContact = Contact::getListFromDB($userid);
            return $lsContact;
        }
        //b2: Thao tac voi csdl: Crud
        $sql = "SELECT contact.contactid, contact.name, email, phone, contact.userid FROM contact JOIN label_contact on contact.contactid= label_contact.contactid JOIN label on label.labelid = label_contact.labelid WHERE label.labelid='$labelid'";
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
    static function removeLabelDB($id)
    {
        //b1: Tao ket noi

        $con = Label::connect();
        //b2: Thao tac voi csdl: Crud

        $sql = "DELETE FROM label_contact WHERE labelid ='$id'";
        $con->query($sql);
        $sql = "DELETE FROM `label` WHERE `label`.`labelid` = '$id'";
        $con->query($sql);

        //b3: giai phong ket noi
        $con->close();
        //
    }
    static function editLabelDB($id, $name)
    {
        //b1: Tao ket noi

        $con = Label::connect();
        //b2: Thao tac voi csdl: Crud
        $sql = "UPDATE `label` SET `name` = '$name' WHERE `label`.`labelid` = '$id'";
        $con->query($sql);

        //b3: giai phong ket noi
        $con->close();
        //
    }
}




?>