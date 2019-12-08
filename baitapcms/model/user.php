<?php
class User
{
    var $userName;
    var $password;


    static function connect(){
        $con = new mysqli("localhost", "root", "", "cms", "3306");
        $con->set_charset("utf8");
        if ($con->connect_error) {
            die("ket noi that bai. chi tiet" . $con->connect_error);
        }
        return $con;
    }
    function User($userName, $password)
    {
        $this->userName = $userName;
        $this->password = $password;
        
    }
    // xác thực người dùng
    static function authentication($userName, $password)
    {
        if ($userName == 'nguyendung@gmail.com' && $password == "123") {
            return new User($userName, $password, "Nguyễn Dũng");
        }
        return null;
    }
    static function authentication2($userName, $password)
    {  //b1: Tao ket noi
        $con = User::connect();
        $sql = "select * from user where username ='$userName' and password='$password'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = new User($row["userid"], $row["username"], $row["password"]);
            $con->close();
            return $user;
        }
        $con->close();
        return null;
        
    }
}
?>