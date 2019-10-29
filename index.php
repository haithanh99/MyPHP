<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Register Database</title>
  </head>
<body>

<h1>Product Page</h1>

<?php
	echo "Showing all rows from Postgres Database";
	
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
	//your sql query
	$sql = "SELECT * FROM registercourse";
	$stmt = $pdo->prepare($sql);
	//execute the query on the server and return the result set
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$resultSet = $stmt->fetchAll();
	//display the data 
?>
<ul>
	<?php
		foreach ($resultSet as $row) {
			echo "<li>" .
				$row["name"] . '--'. $row["dob"] . '--'. $row["gender"] . '--' . $row["number"]
			. "</li>";
		}
	?>
</ul>

</body>
</html>