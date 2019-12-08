
<?php
class News
{
    var $newsid;
    var $title;
    var $content;
    var $author;
    var $datepost;
    var $dateupdate;
    var $image;
    var $video;
    var $catogryid;

    function __construct($newsid, $title, $content, $author, $datepost, $dateupdate, $image, $video, $catogryid)
    {
        $this->newsid = $newsid;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->datepost = $datepost;
        $this->dateupdate = $dateupdate;
        $this->image = $image;
        $this->video = $video;
        $this->catogryid = $catogryid;
    }
    #Member function
    static function connect()
    {
        $con = new mysqli("localhost", "root", "", "cms", "3306");
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

    static function getListNews()
    {

        //b1: Tao ket noi
        $con = News::connect();
        $sql = "SELECT * FROM `news`";
        $result = $con->query($sql);
        $lsNews = array();
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $news = new News($row["newsid"], $row["title"], $row["content"], $row["author"], $row["datepost"], $row["dateupdate"], $row["image"], $row["video"], $row["catogryid"]);
                array_push($lsNews, $news);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsNews;
    }
    static function createNews($title, $content, $author, $datepost, $dateupdate, $image, $video, $catogryid)
    {
        $con = News::connect();
        $sql = "INSERT INTO `news` (`newsid`, `title`, `content`,`author`, `datepost`,`dateupdate`, `image`, `video`, `catogryid`)
                 VALUES (NULL, '$title', '$content','$author','$datepost','$dateupdate','$image','$video','$catogryid')";
        $con->query($sql);

        //b3: giai phong ket noi
        $con->close();
        //
    }
    static function removeNews($NewsID)
    {
        //b1: Tao ket noi

        $con = News::connect();
        //b2: Thao tac voi csdl: Crud

        $sql = "DELETE FROM news WHERE newsid ='$NewsID'";
        $con->query($sql);

        //b3: giai phong ket noi
        $con->close();
        //
    }
    static function editNews($id, $title, $content, $author, $datepost, $dateupdate, $image, $video, $catogryid)
    {
        //b1: Tao ket noi

        $con = News::connect();
        //b2: Thao tac voi csdl: Crud
        $sql = "UPDATE `news` SET `title` = '$title',`content` = '$content',`author` = '$author',
        `datepost` = '$datepost',`dateupdate` = '$dateupdate',`image` = '$image',`video` = '$video',`catogryid` = '$catogryid'
         WHERE `news`.`news.id` = '$id'";
        $con->query($sql);

        //b3: giai phong ket noi
        $con->close();
        //
    }

}

class Catogry
{
    var $catogryId;
    var $name;
    function __construct($catogryId, $name)
    {
        $this->catogryId = $catogryId;
        $this->name = $name;
    }
    static function addCatogry($catogryName)
    {
        //b1: Tao ket noi

        $con = News::connect();
        //b2: Thao tac voi csdl: Crud
        $sql = "INSERT INTO `catogry` (`id`,`name`) VALUES (NULL,'$catogryName')";
        $con->query($sql);

        //b3: giai phong ket noi
        $con->close();
        //
    }
    static function editCatogry($catogryID, $catogryName)
    {
        //b1: Tao ket noi

        $con = News::connect();
        //b2: Thao tac voi csdl: Crud
        $sql = "UPDATE `catogry` set `catogryname` = '$catogryName' where `catogryid` = '$catogryID',";
        $con->query($sql);

        //b3: giai phong ket noi
        $con->close();
        //
    }
    static function getListCatogry()
    {

        //b1: Tao ket noi
        $con = News::connect();
        $sql = "SELECT * FROM `catogry`";
        $result = $con->query($sql);
        $lsCatogry = array();
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $catogry = new Catogry($row["catogryid"], $row["catogryname"]);
                array_push($lsCatogry, $catogry);
            }
        }
        //b3: giai phong ket noi
        $con->close();
        return $lsCatogry;
    }
    static function deleteCatogry($catogryID)
    {
        //b1: Tao ket noi

        $con = News::connect();
        //b2: Thao tac voi csdl: Crud
        $sql = "DELETE FROM cattogry WHERE catogryid ='$catogryID'";
        $con->query($sql);

        //b3: giai phong ket noi
        $con->close();
        //
    }
}


?>