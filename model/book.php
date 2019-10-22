<?php
class Book
{
    #Begin properties
    var $id;
    var $price;
    var $title;
    var $author;
    var $year;
    #end properties
    #Construct function
    function __construct($id, $title, $price, $author, $year)
    {
        $this->id = $id;
        $this->price = $price;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }
    #Member function
    function display()
    {
        echo "Price: " . $this->price . "<br>";
        echo "Title: " . $this->title . "<br>";
        echo "Author: " . $this->author . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
    static function connect(){
        $con = new mysqli("localhost", "root", "", "Bookmanager", "3306");
        $con->set_charset("utf8");
        if ($con->connect_error) {
            die("ket noi that bai. chi tiet" . $con->connect_error);
        }
        return $con;
    }
    #Mock data
    /**
     * Lấy toàn bộ các cuốn sách có trong CSDL
     */
    static function getList()
    {
        $listBook = array();
        array_push($listBook, new Book(1, "OOP in PHP", 5, "ndung", 2015));
        array_push($listBook, new Book(2, "OOP in C#", 8, "nha", 2017));
        array_push($listBook, new Book(3, "OOP in Java", 10, "ntrung", 2018));
        array_push($listBook, new Book(4, "OOP in Python", 20, "nlan", 2019));
        array_push($listBook, new Book(5, "OOP in Ruby on Rails", 30, "thomas", 2019));
        //dfdfdf
        return $listBook;
    }
    #Database
    /**
     * Lấy toàn bộ các cuốn sách có trong CSDL
     */
    static function getListFromDB()
    {
        //b1: Tao ket noi
        $con = new mysqli("localhost", "root", "", "Bookmanager", "3306");
        $con->set_charset("utf8");
        if ($con->connect_error) {
            die("ket noi that bai. chi tiet" . $con->connect_error);
        }
        //b2: Thao tac voi csdl: Crud
        $sql = "SELECT * FROM `book`";
        $result = $con->query($sql);
        $lsBook = array();
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $book = new Book($row["ID"], $row["Title"], $row["Price"], $row["Author"], $row["Year"]);
                array_push($lsBook, $book);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsBook;
    }
    /**
     * Lấy dữ liệu từ file
     */
    static function getListFromFile()
    {
        $arrData = file("data/book.txt", FILE_SKIP_EMPTY_LINES);
        $lsBook = array();
        foreach ($arrData as $key => $value) {
            $arrItem = explode("#", $value);
            if (count($arrItem) == 5) {
                $book = new Book($arrItem[0], $arrItem[1], $arrItem[2], $arrItem[3], $arrItem[4]);
                array_push($lsBook, $book);
            }
        };
        return $lsBook;
    }
    static function getListSearch($search = null)
    {
        $data = file("data/book.txt", FILE_SKIP_EMPTY_LINES);
        $arrBook = [];
        foreach ($data as $key => $value) {
            $row = explode("#", $value);
            if (
                strlen(strstr($row[0], $search)) || strlen(strstr($row[3], $search)) ||
                strlen(strstr($row[1], $search)) || strlen(strstr($row[4], $search)) ||
                strlen(strstr($row[2], $search)) || $search == null
            )
                $arrBook[] = new Book($row[0], $row[1], $row[2], $row[3], $row[4]);
        }
        return $arrBook;
    }
    static function addToFile($id, $price, $title, $author, $year)
    {
        $data = file("data/book.txt");
        $check = true;
        foreach ($data as $key => $value) {
            if ($value[0] == $id) {
                $check = false;
            }
        }
        if ($check) {
            $myfile = fopen("data/book.txt", "a+") or die("Unable to open file!");
            $row = $id . "#" . $title . "#" . $price . "#" . $author . "#" . $year;
            fwrite($myfile, "\n" . $row);
            fclose($myfile);
        }
    }
    static function removeByID($id)
    {
        $data = file("data/book.txt");
        $myfile = fopen("data/book.txt", "w");
        $arrBook = array();
        // lưu vào mảng
        foreach ($data as $key => $value) {
            $row = explode("#", $value);
            $content = null;
            if ($row[0] != $id) {
                $content = $row[0] . "#" . $row[1] . "#" . $row[2] . "#" . $row[3] . "#" . $row[4];
                array_push($arrBook, $content);
            }
        }
        $numItems = count($arrBook);
        $i = 0;
        //ghi vào file
        foreach ($arrBook as $key => $value) {
            $s = $value;
            $i++;
            if ($i === $numItems) {
                $s = trim($value);
            }
            fwrite($myfile, $s);
        }
        fclose($myfile);
    }
    static function editBook($id, $price, $title, $author, $year)
    {
        Book::removeByID($id);
        Book::addToFile($id, $price, $title, $author, $year);
    }
    static function addBookToDB($price, $title, $author, $year)
    {
         //b1: Tao ket noi
         
         $con = Book::connect();
         //b2: Thao tac voi csdl: Crud
         $sql = "INSERT INTO `book` (`ID`, `Title`, `Price`, `Author`, `Year`) VALUES (NULL, '$title', '$price', '$author', '$year')";
         $con->query($sql);
         
         //b3: giai phong ket noi
         $con->close();
        //
    }
    static function removeBookDB($id)
    {
         //b1: Tao ket noi
         
         $con = Book::connect();
         //b2: Thao tac voi csdl: Crud
         $sql = "DELETE FROM `book` WHERE `book`.`ID` = $id";
         $con->query($sql);
         
         //b3: giai phong ket noi
         $con->close();
        //
    }
    static function editBookDB($id, $price, $title, $author, $year)
    {
         //b1: Tao ket noi
         
         $con = Book::connect();
         //b2: Thao tac voi csdl: Crud
         $sql = "UPDATE `book` SET `Title` = '$title', `Price` = '$price',`Author` = '$author',`Year` = '$year' WHERE `book`.`ID` = $id";
         $con->query($sql);
         
         //b3: giai phong ket noi
         $con->close();
        //
    }
}
