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
    static function getListSearch($search=null)
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
    static function editBook($id, $price, $title, $author, $year){
        Book::removeByID($id);
        Book::addToFile($id, $price, $title, $author, $year);
    }
}
