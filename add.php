<html>
<head>
	<title>Add Data</title>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<div class="container">
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$productname = $_POST['productname'];
	$price = $_POST['price'];
	$stocks = $_POST['stocks'];
	$category = $_POST['category'];
	$supplier = $_POST['supplier'];
		
	// checking empty fields
	if(empty($productname) || empty($price) || empty($stocks) || empty($category) || empty($supplier)) {
				
		if(empty($productname)) {
			echo "<h4 class=\"text-danger\">Product Name field is empty.</h4><br/>";
		}
		
		if(empty($price)) {
			echo "<h4 class=\"text-danger\">Price field is empty.</h4><br/>";
		}
		
		if(empty($stocks)) {
			echo "<h4 class=\"text-danger\">Email field is empty.</h4><br/>";
		}

		if(empty($category)) {
			echo "<h4 class=\"text-danger\">Email field is empty.</h4><br/>";
		}

		if(empty($supplier)) {
			echo "<h4 class=\"text-danger\">Email field is empty.</h4><br/>";
		}
		
		//link to the previous page
		echo "<br/><a class=\"btn btn-primary\" href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO tbl_products(productname, price, stocks, category, supplier) VALUES(:productname, :price, :stocks, :category, :supplier )";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':productname', $productname);
		$query->bindparam(':price', $price);
		$query->bindparam(':stocks', $stocks);
		$query->bindparam(':category', $category);
		$query->bindparam(':supplier', $supplier);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<h2 class=\"text-success\">Data added successfully.</h2>";
		echo "<br/><h2 class=\"text-success\"><a href='index.php'>View Result</a></h2>";
	}
}
?>
</div>
</body>
</html>
