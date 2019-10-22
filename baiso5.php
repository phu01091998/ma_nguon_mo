<?php
session_start();
include_once("model/user.php");
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}

include_once("header.php") ?>
<?php include_once("nav.php") ?>
<?php
//Mã php của baiso5


echo "Bai so 5 ";



?>
<button type="button" onclick="testAjax();" class="btn-info"> Test Javascript</button>
<div id="contentAjax">

</div>
<button type="button" onclick="getListBook();" class="btn-info"> Get listBook</button>
<div id="contentBook">

</div>
<?php include_once("footer.php") ?>
<script>
    function testAjax() {
        // //alert("Xin chao");
        // var a="xin chao";
        // var contentElement= document.getElementById("contentAjax");
        // contentElement.innerHTML = "<h1>"+a+"</h1>";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               
                var user = JSON.parse(this.responseText);
                
                var str="<ul>";
                str +="<li>";
                str +="UserName: " + user.userName;
                str +="</li>";
                
                str +="<li>";
                str +="passWord: " +user.password;
                str +="</li>";

                str +="<li>";
                str +="FullName: " +user.fullName;
                str +="</li></ul>";
                document.getElementById("contentAjax").innerHTML= str;
            }
        };
        xhttp.open("GET","testAjax.php?userName=gau",true);
        xhttp.send();

    }
    function getListBook() {
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                
                document.getElementById("contentBook").innerHTML= this.responseText;
            }
        };
        xhttp.open("GET","getBookAjax.php",true);
        xhttp.send();

    }
</script>