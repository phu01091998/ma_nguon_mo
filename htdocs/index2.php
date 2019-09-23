

    <?php include_once("header.php")?>
    <?php include_once("nav.php")?>

    <form>
        <fieldset>
            <legend>Tính toán cơ bản</legend>
            <input type="text" name="num1" placeholder="số thứ nhât" value="<?php echo $_GET["num1"] ??""  ?>">
            <input type="text" name="num2" placeholder="số thứ hai" value="<?php echo $_GET["num2"] ??"" ?>">
            <select name="operator">
                <option value="none">vui lòng chọn phép tính</option>
                <option <?php echo $_GET["operator"]=="add"?"selected":"" ?> value="add">Cộng</option>
                <option <?php echo $_GET["operator"]=="subtract"?"selected":"" ?> value="subtract">Trừ</option>
                <option <?php echo $_GET["operator"]=="multiply"?"selected":"" ?> value="multiply">Nhân</option>
                <option <?php echo $_GET["operator"]=="divide"?"selected":"" ?> value="divide">Chia</option>
            </select>  
            <button name="btnCalculate" type="submit" value="click">Tính toán</button>
            <?php
                if(isset($_GET["btnCalculate"])){
                    $num1 = $_GET["num1"];
                    $num2 = $_GET["num2"];
                    $operator = $_GET["operator"];
                    switch($operator){
                        case 'add': $result = $num1+ $num2; $sign="+";
                        break;
                        case 'subtract': $result = $num1- $num2; $sign="-";
                        break;
                        case 'multiply': $result = $num1* $num2; $sign="*";
                        break;
                        case 'divide': $result = $num1/ $num2; $sign="/";
                        break;
                        default: $result = "vui long chọn phép tính";
                        $sign="0";
                    }



                    
                    echo "<h2>ket qua $num1 $sign $num2 = $result</h2>";
                }

            ?>
        </fieldset>
    </form>
    
  
    <?php include_once("footer.php")?>