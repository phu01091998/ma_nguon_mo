<?php
class Book
{
    #Begin properties
    var $price;
    var $title;
    var $author;
    var $year;
    #end properties
    #Construct function
    function __construct($price, $title, $author, $year)
    {
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

    #Mock data:
    /** lấy toàn bộ sách trong data */
    static function getList(){
        $listBook = array();
        array_push($listBook,new Book(5, "OOP in PHP", "ndung", 2015));
        array_push($listBook,new Book(8, "OOP in C#", "ndungithue", 2019));
        array_push($listBook,new Book(10, "OOP in Python", "ndung", 2019));
        array_push($listBook,new Book(20, "OOP in Java", "ndungi", 2019));
        array_push($listBook,new Book(30, "OOP in C++", "ndung", 2019));
        array_push($listBook,new Book(40, "OOP in Ruby on Rails", "ndung", 2019));
        return $listBook;
    }
}