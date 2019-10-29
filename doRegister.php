<!DOCTYPE html>
<html>
<head>
	<title>Processing</title>
</head>
<body>
	<?php 
		$name = $_POST["txtName"];
		$birthday = $_POST["dob"];
		$gender = $_POST["gender"];
		$phone = $_POST["txtPhone"]

		echo $name;
		echo $phone;
		
		//Refere to database 
	   $db = parse_url(getenv("DATABASE_URL"));
	   $pdo = new PDO("pgsql:" . sprintf(
	        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
	        $db["host"],
	        $db["port"],
	        $db["user"],
	        $db["pass"],
	        ltrim($db["path"], "/")
	   ));
	   $data = [
		    'name' => $name
		    'dob' => $birthday,
		    'gender' => $gender,
		    'phone' => $phone
		];
		$stmt =  $pdo->prepare("INSERT INTO registercourse(name,dob,gender,phone) VALUES (:name,:dob,:gender,:phone)");	
		$stmt->execute($data);
	 ?>
	 <h2>Thank you <?php echo $name?>  for registering 
	 		
	 </h2>
	 <ul>
	 	<li><?php echo $birthday?></li>
	 	<li><?php echo $gender?></li>
	 	<li><?php echo $phone?></li>
	 	
	 </ul>
	 <a href="index.php">Index</a>
</body>
</html>