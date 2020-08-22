

 <html>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>


<div class = "container">

 <?php
#take the username coming with post method to that page
$username = $_POST["username"];
#take the password coming with post method to that page
$password = $_POST["password"];

$gender = $_POST["gender"];

$job = $_POST["job"];

$city = $_POST["city"];

$age = $_POST["age"];


echo "<div class ='col-12' style = 'margin-top:20px; margin-bottom:50px;'>";
echo($username);
echo "<br>";
echo($password);
echo "<br>";
echo($gender);
echo "<br>";
echo($job);
echo "<br>";
echo($city);
echo "<br>";
echo($age);
echo "</div>";
#flags to determine whether password or username is invalid
$usernameFlag = False;

#simple database to verify login attempts
$array = explode("\n", file_get_contents('simpledatabase'));
foreach ($array as $member) {

	$individiual = explode(" ", $member);

  #$individiual[0] keeps the username
	if($individiual[0] == $username){
		$usernameFlag = True;

    #$individiual[2] keeps the password
		if($individiual[2] == $password){
			$passwordFlag = True;
			break;
		}
	}
}

#print invalid username
if(! $usernameFlag){

    $fp = fopen('simpledatabase', 'a');//opens file in append mode
    fwrite($fp, PHP_EOL);
    fwrite($fp, $username);
    fwrite($fp, ' ');
    fwrite($fp, $password);
    fwrite($fp, ' ');
    fwrite($fp, $gender);
    fwrite($fp, ' ');
    fwrite($fp, $job);
    fwrite($fp, ' ');
    fwrite($fp, $city);
    fwrite($fp, ' ');
    fwrite($fp, $age);
    fwrite($fp, ' ');
    fclose($fp);

    echo "
    <div class = 'col-12'>
    <div class='alert alert-success' role='alert'> user created succesfully</div>
    </div>
    ";

    echo"
    <div class= 'col-12'>
    <form action='loginpage.html'>
    <button type='submit' class='btn btn-secondary'>Go to login page!</button>
    </form>
    </div>
    <br>";

  	}
	else{
			echo "
			<div class = 'col-12'>
			<div class='alert alert-danger' role='alert'> username exists</div>
			</div>
			";

      echo"
      <div class= 'col-12'>
      <form action='index.html'>
      <button type='submit' class='btn btn-secondary'>Try Another account!</button>
      </form>
      </div>
      <br>";

	}

?>
</div>


</body>
</html>
