

<?php 
 session_start();

 ?>

 <html>
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>


<div class = "container">
	<div class = "col-6" style="margin-top: 100px;">
	</div>
	<br>
	<button class="btn btn-secondary" style = "margin-top: 50px; margin-bottom: 50px;"onclick="history.go(-1);">Back to welcome page </button>
	<br>

 <?php

 		$riskFactor = 0;
 		$risky = "";

 		$date = $_POST['datedisease'];


 		if(!empty($_POST['less'])){
 			$less = $_POST["less"];
 			$riskFactor = $riskFactor + 1;
 		}
 		else{
 			$less = "no less common symptoms";
 		}

 		if(!empty($_POST['most'])){
			$most = $_POST["most"];
			$riskFactor = $riskFactor + 2;

 		}
 		else{
 			$most = "no most common symptoms";

 		}

		if(!empty($_POST['serious'])){			
			$serious = $_POST["serious"];
			$riskFactor = $riskFactor + 3;
		}
		else{
			$serious = "no serious symptoms";

		}

		if($riskFactor >= 4){

		$risky = "You show serious Corona symptoms, go to a hospital.";
		}
		else if($riskFactor == 3){

		$risky = "You aren’t showing common Corona symptoms, stay isolated";

		}
		else
		{
		$risky = "You are healthy";
		}


		$username = $_SESSION["user"];

		$includes = False;

		$array = explode("\n", file_get_contents('simplesurvey'));
		foreach ($array as $row) {

			$individiual = explode(" - ", $row);
		  #$individiual[0] keeps the username
			if($individiual[0] == $username){
				if($individiual[1] == $date){
					$includes = True;
					break;
				}
			}
		}

		if($includes){
			echo "noway";
		}
		else{
 		echo $date. " saved succesfully";

	    $fp = fopen('simplesurvey', 'a');//opens file in append mode
	    fwrite($fp, PHP_EOL);
	    fwrite($fp, $username);
	    fwrite($fp, ' - ');
	    fwrite($fp, $date);
	    fwrite($fp, ' - ');
	    fwrite($fp, $risky);
	    fwrite($fp, ' - ');
	    fwrite($fp, $serious);
	    fwrite($fp, ' - ');
	    fwrite($fp, $less);
	    fwrite($fp, ' - ');
	    fwrite($fp, $most);
	    fwrite($fp, ' - ');
	    fclose($fp);
		}

?>


</div>


</body>
</html>
