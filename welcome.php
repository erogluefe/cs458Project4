
<?php 
 session_start();

 ?>
 <html>
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>


<div class = "container">

	<div class= "col-6">

	<form action="showresults.php" method="post">
		  <div class="form-group" style="margin-top: 50px;">
		    <label for="exampleFormControlSelect1">Select past data</label>
		    <select class="form-control" name ="dateprevious" id="exampleFormControlSelect1">
		      <?php 
   		      $username = $_POST["name"];

				$array = explode("\n", file_get_contents('simplesurvey'));
				foreach ($array as $row) {

					$individiual = explode(" ", $row);

				  #$individiual[0] keeps the username
					if($individiual[0] == $username){
						$daily = $individiual[2];

						echo "<option>" . $daily ."</option>";					}
				}
		      ?>
		    </select>
		  </div>
		<button type="submit" class="btn btn-secondary" style="margin-bottom: 50px;">Show past data!</button>
	</form>
	<h3> Covid Survey</h3>

	<div class='alert alert-warning' role='alert'> If you are feeling healthy today, send today's form empty.</div>
	<br>
	<form action = "sendSurvey.php" method="post">
		 <div class="form-group" style="margin-top: 50px;">
		    <label for="exampleFormControlSelect1">Select Date</label>
		    <select class="form-control" name ="datedisease" id="exampleFormControlSelect1">
		      <option>Day1</option>
		      <option>Day2</option>
		      <option>Day3</option>
		      <option>Day4</option>
		      <option>Day5</option>
		      <option>Day6</option>
		      <option>Day7</option>
		      <option>Day8</option>
		      <option>Day9</option>
		      <option>Day10</option>
		      <option>Day11</option>
		      <option>Day12</option>
		      <option>Day13</option>
		      <option>Day14</option>
		      <option>Day15</option>
		    </select>
		  </div>

          <div class="form-group">
		    <label for="exampleFormControlSelect2">Less Common Symptoms</label>
		    <select multiple class="form-control" name="less" id="less">
		      <option>Fever</option>
		      <option>Dry Cough</option>
		      <option>Tiredness</option>
		    </select>
		  </div>
		 <div class="form-group">
		    <label for="exampleFormControlSelect2">Most Common Symptoms</label>
		    <select multiple class="form-control" name="most" id="most">
		      <option>Headache</option>
		      <option>Sore Throat</option>
		      <option>Loss of taste or smell</option>
		      <option>Conjunctivitis</option>
		    </select>
		  </div>
		 <div class="form-group">
		    <label for="exampleFormControlSelect2">Serious Symptoms</label>
		    <select multiple class="form-control" name= "serious" id="serious">
		      <option>Difficulty breathing or shortness of breath</option>
		      <option>Chest pain or pressure</option>
		    </select>
		 </div>
		<button type="submit" class="btn btn-secondary">Send Health Info</button>
	</form>
	</div>



	<div class = "col-6" style="margin-top: 100px;">
	<form action="login.html">
	<button type="submit" class="btn btn-secondary">Back to login page!</button>
	</form>
	</div>
	<br>

 <?php
#take the username coming with post method to that page
$username = $_POST["name"];
#take the password coming with post method to that page
$password = $_POST["password"];

#flags to determine whether password or username is invalid
$usernameFlag = False;
$passwordFlag = False;

#simple database to verify login attempts
$array = explode("\n", file_get_contents('simpledatabase'));
foreach ($array as $member) {

	$individiual = explode(" ", $member);

  #$individiual[0] keeps the username
	if($individiual[0] == $username){
		$usernameFlag = True;

    #$individiual[2] keeps the password
		if($individiual[1] == $password){
			$passwordFlag = True;
			break;
		}
	}
}

#print invalid username
if(!$usernameFlag){
			echo "
			<div class = 'col-6'>
			<div class='alert alert-danger' role='alert'> wrong username</div>
			</div>
			";
	}
	else{
    #print invalid password
		if(!$passwordFlag){
			echo "
			<div class = 'col-6'>
			<div class='alert alert-danger' role='alert'> wrong password</div>
			</div>
			";

		} #print both of them are valid
    else{
    	// Set session variables
		$_SESSION["user"] = $username;
		echo "
			<div class = 'col-6'>
			<div class='alert alert-warning' role='alert'> You are in mid risk group according to your past data.</div>
			</div>

			
			";
		}

	}

?>

<form action = "save.php" type ="post">
	

</form>




</div>


</body>
</html>
