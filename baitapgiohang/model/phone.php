<?php
//type class
class Type
{
    #Begin properties
    var $typeid;
    var $typename;
    #end properties
    #Construct function
    function __construct($typeid, $typename)
    {
        $this->typeid = $typeid;
        $this->typename = $typename;
        
    }
    #Member function
    /**
     * Lấy toàn bộ các điện thoại
     */

    static function getListType()
    {

        //b1: Tao ket noi
        $con = new mysqli("localhost", "root", "", "phonemanager", "3306");
        $con->set_charset("utf8");
        if ($con->connect_error) {
            die("ket noi that bai. chi tiet" . $con->connect_error);
        }
        //b2: Thao tac voi csdl: Crud
        $sql = "SELECT * FROM `type`";
        $result = $con->query($sql);
        $lsType = array();
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $type = new Type($row["typeid"], $row["typename"]);
                array_push($lsType, $type);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsType;
    }
   
}




// phone class
class Phone
{
    #Begin properties
    var $phoneid;
    var $phonename;
    var $image;
    var $price;
    var $description;
    var $typeid;
    #end properties
    #Construct function
    function __construct($phoneid, $phonename, $image, $price, $description,$typeid)
    {
        $this->phoneid = $phoneid;
        $this->phonename = $phonename;
        $this->image = $image;
        $this->price = $price;
        $this->description = $description;
        $this->typeid = $typeid;
    }
    #Member function
    static function connect()
    {
        $con = new mysqli("localhost", "root", "", "phonemanager", "3306");
        $con->set_charset("utf8");
        if ($con->connect_error) {
            die("ket noi that bai. chi tiet" . $con->connect_error);
        }
        return $con;
    }
     #Mock data
    /**
     * Lấy toàn bộ các điện thoại
     */

    static function getListPhone()
    {

        //b1: Tao ket noi
        $con = new mysqli("localhost", "root", "", "phonemanager", "3306");
        $con->set_charset("utf8");
        if ($con->connect_error) {
            die("ket noi that bai. chi tiet" . $con->connect_error);
        }
        //b2: Thao tac voi csdl: Crud
        $sql = "SELECT * FROM `phone`";
        $result = $con->query($sql);
        $lsPhone = array();
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $phone = new Phone($row["phoneid"], $row["phonename"], $row["image"], $row["price"], $row["description"], $row["typeid"]);
                array_push($lsPhone, $phone);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsPhone;
    }
    #Mock data
    /**
     * Lấy toàn bộ các điện thoại theo loại
     */

    static function getListPhoneByType($typeid)
    {

        //b1: Tao ket noi
        $con = new mysqli("localhost", "root", "", "phonemanager", "3306");
        $con->set_charset("utf8");
        if ($con->connect_error) {
            die("ket noi that bai. chi tiet" . $con->connect_error);
        }
        //b2: Thao tac voi csdl: Crud
        $sql = "SELECT * FROM `phone` where typeid ='$typeid'";
        $result = $con->query($sql);
        $lsPhone = array();
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $phone = new Phone($row["phoneid"], $row["phonename"], $row["image"], $row["price"], $row["description"], $row["typeid"]);
                array_push($lsPhone, $phone);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsPhone;
    }

    // search
    static function searchPhone($search = null)
    {
        //b1: Tao ket noi
        $con = Phone::connect();
        $lsPhone = array();
        if ($search == null) {
            $lsPhone = Phone::getListPhone();
            return $lsPhone;
        }
        //b2: Thao tac voi csdl: Crud
        $sql = "SELECT * FROM `phone` where phonename like '%$search%'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $phone = new Phone($row["phoneid"], $row["phonename"], $row["image"], $row["price"], $row["description"], $row["typeid"]);
                array_push($lsPhone, $phone);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsPhone;
    }

    // search phone by id
    static function searchPhoneByID($phoneID = null)
    {
        //b1: Tao ket noi
        $con = Phone::connect();
        //$lsPhone = array();
        // if ($search == null) {
        //     $lsPhone = Phone::getListPhone();
        //     return $lsPhone;
        // }
        //b2: Thao tac voi csdl: Crud
        $sql = "SELECT * FROM `phone` where phoneid = '$phoneID'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {

           // while ($row = $result->fetch_assoc()) {
                $row = $result->fetch_assoc();
                $phone = new Phone($row["phoneid"], $row["phonename"], $row["image"], $row["price"], $row["description"], $row["typeid"]);
               // array_push($lsPhone, $phone);
            //}
        }
        //b3: giai phong ket noi
        $con->close();
        return $phone;
    }
    
}

///





?>