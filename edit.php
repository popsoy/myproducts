<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$productname=$_POST['productname'];
	$price=$_POST['price'];
	$stocks=$_POST['stocks'];
	$category=$_POST['category'];
	$supplier=$_POST['supplier'];	
	
	// checking empty fields
	if(empty($productname) || empty($price) || empty($stocks) || empty($category) || empty($supplier)) {	
			
		if(empty($productname)) {
			echo "<h4 class=\"text-danger\">Product Name field is empty.</h4><br/>";
		}
		
		if(empty($price)) {
			echo "<h4 class=\"text-danger\">Price field is empty.</h4><br/>";
		}
		
		if(empty($stocks)) {
			echo "<h4 class=\"text-danger\">Stocks field is empty.</h4><br/>";
		}
		
		if(empty($category)) {
			echo "<h4 class=\"text-danger\">Category field is empty.</h4><br/>";
		}

		if(empty($supplier)) {
			echo "<h4 class=\"text-danger\">Supplier field is empty.</h4><br/>";
		}
	} else {	
		//updating the table
		$sql = "UPDATE tbl_products SET productname=:productname, price=:price, stocks=:stocks, category=:category, supplier=:supplier WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':productname', $productname);
		$query->bindparam(':price', $price);
		$query->bindparam(':stocks', $stocks);
		$query->bindparam(':category', $category);
		$query->bindparam(':supplier', $supplier);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM tbl_products WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$productname = $row['productname'];
	$price = $row['price'];
	$stocks = $row['stocks'];
	$category = $row['category'];
	$supplier = $row['supplier'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Product Name</td>
				<td><input type="text" name="productname" value="<?php echo $productname;?>"></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input type="text" name="price" value="<?php echo $price;?>"></td>
			</tr>
			<tr> 
				<td>Stocks</td>
				<td><input type="text" name="stocks" value="<?php echo $stocks;?>"></td>
			</tr>
			<tr> 
				<td>Category</td>
				<td><input type="text" name="category" value="<?php echo $category;?>"></td>
			</tr>
			<tr> 
				<td>Supplier</td>
				<td><input type="text" name="supplier" value="<?php echo $supplier;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input class="btn btn-success" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
