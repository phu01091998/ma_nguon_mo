<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>

<?php
#Code bài số 4
include_once("modal/book.php");
$book = new Book(50, "OOP in PHP", "ndungithue", 2019);
$book->display();
$ls = Book::getList();


?>

<table>
    <tr class="bg-dark text-white">
        <th>STT</th>
        <th>Tilte</th>
        <th>Price</th>
        <th>Author</th>
        <th>Year</th>
    </tr>
    <?php 
            foreach($ls as $key=>$value ){
                echo "<tr>";
                echo "<td>".$key ."</td>";
                echo "<td>".$value->title ."</td>";
                echo "<td>".$value->price ."</td>";
                echo "<td>".$value->author ."</td>";
                echo "<td>".$value->year ."</td>";

                echo "</tr>";
                
               
            } 

         ?>
</table>









<?php include_once("footer.php") ?>