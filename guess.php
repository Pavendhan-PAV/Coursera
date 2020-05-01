<!DOCTYPE html>
<html>
<head>
	<title>PAVENDHAN N</title>
</head>
<body>
	 <h1>Welcome to my guessing game</h1>
	 <p>
	<?php 
		$correctnumber=18;
		$x= $_GET['guess'];
		if(!isset($x))
			echo "Missing guess parameter";
		else{
			if ($x==NULL)
				echo "Your guess is too short";
		if(is_numeric($x)===false)
			echo "Your guess is not a number";
		else{

			if ($x<$correctnumber)
				echo "Your guess is too low";
			elseif ($x>$correctnumber) 
				echo "Your guess is too high";
			else 
				echo "Congratulations - You are right";
	  }}
	  ?></p>
</body>
</html>