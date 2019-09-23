
	<?php include_once("header.php")?>
    <?php include_once("nav.php")?>
	<?php
		define('PI','3.14');
		/*
		* @param: $bankinh 
		* return S :dien tich
		*/

		//function
		function squareOfCircle($bankinh){
			$s= M_PI*pow($bankinh,2);
			return $s;
		}
		function sum($n){
			$s=0;
			for($i=0 ; $i<$n; $i++){
				$s +=$n;
			}
			return $s;
		}
		function displayToday()
		{
			$dayOfWeek=[
				"sunday","monday","tuesday","wendesday","thursday","friday","saturday"
			];
			$day= date("w");
			return $dayOfWeek[$day];
			
		}

		echo"<h1>xin chao mn</h1>";
		$a =5;
		$b =5.5;
		$c =$a+$b;
		echo "5 +5.5 =".$c;


		echo "<br>dien tich hinh tron ban kinh $a la ";
		echo squareOfCircle($a);
		echo "<br>tổng của $a số đầu tiên là ";
		echo sum($a) ."<br>";
	    echo displayToday();

	



	?>

    <?php include_once("footer.php")?>