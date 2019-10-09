<!DOCTYPE html>
<html>
<head>
	<title>Processing</title>
</head>
<body>
	<?php 
		$name = $_POST["txtName"];
		$price = $_POST["txtPrice"];	
		echo $name;
		
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
		    'name' => $name,
		    'price' => $price,
		$stmt =  $pdo->prepare("INSERT INTO products(name, price) VALUES (:name,:price)");	
		$stmt->execute($data);
	 ?>
	 <h2>Thank you <?php echo $name?>  for registering 
	 		<?php echo $price?>
	 </h2>
	 <ul>
	 	<li><?php echo $name?></li>
	 	<li><?php echo $price?></li>

	 </ul>
	 <a href="indexproduct.php">Index</a>
</body>
</html>