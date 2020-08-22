
<?php 
 session_start();

 ?>
 <html>
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>


<div class = "container">

	<div class= "col-12">

	<button class="btn btn-secondary" style = "margin-top: 50px; margin-bottom: 50px;"onclick="history.go(-1);">Back to welcome page </button>

		      <?php 
   		      $date = $_POST["dateprevious"];
   		      echo "<h3>".$date."</h3>";
   		      $username = $_SESSION["user"];

				$array = explode("\n", file_get_contents('simplesurvey'));
				foreach ($array as $row) {
					
					$individiual = explode(" - ", $row);
				  #$individiual[0] keeps the username
					if($individiual[0] == $username){
						if($individiual[1] == $date){

							$lines = explode(" - ", $row);
							foreach ($lines as $mem){
								if($mem != $username && $mem != $date ){
									echo "<h4>". $mem . "</h4>";
								}
							}
				}
			}
		}
		      ?>

	</div>

	<br>

</div>
</body>
</html>
