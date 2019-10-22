<?php
class User
{
    var $userName;
    var $password;
    var $fullName;

    function User($userName, $password, $fullName)
    {
        $this->userName = $userName;
        $this->password = $password;
        $this->fullName = $fullName;
    }
    // xác thực người dùng
    static function authentication($userName, $password)
    {
        if ($userName == 'nguyendung@gmail.com' && $password == "123") {
            return new User($userName, $password, "Nguyễn Dũng");
        }
        return null;
    }
}
?>