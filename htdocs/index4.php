<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>

<?php
#Code bài số 4
include_once("modal/book.php");
$book = new Book(50, "OOP in PHP", "ndungithue", 2019);
$book->display();
$ls = Book::getList();

var_dump($ls);
?>
<table>
    <tr>
        <th>STT</th>
        <th>Tilte</th>
        <th>Price</th>
        <th>Author</th>
        <th>Year</th>
    </tr>
    <tr>
        <?php 
            foreach($ls as $key =>$value ){
                <td>echo $key;</td>
                <td>echo $value->$price;</td>
            } 

         ?>
    </tr>
</table>









<?php include_once("footer.php") ?>